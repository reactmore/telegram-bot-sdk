<?php

namespace Reactmore\TelegramBotSdk\Config;

use CodeIgniter\Config\BaseService;
use Reactmore\TelegramBotSdk\config\Telegram as SettingsTelegram;
use Reactmore\TelegramBotSdk\Telegram;

/**
 * Services Configuration file.
 *
 * This file defines services for your application, including TelegramBot.
 */
class Services extends BaseService
{
    /**
     * Returns the Telegram bot service instance.
     *
     * @param SettingsTelegram|null $config    The configuration for the Telegram bot.
     * @param bool                  $getShared Whether to get a shared instance.
     *
     * @return Telegram The Telegram bot instance.
     */
    public static function telegram(?SettingsTelegram $config = null, bool $getShared = true): Telegram
    {
        if ($getShared) {
            return static::getSharedInstance('telegram', $config);
        }

        $config   = new SettingsTelegram();
        $telegram = new Telegram($config->apiKey, $config->username);

        if (! empty($config->chatsAdmin)) {
            $telegram->enableAdmins($config->chatsAdmin);
        }

        $telegram->enableLimiter(['enabled' => true]);

        // Set konfigurasi tambahan
        $telegram->setDownloadPath($config->downloadPath);
        $telegram->setUploadPath($config->uploadPath);

        return $telegram;
    }
}
