<?php

namespace Reactmore\TelegramBotSdk\Entities\MessageOrigin;

use Reactmore\TelegramBotSdk\Entities\Entity;

/**
 * @method int    getDate() Date the message was sent originally in Unix time
 * @method string getType() Type of the message origin
 */
class MessageOriginNotImplemented extends Entity implements MessageOrigin
{
}
