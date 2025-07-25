<?php

namespace Reactmore\TelegramBotSdk\Entities\ChatBoostSource;

use Reactmore\TelegramBotSdk\Entities\Entity;
use Reactmore\TelegramBotSdk\Entities\User;

/**
 * The boost was obtained by subscribing to Telegram Premium or by gifting a Telegram Premium subscription to another user.
 *
 * @see https://core.telegram.org/bots/api#chatboostsourcepremium
 *
 * @method string getSource() Source of the boost, always “premium”
 * @method User   getUser()   User that boosted the chat
 */
class ChatBoostSourcePremium extends Entity implements ChatBoostSource
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
