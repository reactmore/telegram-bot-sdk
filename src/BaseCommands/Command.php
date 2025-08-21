<?php

namespace Reactmore\TelegramBotSdk\BaseCommands;

use Reactmore\TelegramBotSdk\Entities\CallbackQuery;
use Reactmore\TelegramBotSdk\Entities\ChatJoinRequest;
use Reactmore\TelegramBotSdk\Entities\ChatMemberUpdated;
use Reactmore\TelegramBotSdk\Entities\ChosenInlineResult;
use Reactmore\TelegramBotSdk\Entities\InlineQuery;
use Reactmore\TelegramBotSdk\Entities\Message;
use Reactmore\TelegramBotSdk\Entities\Payments\PreCheckoutQuery;
use Reactmore\TelegramBotSdk\Entities\Payments\ShippingQuery;
use Reactmore\TelegramBotSdk\Entities\Poll;
use Reactmore\TelegramBotSdk\Entities\PollAnswer;
use Reactmore\TelegramBotSdk\Entities\ServerResponse;
use Reactmore\TelegramBotSdk\Entities\Update;
use Reactmore\TelegramBotSdk\Exception\TelegramException;
use Reactmore\TelegramBotSdk\Request;
use Reactmore\TelegramBotSdk\Telegram;

/**
 * Class Command
 *
 * Base class for commands. It includes some helper methods that can fetch data directly from the Update object.
 *
 * @method CallbackQuery      getCallbackQuery()      Optional. New incoming callback query
 * @method Message            getChannelPost()        Optional. New post in the channel, can be any kind — text, photo, sticker, etc.
 * @method ChatJoinRequest    getChatJoinRequest()    Optional. A request to join the chat has been sent. The bot must have the can_invite_users administrator right in the chat to receive these updates.
 * @method ChatMemberUpdated  getChatMember()         Optional. A chat member's status was updated in a chat. The bot must be an administrator in the chat and must explicitly specify “chat_member” in the list of allowed_updates to receive these updates.
 * @method ChosenInlineResult getChosenInlineResult() Optional. The result of an inline query that was chosen by a user and sent to their chat partner.
 * @method Message            getEditedChannelPost()  Optional. New version of a post in the channel that is known to the bot and was edited
 * @method Message            getEditedMessage()      Optional. New version of a message that is known to the bot and was edited
 * @method InlineQuery        getInlineQuery()        Optional. New incoming inline query
 * @method Message            getMessage()            Optional. New incoming message of any kind — text, photo, sticker, etc.
 * @method ChatMemberUpdated  getMyChatMember()       Optional. The bot's chat member status was updated in a chat. For private chats, this update is received only when the bot is blocked or unblocked by the user.
 * @method Poll               getPoll()               Optional. New poll state. Bots receive only updates about polls, which are sent or stopped by the bot
 * @method PollAnswer         getPollAnswer()         Optional. A user changed their answer in a non-anonymous poll. Bots receive new votes only in polls that were sent by the bot itself.
 * @method PreCheckoutQuery   getPreCheckoutQuery()   Optional. New incoming pre-checkout query. Contains full information about checkout
 * @method ShippingQuery      getShippingQuery()      Optional. New incoming shipping query. Only for invoices with flexible price
 */
abstract class Command
{
    /**
     * Auth level for user commands
     */
    public const AUTH_USER = 'User';

    /**
     * Auth level for system commands
     */
    public const AUTH_SYSTEM = 'System';

    /**
     * Auth level for admin commands
     */
    public const AUTH_ADMIN = 'Admin';

    /**
     * Telegram object
     *
     * @var Telegram
     */
    protected $telegram;

    /**
     * Update object
     *
     * @var Update
     */
    protected $update;

    /**
     * Name
     *
     * @var string
     */
    protected $name = '';

    /**
     * Description
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Usage
     *
     * @var string
     */
    protected $usage = 'Command usage';

    /**
     * Show in Help
     *
     * @var bool
     */
    protected $show_in_help = true;

    /**
     * Version
     *
     * @var string
     */
    protected $version = '1.0.0';

    /**
     * If this command is enabled
     *
     * @var bool
     */
    protected $enabled = true;

    /**
     * If this command needs mysql
     *
     * @var bool
     */
    protected $need_mysql = false;

    /**
     * Make sure this command only executes on a private chat.
     *
     * @var bool
     */
    protected $private_only = false;

    /**
     * Command config
     *
     * @var array
     */
    protected $config = [];

    /**
     * Command args commands
     *
     * @var array
     */
    protected $args_commands = [];

    /**
     * Constructor
     */
    public function __construct(Telegram $telegram, ?Update $update = null)
    {
        $this->telegram = $telegram;
        if ($update !== null) {
            $this->setUpdate($update);
        }
        $this->config = $telegram->getCommandConfig($this->name);
    }

    /**
     * Set update object
     */
    public function setUpdate(Update $update): Command
    {
        $this->update = $update;

        return $this;
    }

