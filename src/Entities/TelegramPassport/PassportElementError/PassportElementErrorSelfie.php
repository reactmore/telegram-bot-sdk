<?php

namespace Entities\TelegramPassport\PassportElementError;

use Reactmore\TelegramBotSdk\Entities\Entity;

/**
 * Class PassportElementErrorSelfie
 *
 * Represents an issue with the selfie with a document. The error is considered resolved when the file with the selfie changes.
 *
 * @see https://core.telegram.org/bots/api#passportelementerrorselfie
 *
 * @method string getFileHash() Base64-encoded hash of the file with the selfie
 * @method string getMessage()  Error message
 * @method string getSource()   Error source, must be selfie
 * @method string getType()     The section of the user's Telegram Passport which has the issue, one of “passport”, “driver_license”, “identity_card”, “internal_passport”
 */
class PassportElementErrorSelfie extends Entity implements PassportElementError
{
    /**
     * PassportElementErrorSelfie constructor
     */
    public function __construct(array $data = [])
    {
        $data['source'] = 'selfie';
        parent::__construct($data);
    }
}
