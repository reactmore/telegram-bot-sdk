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

## Example Webhook Controller:

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

