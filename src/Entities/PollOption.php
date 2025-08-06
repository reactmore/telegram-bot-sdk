<?php

namespace Reactmore\TelegramBotSdk\Entities;

/**
 * Class PollOption
 *
 * This entity contains information about one answer option in a poll.
 *
 * @see https://core.telegram.org/bots/api#polloption
 *
 * @method string              getText()         Option text, 1-100 characters
 * @method list<MessageEntity> getTextEntities() Optional. Special entities that appear in the option text. Currently, only custom emoji entities are allowed in poll option texts
 * @method int                 getVoterCount()   Number of users that voted for this option
 */
class PollOption extends Entity
{
    /**
     * {@inheritDoc}
     */
    protected function subEntities(): array
    {
        return [
            'text_entities' => [MessageEntity::class],
        ];
    }
}
