<?php

namespace Reactmore\TelegramBotSdk\Entities;

use Reactmore\TelegramBotSdk\Entities\ChatBoostSource\Factory as ChatBoostSourceFactory;

/**
 * This object contains information about a chat boost.
 *
 * @see https://core.telegram.org/bots/api#chatboost
 *
 * @method string          getBoostId()                                       Unique identifier of the boost
 * @method ChatBoostSource getSource()                                        Source of the added boost
 * @method int             getExpirationDate() Point in time (Unix timestamp) when the boost will automatically expire, unless the booster's Telegram Premium subscription is prolonged
 */
class ChatBoost extends Entity
{
    /**
     * {@inheritDoc}
     */
    protected function subEntities(): array
    {
        return [
            'source' => ChatBoostSourceFactory::class,
        ];
    }
}
