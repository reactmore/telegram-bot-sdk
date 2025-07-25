<?php

namespace Reactmore\TelegramBotSdk\Entities\MessageOrigin;

use Reactmore\TelegramBotSdk\Entities\Entity;

/**
 * The message was originally sent by an unknown user.
 *
 * @see https://core.telegram.org/bots/api#messageoriginhiddenuser
 *
 * @method int    getDate()           Date the message was sent originally in Unix time
 * @method string getSenderUserName() Name of the user that sent the message originally
 * @method string getType()           Type of the message origin, always “hidden_user”
 */
class MessageOriginHiddenUser extends Entity implements MessageOrigin
{
}
