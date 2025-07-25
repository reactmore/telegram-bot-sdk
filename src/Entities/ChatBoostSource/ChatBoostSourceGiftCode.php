<?php

namespace Reactmore\TelegramBotSdk\Entities\ChatBoostSource;

use Reactmore\TelegramBotSdk\Entities\Entity;
use Reactmore\TelegramBotSdk\Entities\User;

/**
 * The boost was obtained by the creation of Telegram Premium gift codes to boost a chat.
 *
 * @see https://core.telegram.org/bots/api#chatboostsourcegiftcode
 *
 * @method string getSource() Source of the boost, always “gift_code”
 * @method User   getUser()   User for which the gift code was created
 */
class ChatBoostSourceGiftCode extends Entity implements ChatBoostSource
{
    /**
     * {@inheritDoc}
     */
    protected function subEntities(): array
    {
        return [
            'user' => User::class,
        ];
    }
}
