# Telegram BOT CodeIgniter 4

This library integrates the **Telegram BOT API** with the **CodeIgniter 4** framework.  
It supports `.env` configuration, custom commands, and the option to run the bot using the **Telegram Local Server** for improved performance.

---

## 📦 Installation

1. **Clone Repository / Install Library**
```bash
   composer require reactmore/TelegramBotSdk
```

## Usage

### Webhook Controller: 

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

