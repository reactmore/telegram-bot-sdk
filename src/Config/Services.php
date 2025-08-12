<?php

namespace Reactmore\TelegramBotSdk\Config;

use CodeIgniter\Config\BaseService;
use Reactmore\TelegramBotSdk\Config\Telegram as SettingsTelegram;
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

        /** @var \Config\Telegram $config */
        $config   = config('Telegram');
        $telegram = new Telegram($config->apiKey, $config->username);

        $envAdmins = env('telegram.chatsAdmin');
        if (!empty($envAdmins)) {
            $envAdmins = array_map('trim', explode(',', $envAdmins));
            $config->chatsAdmin = array_values(array_unique(array_merge($config->chatsAdmin, $envAdmins)));
        }

        if (!empty($config->chatsAdmin)) {
            $telegram->enableAdmins($config->chatsAdmin);
        }

        if (!empty($config->customCommandPath)) {
            $telegram->addCommandsPaths($config->customCommandPath);
        }

        $telegram->enableLimiter(['enabled' => true]);

        // Set konfigurasi tambahan
        $telegram->setDownloadPath($config->downloadPath);
        $telegram->setUploadPath($config->uploadPath);

        return $telegram;
    }
}
