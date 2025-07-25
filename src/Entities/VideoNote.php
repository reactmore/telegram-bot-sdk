<?php

namespace Reactmore\TelegramBotSdk\Entities;

/**
 * Class VideoNote
 *
 * @see https://core.telegram.org/bots/api#videonote
 *
 * @method int       getDuration()     Duration of the audio in seconds as defined by sender
 * @method string    getFileId()       Identifier for this file, which can be used to download or reuse the file
 * @method int       getFileSize()     Optional. File size
 * @method string    getFileUniqueId() Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
 * @method int       getLength()       Video width and height as defined by sender
 * @method PhotoSize getThumbnail()    Optional. Video thumbnail as defined by sender
 */
class VideoNote extends Entity
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
