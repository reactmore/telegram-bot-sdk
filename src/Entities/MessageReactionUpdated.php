<?php

namespace Reactmore\TelegramBotSdk\Entities;

use Reactmore\TelegramBotSdk\Entities\ReactionType\Factory as ReactionTypeFactory;
use Reactmore\TelegramBotSdk\Entities\ReactionType\ReactionType;

/**
 * This object represents a change of a reaction on a message performed by a user.
 *
 * @see https://core.telegram.org/bots/api#messagereactionupdated
 *
 * @method Chat               getActorChat()   Optional. The chat on behalf of which the reaction was changed, if the user is anonymous
 * @method Chat               getChat()        The chat containing the message the user reacted to
 * @method int                getDate()        Date of the change in Unix time
 * @method int                getMessageId()   Unique identifier of the message inside the chat
 * @method list<ReactionType> getNewReaction() New list of reaction types that have been set by the user
 * @method list<ReactionType> getOldReaction() Previous list of reaction types that were set by the user
 * @method User               getUser()        Optional. The user that changed the reaction, if the user isn't anonymous
 */
class MessageReactionUpdated extends Entity
{
    protected function subEntities(): array
    {
        return [
            'chat'         => Chat::class,
            'user'         => User::class,
            'actor_chat'   => Chat::class,
            'old_reaction' => [ReactionTypeFactory::class],
            'new_reaction' => [ReactionTypeFactory::class],
        ];
    }
}
