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
 * Class PhotoSize
 *
 * @see https://core.telegram.org/bots/api#photosize
 *
 * @method string getFileId()       Identifier for this file, which can be used to download or reuse the file
 * @method int    getFileSize()     Optional. File size
 * @method string getFileUniqueId() Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
 * @method int    getHeight()       Photo height
 * @method int    getWidth()        Photo width
 */
class PhotoSize extends Entity
{
}
