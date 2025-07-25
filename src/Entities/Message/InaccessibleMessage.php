<?php

namespace Reactmore\TelegramBotSdk\Entities\Message;

use Reactmore\TelegramBotSdk\Entities\Chat;
use Reactmore\TelegramBotSdk\Entities\Entity;

/**
 * @method Chat getChat()      Chat the message belonged to
 * @method int  getDate()      Always 0. The field can be used to differentiate regular and inaccessible messages.
 * @method int  getMessageId() Unique message identifier inside the chat
 */
class InaccessibleMessage extends Entity implements MaybeInaccessibleMessage
{
    protected function subEntities(): array
    {
        return [
            'chat' => Chat::class,
        ];
    }
}
