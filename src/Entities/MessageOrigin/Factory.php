<?php

namespace Reactmore\TelegramBotSdk\Entities\MessageOrigin;

use Reactmore\TelegramBotSdk\Entities\Entity;

class Factory extends \Reactmore\TelegramBotSdk\Entities\Factory
{
    public static function make(array $data, string $bot_username): Entity
    {
        $type = [
            'user'        => MessageOriginUser::class,
            'hidden_user' => MessageOriginHiddenUser::class,
            'chat'        => MessageOriginChat::class,
            'channel'     => MessageOriginChannel::class,
        ];

        if (! isset($type[$data['type'] ?? ''])) {
            return new MessageOriginNotImplemented($data, $bot_username);
        }

        $class = $type[$data['type']];

        return new $class($data, $bot_username);
    }
}
