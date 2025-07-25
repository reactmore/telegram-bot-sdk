<?php

namespace Reactmore\TelegramBotSdk\Entities\ChatBoostSource;

use Reactmore\TelegramBotSdk\Entities\Entity;
use Reactmore\TelegramBotSdk\Entities\User;

/**
 * The boost was obtained by the creation of a Telegram Premium giveaway. This boosts the chat 4 times for the duration of the corresponding Telegram Premium subscription.
 *
 * @see https://core.telegram.org/bots/api#chatboostsourcegiveaway
 *
 * @method int    getGiveawayMessageId() Identifier of a message in the chat with the giveaway; the message could have been deleted already. May be 0 if the message isn't sent yet.
 * @method bool   getIsUnclaimed()       Optional. True, if the giveaway was completed, but there was no user to win the prize
 * @method string getSource()            Source of the boost, always “giveaway”
 * @method User   getUser()              Optional. User that won the prize in the giveaway if any
 */
class ChatBoostSourceGiveaway extends Entity implements ChatBoostSource
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
