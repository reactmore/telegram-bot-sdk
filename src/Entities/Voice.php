<?php

namespace Reactmore\TelegramBotSdk\Entities;

/**
 * Class Voice
 *
 * @see https://core.telegram.org/bots/api#voice
 *
 * @method int    getDuration()     Duration of the audio in seconds as defined by sender
 * @method string getFileId()       Identifier for this file, which can be used to download or reuse the file
 * @method int    getFileSize()     Optional. File size
 * @method string getFileUniqueId() Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
 * @method string getMimeType()     Optional. MIME type of the file as defined by sender
 */
class Voice extends Entity
{
}
