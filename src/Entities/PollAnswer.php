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

/**
 * Class PollAnswer
 *
 * This entity represents an answer of a user in a non-anonymous poll.
 *
 * @see https://core.telegram.org/bots/api#pollanswer
 *
 * @method array  getOptionIds() 0-based identifiers of answer options, chosen by the user. May be empty if the user retracted their vote.
 * @method string getPollId()    Unique poll identifier
 * @method User   getUser()      Optional. The user, who changed the answer to the poll
 * @method Chat   getVoterChat() Optional. The chat that changed the answer to the poll, if the voter is anonymous
 */
class PollAnswer extends Entity
{
    /**
     * {@inheritDoc}
     */
    protected function subEntities(): array
    {
        return [
            'voter_chat' => Chat::class,
            'user'       => User::class,
        ];
    }
}
