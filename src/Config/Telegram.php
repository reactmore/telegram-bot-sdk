<?php

namespace Reactmore\TelegramBotSdk\Config;

use CodeIgniter\Config\BaseConfig;

class Telegram extends BaseConfig
{
    /**
     * --------------------------------------------------------------------------
     * Telegram Bot API Token
     * --------------------------------------------------------------------------
     *
     * This is the token you receive from BotFather when you create a new bot.
     * Make sure to keep this token secure and do not share it publicly.
     */
    public string $apiKey = '7771604344:AAHfyqqjTyxVab3ATCTel9Lo_W7Pjbrj9Hs';

    /**
     * --------------------------------------------------------------------------
     * Telegram Bot Username
     * --------------------------------------------------------------------------
     *
     * This is the username of your Telegram bot. It must be unique
     * and end with 'bot' (e.g., 'my_bot').
     */
    public string $username = 'fastworkviewmoreBot';

    /**
     * --------------------------------------------------------------------------
     * Admin Chat IDs
     * --------------------------------------------------------------------------
     *
     * This is an array of chat IDs for users who will have admin privileges
     * in your bot. You can add multiple chat IDs to this array.
     *
     * @var list<int>
     */
    public array $chatsAdmin = [
        422269098,
    ];

    /**
     * --------------------------------------------------------------------------
     * Access Codes Login
     * --------------------------------------------------------------------------
     *
     * These are private access codes that users can use to log in to the bot.
     * Make sure these codes are kept secure.
     */
    public string $accessCodesLogin = '123';

    /**
     * --------------------------------------------------------------------------
     * Download Path
     * --------------------------------------------------------------------------
     *
     * This Path for save file if bot recived files.
     * Make sure folder writable.
     */
    public string $downloadPath = WRITEPATH . 'uploads/download';

    /**
     * --------------------------------------------------------------------------
     * Upload Path
     * --------------------------------------------------------------------------
     *
     * This Path for save file if bot recived files.
     * Make sure folder writable.
     */
    public string $uploadPath = WRITEPATH . 'uploads';
}
