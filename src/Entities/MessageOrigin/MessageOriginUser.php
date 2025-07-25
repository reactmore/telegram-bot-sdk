<?php

namespace Reactmore\TelegramBotSdk\Entities\MessageOrigin;

use Reactmore\TelegramBotSdk\Entities\Entity;
use Reactmore\TelegramBotSdk\Entities\User;

/**
 * The message was originally sent by a known user.
 *
 * @see https://core.telegram.org/bots/api#messageoriginuser
 *
 * @method int    getDate()       Date the message was sent originally in Unix time
 * @method User   getSenderUser() User that sent the message originally
 * @method string getType()       Type of the message origin, always “user”
 */
class MessageOriginUser extends Entity implements MessageOrigin
{
    protected function subEntities(): array
    {
        return [
            'sender_user' => User::class,
        ];
    }
}
