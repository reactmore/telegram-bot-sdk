<?php

namespace Reactmore\TelegramBotSdk\Entities;

use Reactmore\TelegramBotSdk\Entities\Message\Factory as MaybeInaccessibleMessageFactory;
use Reactmore\TelegramBotSdk\Entities\Message\MaybeInaccessibleMessage;
use Reactmore\TelegramBotSdk\Request;

/**
 * Class CallbackQuery.
 *
 * @see https://core.telegram.org/bots/api#callbackquery
 *
 * @method string                   getChatInstance()    Global identifier, uniquely corresponding to the chat to which the message with the callback button was sent. Useful for high scores in games.
 * @method string                   getData()            Data associated with the callback button. Be aware that a bad client can send arbitrary data in this field
 * @method User                     getFrom()            Sender
 * @method string                   getGameShortName()   Optional. Short name of a Game to be returned, serves as the unique identifier for the game
 * @method string                   getId()              Unique identifier for this query
 * @method string                   getInlineMessageId() Optional. Identifier of the message sent via the bot in inline mode, that originated the query
 * @method MaybeInaccessibleMessage getMessage()         Optional. Message with the callback button that originated the query. Note that message content and message date will not be available if the message is too old
 * @method bool                     getIsTopicMessage() 
 */
class CallbackQuery extends Entity
{
    /**
     * {@inheritDoc}
     */
    protected function subEntities(): array
    {
        return [
            'from'    => User::class,
            'message' => MaybeInaccessibleMessageFactory::class,
        ];
    }

    /**
     * Answer this callback query.
     */
    public function answer(array $data = []): ServerResponse
    {
        return Request::answerCallbackQuery(array_merge([
            'callback_query_id' => $this->getId(),
        ], $data));
    }
}
