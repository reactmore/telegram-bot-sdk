<?php

namespace Reactmore\TelegramBotSdk\Entities\Message;

use Reactmore\TelegramBotSdk\Entities\Entity;
use Reactmore\TelegramBotSdk\Entities\Message;

class Factory extends \Reactmore\TelegramBotSdk\Entities\Factory
{
    public static function make(array $data, string $bot_username): Entity
    {
        if ($data['date'] === 0) {
            $class = InaccessibleMessage::class;
        } else {
            $class = Message::class;
        }

        return new $class($data, $bot_username);
    }
}
