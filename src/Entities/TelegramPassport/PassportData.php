<?php

namespace Reactmore\TelegramBotSdk\Entities\TelegramPassport;

use Reactmore\TelegramBotSdk\Entities\Entity;

/**
 * Class PassportData
 *
 * Contains information about Telegram Passport data shared with the bot by the user.
 *
 * @see https://core.telegram.org/bots/api#passportdata
 *
 * @method EncryptedCredentials           getCredentials() Encrypted credentials required to decrypt the data
 * @method list<EncryptedPassportElement> getData()        Array with information about documents and other Telegram Passport elements that was shared with the bot
 */
class PassportData extends Entity
{
    /**
     * {@inheritDoc}
     */
    protected function subEntities(): array
    {
        return [
            'data'        => [EncryptedPassportElement::class],
            'credentials' => EncryptedCredentials::class,
        ];
    }
}
