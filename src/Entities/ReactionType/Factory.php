<?php

namespace Reactmore\TelegramBotSdk\Entities\ReactionType;

use Reactmore\TelegramBotSdk\Entities\Entity;

class Factory extends \Reactmore\TelegramBotSdk\Entities\Factory
{
    public static function make(array $data, string $bot_username): Entity
    {
        $type = [
            'emoji'        => ReactionTypeEmoji::class,
            'custom_emoji' => ReactionTypeCustomEmoji::class,
        ];

        if (! isset($type[$data['type'] ?? ''])) {
            return new ReactionTypeNotImplemented($data, $bot_username);
        }

        $class = $type[$data['type']];

        return new $class($data, $bot_username);
    }
}
