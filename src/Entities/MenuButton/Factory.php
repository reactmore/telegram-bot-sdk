<?php

namespace Reactmore\TelegramBotSdk\Entities\MenuButton;

use Reactmore\TelegramBotSdk\Entities\Entity;

class Factory extends \Reactmore\TelegramBotSdk\Entities\Factory
{
    public static function make(array $data, string $bot_username): Entity
    {
        $type = [
            'commands' => MenuButtonCommands::class,
            'web_app'  => MenuButtonWebApp::class,
            'default'  => MenuButtonDefault::class,
        ];

        if (! isset($type[$data['type'] ?? ''])) {
            return new MenuButtonNotImplemented($data, $bot_username);
        }

        $class = $type[$data['type']];

        return new $class($data, $bot_username);
    }
}
