<?php

namespace Reactmore\TelegramBotSdk\Entities;

/**
 * Class File
 *
 * @see https://core.telegram.org/bots/api#file
 *
 * @method string getFileId()       Identifier for this file, which can be used to download or reuse the file
 * @method string getFilePath()     Optional. File path. Use https://api.telegram.org/file/bot<token>/<file_path> to get the file.
 * @method int    getFileSize()     Optional. File size, if known
 * @method string getFileUniqueId() Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
 */
class File extends Entity
{
}
