<?php

namespace Reactmore\TelegramBotSdk;

use CodeIgniter\Cache\CacheInterface;
use Reactmore\TelegramBotSdk\Exception\TelegramException;

/**
 * Class Conversation
 *
 * Only one conversation can be active at any one time.
 * A conversation is directly linked to a user, chat and the command that is managing the conversation.
 */
class Conversation
{
    /**
     * All information fetched from the cache
     *
     * @var array|null
     */
    protected $conversation;

    /**
     * Notes stored inside the conversation
     *
     * @var mixed
     */
    protected $protected_notes;

    /**
     * Notes to be stored
     *
     * @var mixed
     */
    public $notes;

    /**
     * Telegram user id
     *
     * @var int
     */
    protected $user_id;

    /**
     * Telegram chat id
     *
     * @var int
     */
    protected $bot_id;

    /**
     * Command to be executed if the conversation is active
     *
     * @var string
     */
    protected $command;

    /**
     * Cache key for the conversation
     *
     * @var string
     */
    protected $cache_key;

    /**
     * Cache instance
     *
     * @var CacheInterface
     */
    protected $cache;

    /**
     * Conversation constructor to initialize a new conversation
     *
     * @param int $chat_id
     *
     * @throws TelegramException
     */
    public function __construct(int $user_id, int $bot_id, string $command = '')
    {
        $this->user_id   = $user_id;
        $this->bot_id    = $bot_id;
        $this->command   = $command;
        $this->cache     = service('cache'); // Using CodeIgniter's cache service
        $this->cache_key = $this->generateCacheKey($user_id, $bot_id);

        // Try to load an existing conversation if possible
        if (! $this->load() && $command !== '') {
            // A new conversation start
            $this->start();
        }
    }

    /**
     * Generate a unique cache key for the conversation
     */
    protected function generateCacheKey(int $user_id, int $chat_id): string
    {
        return "conversation_{$user_id}_{$chat_id}";
    }

    /**
     * Clear all conversation variables.
     *
     * @return bool Always return true, to allow this method in an if statement.
     */
    protected function clear(): bool
    {
        $this->conversation    = null;
        $this->protected_notes = null;
        $this->notes           = null;

        $this->cache->delete($this->cache_key);

        return true;
    }

    /**
     * Load the conversation from the cache
     *
     * @throws TelegramException
     */
    protected function load(): bool
    {
        // Load the conversation from the cache
        $this->conversation = $this->cache->get($this->cache_key);

        if ($this->conversation && $this->conversation['status'] === 'active') {
            // Load the command from the conversation if it hasn't been passed
            $this->command = $this->command ?: $this->conversation['command'];

            if ($this->command !== $this->conversation['command']) {
                $this->cancel();

                return false;
            }

            // Load the conversation notes
            $this->protected_notes = json_decode($this->conversation['notes'], true);
            $this->notes           = $this->protected_notes;
        }

        return $this->exists();
    }

    /**
     * Check if the conversation already exists
     */
    public function exists(): bool
    {
        return $this->conversation !== null;
    }

    /**
     * Start a new conversation if the current command doesn't have one yet
     *
     * @throws TelegramException
     */
    protected function start(): bool
    {
        if ($this->command && ! $this->exists()) {
            $data = [
                'status'  => 'active',
                'user_id' => $this->user_id,
                'chat_id' => $this->bot_id,
                'command' => $this->command,
                'notes'   => json_encode([]),
            ];

            // Store the new conversation in the cache
            $this->cache->save($this->cache_key, $data, 3600); // Cache for 1 hour

            return $this->load();
        }

        return false;
    }

    /**
     * Delete the current conversation
     *
     * Currently the Conversation is not deleted but just set to 'stopped'
     *
     * @throws TelegramException
     */
    public function stop(): bool
    {
        return $this->updateStatus('stopped') && $this->clear();
    }

    /**
     * Cancel the current conversation
     *
     * @throws TelegramException
     */
    public function cancel(): bool
    {
        return $this->updateStatus('cancelled') && $this->clear();
    }

    /**
     * Update the status of the current conversation
     *
     * @throws TelegramException
     */
    protected function updateStatus(string $status): bool
    {
        if ($this->exists()) {
            $this->conversation['status'] = $status;
            // Update the conversation status in the cache
            $this->cache->save($this->cache_key, $this->conversation, 3600);

            return true;
        }

        return false;
    }

    /**
     * Store the array/variable in the cache with json_encode() function
     *
     * @throws TelegramException
     */
    public function update(): bool
    {
        if ($this->exists()) {
            $this->conversation['notes'] = json_encode($this->notes, JSON_UNESCAPED_UNICODE);
            // Update the conversation in the cache
            $this->cache->save($this->cache_key, $this->conversation, 3600);

            return true;
        }

        return false;
    }

    /**
     * Retrieve the command to execute from the conversation
     */
    public function getCommand(): string
    {
        return $this->command;
    }

    /**
     * Retrieve the user id
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * Retrieve the chat id
     */
    public function getChatId(): int
    {
        return $this->bot_id;
    }
}
