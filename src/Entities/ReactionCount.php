<?php

namespace Reactmore\TelegramBotSdk\Entities;

use Reactmore\TelegramBotSdk\Entities\ReactionType\Factory as ReactionTypeFactory;
use Reactmore\TelegramBotSdk\Entities\ReactionType\ReactionType;

/**
 * Represents a reaction added to a message along with the number of times it was added.
 *
 * @see https://core.telegram.org/bots/api#reactioncount
 *
 * @method int          getTotalCount() Number of times the reaction was added
 * @method ReactionType getType()       Type of the reaction
 */
class ReactionCount extends Entity
{
    protected function subEntities(): array
    {
        return [
            'type' => ReactionTypeFactory::class,
        ];
    }
}
