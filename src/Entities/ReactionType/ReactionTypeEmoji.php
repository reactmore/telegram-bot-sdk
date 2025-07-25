<?php

namespace Reactmore\TelegramBotSdk\Entities\ReactionType;

use Reactmore\TelegramBotSdk\Entities\Entity;

/**
 * The reaction is based on an emoji.
 *
 * @see https://core.telegram.org/bots/api#reactiontypeemoji
 *
 * @method string getEmoji() Reaction emoji.
 * @method string getType()  Type of the reaction, always “emoji”
 */
class ReactionTypeEmoji extends Entity implements ReactionType
{
    public function __construct(array $data = [])
    {
        $data['type'] = 'emoji';
        parent::__construct($data);
    }
}
