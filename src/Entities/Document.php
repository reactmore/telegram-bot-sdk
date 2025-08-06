<?php

namespace Reactmore\TelegramBotSdk\Entities;

/**
 * Class Document
 *
 * @see https://core.telegram.org/bots/api#document
 *
 * @method string    getFileId()       Identifier for this file, which can be used to download or reuse the file
 * @method string    getFileName()     Optional. Original filename as defined by sender
 * @method int       getFileSize()     Optional. File size
 * @method string    getFileUniqueId() Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
 * @method string    getMimeType()     Optional. MIME type of the file as defined by sender
 * @method PhotoSize getThumbnail()    Optional. Document thumbnail as defined by sender
 */
class Document extends Entity
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
