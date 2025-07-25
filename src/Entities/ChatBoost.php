<?php

/**
 * This file is part of the TelegramBot package.
 *
 * (c) Avtandil Kikabidze aka LONGMAN <akalongman@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

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
