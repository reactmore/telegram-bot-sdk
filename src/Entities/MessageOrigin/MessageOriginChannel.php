<?php

namespace Reactmore\TelegramBotSdk\Entities\MessageOrigin;

use Reactmore\TelegramBotSdk\Entities\Chat;
use Reactmore\TelegramBotSdk\Entities\Entity;

/**
 * The message was originally sent to a channel chat.
 *
 * @see https://core.telegram.org/bots/api#messageoriginchannel
 *
 * @method string getAuthorSignature() Optional. Signature of the original post author
 * @method Chat   getChat()            Channel chat to which the message was originally sent
 * @method int    getDate()            Date the message was sent originally in Unix time
 * @method int    getMessageId()       Unique message identifier inside the chat
 * @method string getType()            Type of the message origin, always “channel”
 */
class MessageOriginChannel extends Entity implements MessageOrigin
{
    protected function subEntities(): array
    {
        return [
            'chat' => Chat::class,
        ];
    }
}
