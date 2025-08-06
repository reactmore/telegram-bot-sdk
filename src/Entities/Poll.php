<?php

namespace Reactmore\TelegramBotSdk\Entities;

/**
 * Class Poll
 *
 * This entity contains information about a poll.
 *
 * @see https://core.telegram.org/bots/api#poll
 *
 * @method bool                getAllowsMultipleAnswers()                                                                                                                                                     True, if the poll allows multiple answers
 * @method string              getExplanation()                                                                                                                                                               Optional. Text that is shown when a user chooses an incorrect answer or taps on the lamp icon in a quiz-style poll, 0-200 characters
 * @method list<MessageEntity> getExplanationEntities()                                                                                                                                                       Optional. Special entities like usernames, URLs, bot commands, etc. that appear in the explanation
 * @method string              getId()                                                                                                                                                                        Unique poll identifier
 * @method bool                getIsAnonymous()                                                                                                                                                               True, if the poll is anonymous
 * @method bool                getIsClosed()                                                                                                                                                                  True, if the poll is closed
 * @method int                 getOpenPeriod()                                                                                                                                                                Optional. Amount of time in seconds the poll will be active after creation
 * @method list<PollOption>    getOptions()                                                                                                                                                                   List of poll options
 * @method string              getQuestion()                                                                                                                                                                  Poll question, 1-255 characters
 * @method list<MessageEntity> getQuestionEntities()                                                                                                                                                          Optional. Special entities that appear in the question. Currently, only custom emoji entities are allowed in poll questions
 * @method int                 getTotalVoterCount()                                                                                                                                                           Total number of users that voted in the poll
 * @method string              getType()                                                                                                                                                                      Poll type, currently can be “regular” or “quiz”
 * @method int                 getCorrectOptionId()       Optional. 0-based identifier of the correct answer option. Available only for polls in the quiz mode, which are closed, or was sent (not forwarded) by the bot or to the private chat with the bot.
 * @method int                 getCloseDate()             Optional. Point in time (Unix timestamp)                                                                                                            when the poll will be automatically closed
 */
class Poll extends Entity
{
    /**
     * {@inheritDoc}
     */
    protected function subEntities(): array
    {
        return [
            'options'              => [PollOption::class],
            'explanation_entities' => [MessageEntity::class],
            'question_entities'    => [MessageEntity::class],
        ];
    }
}
