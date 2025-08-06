<?php

namespace Reactmore\TelegramBotSdk\Entities\Poll;

use Reactmore\TelegramBotSdk\Entities\Entity;
use Reactmore\TelegramBotSdk\Entities\MessageEntity;

/**
 * Class InputPollOption
 *
 * This entity contains information about one answer option in a poll to be sent.
 *
 * @see https://core.telegram.org/bots/api#inputpolloption
 *
 * @method string              getText()         Option text, 1-100 characters
 * @method list<MessageEntity> getTextEntities() Optional. A JSON-serialized list of special entities that appear in the poll option text. It can be specified instead of text_parse_mode
 */
class InputPollOption extends Entity
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
