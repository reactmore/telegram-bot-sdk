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

/**
 * This object represents a boost added to a chat or changed.
 *
 * @see https://core.telegram.org/bots/api#chatboostupdated
 *
 * @method ChatBoost getBoost() Information about the chat boost
 * @method Chat      getChat()  Chat which was boosted
 */
class ChatBoostUpdated extends Entity
{
    /**
     * {@inheritDoc}
     */
    protected function subEntities(): array
    {
        return [
            'chat'       => Chat::class,
            'chat_boost' => ChatBoost::class,
        ];
    }
}
