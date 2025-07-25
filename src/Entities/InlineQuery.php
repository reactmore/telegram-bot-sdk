<?php

/**
 * This file is part of the TelegramBot package.
 *
 * (c) Avtandil Kikabidze aka LONGMAN <akalongman@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Reactmore\TelegramBotSdk\Entities;

use Reactmore\TelegramBotSdk\Entities\InlineQuery\InlineQueryResult;
use Reactmore\TelegramBotSdk\Request;

/**
 * Class InlineQuery
 *
 * @see https://core.telegram.org/bots/api#inlinequery
 *
 * @method string   getChatType()                                          Optional. Type of the chat, from which the inline query was sent. Can be either “sender” for a private chat with the inline query sender, “private”, “group”, “supergroup”, or “channel”. The chat type should be always known for requests sent from official clients and most third-party clients, unless the request was sent from a secret chat
 * @method User     getFrom()                                              Sender
 * @method string   getId()                                                Unique identifier for this query
 * @method Location getLocation()                                          Optional. Sender location, only for bots that request user location
 * @method string   getOffset()                                            Offset of the results to be returned, can be controlled by the bot
 * @method string   getQuery()    Text of the query (up to 512 characters)
 */
class InlineQuery extends Entity
{
    /**
     * {@inheritDoc}
     */
    protected function subEntities(): array
    {
        return [
            'from'     => User::class,
            'location' => Location::class,
        ];
    }

    /**
     * Answer this inline query with the passed results.
     *
     * @param list<InlineQueryResult> $results
     */
    public function answer(array $results, array $data = []): ServerResponse
    {
        return Request::answerInlineQuery(array_merge([
            'inline_query_id' => $this->getId(),
            'results'         => $results,
        ], $data));
    }
}
