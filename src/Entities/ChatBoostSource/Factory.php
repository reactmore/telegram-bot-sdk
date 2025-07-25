<?php

namespace Reactmore\TelegramBotSdk\Entities\ChatBoostSource;

use Reactmore\TelegramBotSdk\Entities\Entity;

class Factory extends \Reactmore\TelegramBotSdk\Entities\Factory
{
    public static function make(array $data, string $bot_username): Entity
    {
        $type = [
            'premium'   => ChatBoostSourcePremium::class,
            'gift_code' => ChatBoostSourceGiftCode::class,
            'giveaway'  => ChatBoostSourceGiveaway::class,
        ];

        if (! isset($type[$data['source'] ?? ''])) {
            return new ChatBoostSourceNotImplemented($data, $bot_username);
        }

        $class = $type[$data['source']];

        return new $class($data, $bot_username);
    }
}
