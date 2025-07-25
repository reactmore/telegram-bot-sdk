<?php

namespace Reactmore\TelegramBotSdk\Entities\MessageOrigin;

use Reactmore\TelegramBotSdk\Entities\Chat;
use Reactmore\TelegramBotSdk\Entities\Entity;

/**
 * The message was originally sent on behalf of a chat to a group chat.
 *
 * @see https://core.telegram.org/bots/api#messageoriginchat
 *
 * @method string getAuthorSignature() Optional. For messages originally sent by an anonymous chat administrator, original message author signature
 * @method Chat   getChat()            Chat that sent the message originally
 * @method int    getDate()            Date the message was sent originally in Unix time
 * @method string getType()            Type of the message origin, always “chat”
 */
class MessageOriginChat extends Entity implements MessageOrigin
{
    protected function subEntities(): array
    {
        return [
            'sender_chat' => Chat::class,
        ];
    }
}
