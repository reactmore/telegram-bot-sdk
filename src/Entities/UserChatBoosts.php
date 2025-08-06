<?php

namespace Reactmore\TelegramBotSdk\Entities;

/**
 * This object represents a list of boosts added to a chat by a user.
 *
 * @see https://core.telegram.org/bots/api#userchatboosts
 *
 * @method list<ChatBoost> getBoosts() The list of boosts added to the chat by the user
 */
class UserChatBoosts extends Entity
{
    /**
     * {@inheritDoc}
     */
    protected function subEntities(): array
    {
        return [
            'boosts' => [ChatBoost::class],
        ];
    }
}