    /**
     * Pre-execute command
     *
     * @throws TelegramException
     */
    public function preExecute($args = []): ServerResponse
    {
        if ($this->need_mysql && ! $this->telegram->isDbEnabled()) {
            return $this->executeNoDb();
        }

         $this->args_commands = $args;

        if ($this->isPrivateOnly() && $this->removeNonPrivateMessage()) {
            $message = $this->getMessage() ?: $this->getEditedMessage() ?: $this->getChannelPost() ?: $this->getEditedChannelPost();

            if ($user = $message->getFrom()) {
                return Request::sendMessage([
                    'chat_id'    => $user->getId(),
                    'parse_mode' => 'Markdown',
                    'text'       => sprintf(
                        "/%s command is only available in a private chat.\n(`%s`)",
                        $this->getName(),
                        $message->getText(),
                    ),
                ]);
            }

            return Request::emptyResponse();
        }

        return $this->execute();
    }

    /**
     * Execute command
     *
     * @throws TelegramException
     */
    abstract public function execute(): ServerResponse;

    /**
     * Execution if MySQL is required but not available
     *
     * @throws TelegramException
     */
    public function executeNoDb(): ServerResponse
    {
        return $this->replyToChat('Sorry no database connection, unable to execute "' . $this->name . '" command.');
    }

    /**
     * Get update object
     */
    public function getUpdate(): ?Update
    {
        return $this->update;
    }

    public function getArgsCommand()
    {
        return $this->args_commands ?? [];
    }

    /**
     * Relay any non-existing function calls to Update object.
     *
     * This is purely a helper method to make requests from within execute() method easier.
     *
     * @return Command
     */
    public function __call(string $name, array $arguments)
    {
        if ($this->update === null) {
            return null;
        }

        return call_user_func_array([$this->update, $name], $arguments);
    }

    /**
     * Get command config
     *
     * Look for config $name if found return it, if not return $default.
     * If $name is not set return all set config.
     *
     * @param mixed $default
     *
     * @return mixed
     */
    public function getConfig(?string $name = null, $default = null)
    {
        if ($name === null) {
            return $this->config;
        }

        return $this->config[$name] ?? $default;
    }

    /**
     * Get telegram object
     */
    public function getTelegram(): Telegram
    {
        return $this->telegram;
    }

    /**
     * Get usage
     */
    public function getUsage(): string
    {
        return $this->usage;
    }

    /**
     * Get version
     */
    public function getVersion(): string
    {
        return $this->version;
    }

    /**
     * Get description
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Get name
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get Show in Help
     */
    public function showInHelp(): bool
    {
        return $this->show_in_help;
    }

    /**
     * Check if command is enabled
     */
    public function isEnabled(): bool
    {
        return $this->enabled;
    }

    /**
     * If this command is intended for private chats only.
     */
    public function isPrivateOnly(): bool
    {
        return $this->private_only;
    }

    /**
     * If this is a SystemCommand
     */
    public function isSystemCommand(): bool
    {
        return $this instanceof SystemCommand;
    }

    /**
     * If this is an AdminCommand
     */
    public function isAdminCommand(): bool
    {
        return $this instanceof AdminCommand;
    }

    /**
     * If this is a UserCommand
     */
    public function isUserCommand(): bool
    {
        return $this instanceof UserCommand;
    }

    /**
     * Delete the current message if it has been called in a non-private chat.
     */
    protected function removeNonPrivateMessage(): bool
    {
        $message = $this->getMessage() ?: $this->getEditedMessage();

        if ($message) {
            $chat = $message->getChat();

            if (!$chat->isPrivateChat()) {
                // Delete the falsely called command message.
                Request::deleteMessage([
                    'chat_id'    => $chat->getId(),
                    'message_id' => $message->getMessageId(),
                ]);

                return true;
            }
        }

        return false;
    }

    /**
     * Helper to reply to a chat directly.
     *
     * @throws TelegramException
     */
    public function replyToChat(string $text, array $data = []): ServerResponse
    {
        if ($message = $this->getMessage() ?: $this->getEditedMessage() ?: $this->getChannelPost() ?: $this->getEditedChannelPost()) {
            $reply = [
                'chat_id' => $message->getChat()->getId(),
                'text'    => $text,
            ];

            if ($message->getIsTopicMessage()) {
                $reply['message_thread_id'] = $message->getMessageThreadId();
            }

            return Request::sendMessage(array_merge($reply, $data));
        }

        return Request::emptyResponse();
    }

    /**
     * Helper to reply to a user directly.
     *
     * @throws TelegramException
     */
    public function replyToUser(string $text, array $data = []): ServerResponse
    {
        if ($message = $this->getMessage() ?: $this->getEditedMessage()) {
            return Request::sendMessage(array_merge([
                'chat_id' => $message->getFrom()->getId(),
                'text'    => $text,
            ], $data));
        }

        return Request::emptyResponse();
    }
}
