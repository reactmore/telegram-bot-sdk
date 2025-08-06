<?php

namespace Reactmore\TelegramBotSdk\Entities;

/**
 * Class Video
 *
 * @see https://core.telegram.org/bots/api#video
 *
 * @method int       getDuration()     Duration of the video in seconds as defined by sender
 * @method string    getFileId()       Identifier for this file, which can be used to download or reuse the file
 * @method string    getFileName()     Optional. Original filename as defined by sender
 * @method int       getFileSize()     Optional. File size
 * @method string    getFileUniqueId() Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
 * @method int       getHeight()       Video height as defined by sender
 * @method string    getMimeType()     Optional. Mime type of a file as defined by sender
 * @method PhotoSize getThumbnail()    Optional. Video thumbnail
 * @method int       getWidth()        Video width as defined by sender
 */
class Video extends Entity
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
