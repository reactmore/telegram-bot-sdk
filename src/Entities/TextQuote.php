<?php

namespace Reactmore\TelegramBotSdk\Entities;

/**
 * This object contains information about the quoted part of a message that is replied to by the given message.
 *
 * @see https://core.telegram.org/bots/api#textquote
 *
 * @method list<MessageEntity> getEntities() Optional. Special entities that appear in the quote. Currently, only bold, italic, underline, strikethrough, spoiler, and custom_emoji entities are kept in quotes.
 * @method bool                getIsManual() Optional. True, if the quote was chosen manually by the message sender. Otherwise, the quote was added automatically by the server.
 * @method int                 getPosition() Approximate quote position in the original message in UTF-16 code units as specified by the sender
 * @method string              getText()     Text of the quoted part of a message that is replied to by the given message
 */
class TextQuote extends Entity
{
    /**
     * {@inheritDoc}
     */
    protected function subEntities(): array
    {
        return [
            'entities' => [MessageEntity::class],
        ];
    }
}
