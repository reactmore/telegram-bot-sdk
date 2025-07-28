<?php

namespace Reactmore\TelegramBotSdk\Entities\Message;

use Reactmore\TelegramBotSdk\Entities\Chat;

/**
 * @method Chat getChat()      Chat the message belonged to
 * @method From getFrom()      Chat the message from to
 * @method string  getText()
 * @method mixed  getPhoto()
 * @method mixed  getContact()
 * @method mixed  getLocation()
 * @method int  getMessageId() Unique message identifier inside this chat
 * @method int  getDate()      The field can be used to differentiate regular and inaccessible messages.
 */
interface MaybeInaccessibleMessage
{
}
