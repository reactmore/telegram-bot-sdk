<?php

namespace Reactmore\TelegramBotSdk\Entities\TelegramPassport;

use Reactmore\TelegramBotSdk\Entities\Entity;

/**
 * Class PassportFile
 *
 * This object represents a file uploaded to Telegram Passport. Currently all Telegram Passport files are in JPEG format when decrypted and don't exceed 10MB.
 *
 * @link https://core.telegram.org/bots/api#passportfile
 *
 * @method int    getFileDate()     Unix time when the file was uploaded
 * @method string getFileId()       Identifier for this file, which can be used to download or reuse the file
 * @method int    getFileSize()     File size
 * @method string getFileUniqueId() Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
 */
class PassportFile extends Entity
{
}
