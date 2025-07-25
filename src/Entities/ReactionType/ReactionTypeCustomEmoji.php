<?php

namespace Reactmore\TelegramBotSdk\Entities\ReactionType;

use Reactmore\TelegramBotSdk\Entities\Entity;

/**
 * The reaction is based on a custom emoji.
 *
 * @see https://core.telegram.org/bots/api#reactiontypecustomemoji
 *
 * @method string getCustomEmojiId() Custom emoji identifier
 * @method string getType()          Type of the reaction, always “custom_emoji”
 */
class ReactionTypeCustomEmoji extends Entity implements ReactionType
{
    public function __construct(array $data = [])
    {
        $data['type'] = 'custom_emoji';
        parent::__construct($data);
    }
}
