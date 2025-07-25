<?php

/**
 * This file is part of the TelegramBot package.
 *
 * (c) Avtandil Kikabidze aka LONGMAN <akalongman@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Reactmore\TelegramBotSdk\Entities;

/**
 * Class MessageAutoDeleteTimerChanged
 *
 * Represents a service message about a change in auto-delete timer settings
 *
 * @see https://core.telegram.org/bots/api#messageautodeletetimerchanged
 *
 * @method int getMessageAutoDeleteTime() New auto-delete time for messages in the chat
 */
class MessageAutoDeleteTimerChanged extends Entity
{
}
