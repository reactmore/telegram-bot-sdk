<?php

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
