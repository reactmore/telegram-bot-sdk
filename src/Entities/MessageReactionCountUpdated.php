<?php

namespace Reactmore\TelegramBotSdk\Entities;

/**
 * This object represents reaction changes on a message with anonymous reactions.
 *
 * @see https://core.telegram.org/bots/api#messagereactioncountupdated
 *
 * @method Chat                getChat()      The chat containing the message
 * @method int                 getDate()      Date of the change in Unix time
 * @method int                 getMessageId() Unique message identifier inside the chat
 * @method list<ReactionCount> getReactions() List of reactions that are present on the message
 */
class MessageReactionCountUpdated extends Entity
{
    protected function subEntities(): array
    {
        return [
            'chat'      => Chat::class,
            'reactions' => [ReactionCount::class],
        ];
    }
}
