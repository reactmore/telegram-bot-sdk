<?php

declare(strict_types=1);

namespace Reactmore\TelegramBotSdk\Commands;

use CodeIgniter\CLI\CLI;
use CodeIgniter\Publisher\Publisher;
use Throwable;

class Publish extends TelegramCommand
{
    protected $name        = 'telegram:publish';

    protected $description = 'Publish Telegram config file into the current application.';

    /**
     * @return void
     */
    public function run(array $params)
    {
        $source = service('autoloader')->getNamespace('Reactmore\\TelegramBotSdk')[0];

        $publisher = new Publisher($source, APPPATH);

        try {
            $publisher->addPaths([
                'Config/Telegram.php',
            ])->merge(false);
        } catch (Throwable $e) {
            $this->showError($e);

            return;
        }

        foreach ($publisher->getPublished() as $file) {
            $publisher->replace(
                $file,
                [
                    'namespace Reactmore\\TelegramBotSdk\\Config' => 'namespace Config',
                    'use CodeIgniter\\Config\\BaseConfig'  => 'use Reactmore\\TelegramBotSdk\\Config\\Telegram as BaseTelegram',
                    'class Telegram extends BaseConfig'       => 'class Telegram extends BaseTelegram',
                ],
            );
        }

        CLI::write(CLI::color('  Published! ', 'green') . 'You can customize the configuration by editing the "app/Config/Tasks.php" file.');
    }
}
