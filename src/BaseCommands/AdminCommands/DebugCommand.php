<?php

namespace Reactmore\TelegramBotSdk\BaseCommands\AdminCommands;

use Exception;
use Reactmore\TelegramBotSdk\BaseCommands\AdminCommand;
use Reactmore\TelegramBotSdk\Entities\ServerResponse;
use Reactmore\TelegramBotSdk\Exception\TelegramException;
use Reactmore\TelegramBotSdk\Request;
use Config\Database;
use CodeIgniter\Database\Exceptions\DatabaseException;

/**
 * Admin "/debug" command
 */
class DebugCommand extends AdminCommand
{
    /**
     * @var string
     */
    protected $name = 'debug';

    /**
     * @var string
     */
    protected $description = 'Debug command to help find issues';

    /**
     * @var string
     */
    protected $usage = '/debug';

    /**
     * @var string
     */
    protected $version = '1.1.0';

    /**
     * Command execute method
     *
     * @return mixed
     *
     * @throws TelegramException
     */
    public function execute(): ServerResponse
    {
        $message = $this->getMessage() ?: $this->getEditedMessage() ?: $this->getChannelPost() ?: $this->getEditedChannelPost();
        $chat    = $message->getChat();
        $text    = strtolower($message->getText(true));

        $data = ['chat_id' => $chat->getId()];

        if ($text !== 'glasnost' && ! $chat->isPrivateChat()) {
            $data['text'] = 'Only available in a private chat.';

            return Request::sendMessage($data);
        }

        $debug_info = [];

        $debug_info[] = sprintf('*TelegramBot version:* `%s`', $this->telegram->getVersion());
        $debug_info[] = sprintf('*Download path:* `%s`', $this->telegram->getDownloadPath() ?: '`_Not set_`');
        $debug_info[] = sprintf('*Upload path:* `%s`', $this->telegram->getUploadPath() ?: '`_Not set_`');

        // Commands paths.
        $debug_info[] = '*Commands paths:*';
        $debug_info[] = sprintf(
            '```' . PHP_EOL . '%s```',
            json_encode($this->telegram->getCommandsPaths(), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES),
        );

        $php_bit                       = '';
        PHP_INT_SIZE === 4 && $php_bit = ' (32bit)';
        PHP_INT_SIZE === 8 && $php_bit = ' (64bit)';
        $debug_info[]                  = sprintf('*PHP version:* `%1$s%2$s; %3$s; %4$s`', PHP_VERSION, $php_bit, PHP_SAPI, PHP_OS);
        $debug_info[]                  = sprintf('*Maximum PHP script execution time:* `%d seconds`', ini_get('max_execution_time'));

        /** @var \Config\Database $config */
        $dbConfig = config('Database')->default;

        // log_message('debug', '[DEBUG] Database config: ' . json_encode($dbConfig['database'], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

        if (!empty($dbConfig['hostname']) && !empty($dbConfig['database']) && !empty($dbConfig['username']) && $dbConfig['DBDriver'] === 'MySQLi') {
            try {
                $db = Database::connect();
                $version = $db->query('SELECT VERSION() AS version')->getRow()->version ?? 'unknown';
                $debug_info[] = sprintf('*MySQL version:* `%s`', $version);
            } catch (DatabaseException $e) {
                $debug_info[] = '*MySQL version:* `disabled`';
            }
        } else {
            $debug_info[] = '*MySQL version:* `disabsled`';
        }

        $debug_info[] = sprintf('*Operating System:* `%s`', php_uname());

        if (isset($_SERVER['SERVER_SOFTWARE'])) {
            $debug_info[] = sprintf('*Web Server:* `%s`', $_SERVER['SERVER_SOFTWARE']);
        }
        if (function_exists('curl_init')) {
            $curlversion  = curl_version();
            $debug_info[] = sprintf('*curl version:* `%1$s; %2$s`', $curlversion['version'], $curlversion['ssl_version']);
        }

        $webhook_info_title = '*Webhook Info:*';

        try {
            // Check if we're actually using the Webhook method.
            if (Request::getInput() === '') {
                $debug_info[] = $webhook_info_title . ' `Using getUpdates method, not Webhook.`';
            } else {
                $webhook_info_result = json_decode(Request::getWebhookInfo(), true)['result'];
                // Add a human-readable error date string if necessary.
                if (isset($webhook_info_result['last_error_date'])) {
                    $webhook_info_result['last_error_date_string'] = date('Y-m-d H:i:s', $webhook_info_result['last_error_date']);
                }

                $webhook_info_result_str = json_encode($webhook_info_result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
                $debug_info[]            = $webhook_info_title;
                $debug_info[]            = sprintf(
                    '```' . PHP_EOL . '%s```',
                    $webhook_info_result_str,
                );
            }
        } catch (Exception $e) {
            $debug_info[] = $webhook_info_title . sprintf(' `Failed to get webhook info! (%s)`', $e->getMessage());
        }

        $data['parse_mode'] = 'Markdown';
        $data['text']       = implode(PHP_EOL, $debug_info);

        return Request::sendMessage($data);
    }
}
