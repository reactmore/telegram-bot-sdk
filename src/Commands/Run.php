<?php

declare(strict_types=1);

namespace Reactmore\TelegramBotSdk\Commands;

use CodeIgniter\CLI\CLI;
use CodeIgniter\CLI\Commands;
use CodeIgniter\Publisher\Publisher;
use Psr\Log\LoggerInterface;
use Reactmore\TelegramBotSdk\Entities\Update;
use Reactmore\TelegramBotSdk\Telegram;
use Reactmore\TelegramBotSdk\Exception\TelegramException;
use Reactmore\TelegramBotSdk\config\Telegram as SettingsTelegram;
use Throwable;

class Run extends TelegramCommand
{
    protected $name        = 'telegram:run';

    protected $description = 'A command to perform actions related to the Telegram bot, like processing updates.';

    /**
     * The Command's Usage
     *
     * @var string
     */
    protected $usage = 'telegram:run [action] [options]';

    /**
     * The Command's Arguments
     *
     * @var array
     */
    protected $arguments = [
        'action' => 'The action to be performed, such as "start", "stop", or "update".'
    ];

    /**
     * The Command's Options
     *
     * @var array
     */
    protected $options = [
        '--drop-pending-updates' => 'Optional. If specified, the webhook will use another URL for updates.',
    ];


    protected $telegramSettings;

    public function __construct(LoggerInterface $logger, Commands $commands)
    {
        parent::__construct($logger, $commands);
        $this->telegramSettings   = new SettingsTelegram();
        if ($this->telegramSettings->localServer) {
            \Reactmore\TelegramBotSdk\Request::setCustomBotApiUri($this->telegramSettings->customBotApiUrl);
        }
    }


    /**
     * Actually execute a command.
     *
     * @param array $params
     */
    public function run(array $params)
    {
        // Cek apakah ada parameter aksi pertama
        if (empty($params)) {
            CLI::error('Action parameter is required. Usage: ' . $this->usage);
            return;
        }

        // Ambil action pertama dari parameter
        $action = $params[0];

        // Validasi action yang diterima
        $validActions = ['start', 'setwebhook', 'deletewebhook'];
        if (!in_array($action, $validActions)) {
            CLI::error('Invalid action. Valid actions are: ' . implode(', ', $validActions));
            return;
        }

        // Tampilkan pesan aksi yang dipilih
        CLI::write("Performing action: $action", 'green');

        // Cek apakah opsi --drop-pending-updates diberikan
        $dropPendingUpdates = isset($params['drop-pending-updates']) ? true : false;
        if ($dropPendingUpdates) {
            CLI::write("Dropping pending updates as requested...", 'yellow');
        }

        // Proses sesuai dengan action
        switch ($action) {
            case 'start':
                CLI::write('Starting the bot...', 'green');
                return $this->getUpdates();
                break;

            case 'setwebhook':
                CLI::write('Setting Webhook...', 'green');
                return $this->setWebhook();
                break;

            case 'deletewebhook':
                CLI::write('delete webhook the bot...', 'green');
                return $this->deleteWebhook();
                break;

            default:
                CLI::error('Action not implemented.');
                break;
        }
    }

    /**
     * Mengambil pembaruan dan terus memprosesnya dalam loop.
     */
    private function getUpdates()
    {
        try {
            $telegram = service('telegram');

            // $telegram->setUpdateFilter(function (Update $update, Telegram $telegram, &$reason = 'Update denied by update_filter') {
            //     $user_id = $update->getMessage()->getFrom()->getId();
            //     if ($user_id === 428) {
            //         return true;
            //     }

            //     $reason = "Invalid user with ID {$user_id}";
            //     return false;
            // });


            while (true) {
                // Get the updates
                $server_response = $telegram->handleGetUpdates();

                if ($server_response->isOk()) {
                    // Log the number of updates processed
                    $update_count = count($server_response->getResult());
                    $message = date('Y-m-d H:i:s') . ' - Processed ' . $update_count . ' updates';
                    CLI::write($message, 'green'); // Output in console
                } else {
                    // Log failure to fetch updates
                    $error_message = date('Y-m-d H:i:s') . ' - Failed to fetch updates';
                    CLI::write($error_message, 'red');
                    log_message('error', $server_response->printError()); // Log the error from the Telegram API
                }

                sleep(5);
            }
        } catch (\Reactmore\TelegramBotSdk\Exception\TelegramException $e) {
            CLI::write(json_encode($e), 'red');
        } catch (\Reactmore\TelegramBotSdk\Exception\TelegramLogException $e) {
            CLI::write(json_encode($e), 'red');
        }
    }

    private function setWebhook()
    {
        $telegram = service('telegram');
        
        try {
            $result = $telegram->setWebhook(base_url('telegram/hook'), [
                'drop_pending_updates' => isset($params['drop-pending-updates']) ? false : true,
            ]);

            return CLI::write($result->getDescription(), 'green');
        } catch (TelegramException $e) {
            return CLI::write($e->getMessage(), 'red');
        }
    }

    private function deleteWebhook()
    {
        $telegram = service('telegram');

        try {
            $result = $telegram->deleteWebhook([
                'drop_pending_updates' => isset($this->options['drop-pending-updates'])  ? false : true,
            ]);

            return CLI::write($result->getDescription(), 'green');
        } catch (TelegramException $e) {
            return CLI::write($e->getMessage(), 'red');
        }
    }
}
