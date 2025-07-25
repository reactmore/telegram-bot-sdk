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
 * Class Animation
 *
 * You can provide an animation for your game so that it looks stylish in chats (check out Lumberjack for an example). This object represents an animation file to be displayed in the message containing a game.
 *
 * @see https://core.telegram.org/bots/api#animation
 *
 * @method int       getDuration()     Duration of the video in seconds as defined by sender
 * @method string    getFileId()       Identifier for this file, which can be used to download or reuse the file
 * @method string    getFileName()     Optional. Original animation filename as defined by sender
 * @method int       getFileSize()     Optional. File size
 * @method string    getFileUniqueId() Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
 * @method int       getHeight()       Video height as defined by sender
 * @method string    getMimeType()     Optional. MIME type of the file as defined by sender
 * @method PhotoSize getThumbnail()    Optional. Animation thumbnail as defined by sender
 * @method int       getWidth()        Video width as defined by sender
 */
class Animation extends Entity
{
    /**
     * {@inheritDoc}
     */
    protected function subEntities(): array
    {
        return [
            'thumbnail' => PhotoSize::class,
        ];
    }
}
