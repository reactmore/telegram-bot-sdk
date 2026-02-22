# Telegram BOT CodeIgniter 4

This library integrates the **Telegram BOT API** with the **CodeIgniter 4** framework.  
It supports `.env` configuration, custom commands, and the option to run the bot using the **Telegram Local Server** for improved performance.

---

## 📦 Installation

1. **Clone Repository / Install Library**
```bash
   composer require reactmore/TelegramBotSdk
```

## Configuration

1. Publish Telegram Config
```bash
php spark telegram:publish
```

2. Overide Config env:
```env
#--------------------------------------------------------------------
# Bot Configuration
#--------------------------------------------------------------------

telegram.apiKey = 'xxxxxxxxx'
telegram.username = 'xxxxxxxxxxxxx'
telegram.chatsAdmin = 'xxxxxx, xxxxx, xxxxx'
telegram.accessCodesLogin = 'xxxxx'

# for developer only or local server, default is false
telegram.localServer = false
telegram.customBotApiUrl = "http://192.168.1.17:3366"
```

## Example Custom Webhook Controller:

```php
<?php

namespace App\Controllers;

use Reactmore\TelegramBotSdk\Controllers\Services\BaseServicesController;
use Reactmore\TelegramBotSdk\Telegram;
use Reactmore\TelegramBotSdk\Exception\TelegramException;
use Reactmore\TelegramBotSdk\Entities\Update;

class TelegramController extends BaseServicesController
{
    protected $telegram;

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        // register local running before init 
        if ($this->telegramSettings->localServer) {
            \Reactmore\TelegramBotSdk\Request::setCustomBotApiUri($this->telegramSettings->customBotApiUrl);
        }
        // init telegram service 
        $this->telegram = service('telegram');
    }

    public function index()
    {
        try {
            // filter webhook return false to block incoming  
            $this->telegram->setUpdateFilter(function (Update $update, Telegram $telegram) {
                $message = $update->getMessage() ?: $update->getCallbackQuery()->getMessage();
                $chat    = $message->getChat();
                $user    = $message->getFrom();
                $chat_id = $chat->getId();
                $user_id = $user->getId();

                // make logic here 

                return true;
            });

            // dont delete this method 
            $this->telegram->handle();
        } catch (TelegramException $e) {
            log_message('error', '[ERROR] {exception}', ['exception' => $e]);
        }
    }
}
```

Dont forget overide routes webhook with your custom webhook 

```php
$routes->group('telegram', function ($routes) {
    $routes->post('hook', 'TelegramController::index');
});
```

## Spark Command 

```cli
// make setwebhook https://yourdomain.com/telegram/hook
php spark telegram:run setwebhook 

// delete your webhook
php spark telegram:run deletewebhook 

// support 1 argument drop pending update 
// example : 
php spark telegram:run setwebhook --drop-pending-updates true

```

### Webhook Secret Code:

```php
## 🔐 Webhook Secret Token

For enhanced security, you can set a secret token when you [set your webhook](https://core.telegram.org/bots/api#setwebhook). Telegram will then send this token in the `X-Telegram-Bot-Api-Secret-Token` header with every update. This library can automatically validate this token for you.

### 1. Set the Webhook with a Secret Token

When setting your webhook, provide a `secret_token`:

```php
$telegram->setWebhook('https://your-domain.com/hook.php', [
    'secret_token' => 'YOUR_SECRET_TOKEN',
]);
```

### 2. Configure Your Bot to Verify the Token

In your webhook handler (e.g., `hook.php`), set the same secret token on your `Telegram` object. The library will then automatically check the header on incoming requests and throw an exception if the token is missing or invalid.

```php
<?php

require_once __DIR__ . '/vendor/autoload.php';

$bot_api_key  = 'YOUR_BOT_API_KEY';
$bot_username = 'YOUR_BOT_USERNAME';
$bot_secret   = 'YOUR_SECRET_TOKEN';

try {
    $telegram = new Reactmore\TelegramBotSdk\Telegram($bot_api_key, $bot_username);

    // Set the secret token for incoming webhook requests
    $telegram->setSecretToken($bot_secret);

    // Handle the update
    $telegram->handle();

} catch (Longman\TelegramBot\Exception\TelegramException $e) {
    // Log the error
    error_log($e->getMessage());
}

This ensures that only requests from Telegram with the correct secret token are processed by your bot.
```

## ⚡ Running Telegram Local Server
For better performance and to avoid rate limits, use the Telegram Local Server.

1. Build Telegram Bot API
Follow the official guide:
[Telegram Bot API - GitHub](https://github.com/tdlib/telegram-bot-api)

2. Start the Local Server
```Bash
telegram-bot-api --local --api-id xxxxx --api-hash xxxxx --dir bots --http-ip-address=192.168.1.12 -p 3366 --http-stat-ip-address=192.168.1.12 -s 3355 -v 3
```

3. Log Out from the Official Telegram Server
This step is required so the bot can connect to the local server:
https://api.telegram.org/bot[BOTTOKEN]/logOut

