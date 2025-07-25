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
 * This object represents a boost removed from a chat.
 *
 * @see https://core.telegram.org/bots/api#chatboostremoved
 *
 * @method string          getBoostId()                                   Unique identifier of the boost
 * @method Chat            getChat()                                      Chat which was boosted
 * @method ChatBoostSource getSource()                                    Source of the removed boost
 * @method int             getRemoveDate() Point in time (Unix timestamp) when the boost was removed
 */
class ChatBoostRemoved extends Entity
{
    /**
     * {@inheritDoc}
     */
    protected function subEntities(): array
    {
        return [
            'chat'   => Chat::class,
            'source' => ChatBoostSourceFactory::class,
        ];
    }
}
