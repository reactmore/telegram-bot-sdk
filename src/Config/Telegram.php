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
    public string $apiKey = '';

    /**
     * --------------------------------------------------------------------------
     * Telegram Bot Username
     * --------------------------------------------------------------------------
     *
     * This is the username of your Telegram bot. It must be unique
     * and end with 'bot' (e.g., 'my_bot').
     */
    public string $username = '';

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
        958587442,
    ];

    /**
     * --------------------------------------------------------------------------
     * Access Codes Login
     * --------------------------------------------------------------------------
     *
     * These are private access codes that users can use to log in to the bot.
     * Make sure these codes are kept secure.
     */
    public string $accessCodesLogin = '';

    /**
     * --------------------------------------------------------------------------
     * Local server
     * --------------------------------------------------------------------------
     *
     * local server telegram api.
     */
    public bool $localServer = false;
    
    /**
     * --------------------------------------------------------------------------
     * Local server API
     * --------------------------------------------------------------------------
     *
     * local server telegram api.
     */

    public string $customBotApiUrl = "";

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

    /**
     * --------------------------------------------------------------------------
     * Set Custom Command Path
     * --------------------------------------------------------------------------
     *
     * This Custom command path.
     * Make sure folder writable.
     * 
     */
    public array $customCommandPath = [
        APPPATH . "BotCommand/Commands"
    ];
}
