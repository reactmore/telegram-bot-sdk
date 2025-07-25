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
 * Class ChatPhoto
 *
 * @see https://core.telegram.org/bots/api#chatphoto
 *
 * @method string getBigFileUniqueId()   Unique file identifier of big (640x640)   chat photo, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
 * @method string getSmallFileUniqueId() Unique file identifier of small (160x160) chat photo, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
 */
class ChatPhoto extends Entity
{
}
