<?php

namespace Entities\TelegramPassport\PassportElementError;

use Reactmore\TelegramBotSdk\Entities\Entity;

/**
 * Class PassportElementErrorFile
 *
 * Represents an issue with a document scan. The error is considered resolved when the file with the document scan changes.
 *
 * @see https://core.telegram.org/bots/api#passportelementerrorfile
 *
 * @method string getFileHash() Base64-encoded file hash
 * @method string getMessage()  Error message
 * @method string getSource()   Error source, must be file
 * @method string getType()     The section of the user's Telegram Passport which has the issue, one of “utility_bill”, “bank_statement”, “rental_agreement”, “passport_registration”, “temporary_registration”
 */
class PassportElementErrorFile extends Entity implements PassportElementError
{
    /**
     * PassportElementErrorFile constructor
     */
    public function __construct(array $data = [])
    {
        $data['source'] = 'file';
        parent::__construct($data);
    }
}
