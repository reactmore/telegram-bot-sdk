<?php

namespace Reactmore\TelegramBotSdk\Entities;

/**
 * This object contains information about the users whose identifiers were shared with the bot using a KeyboardButtonRequestUsers button.
 *
 * @see https://core.telegram.org/bots/api#usersshared
 *
 * @method int              getRequestId() Identifier of the request
 * @method list<SharedUser> getUsers()     Information about users shared with the bot.
 */
class UsersShared extends Entity
{
    /**
     * {@inheritDoc}
     */
    protected function subEntities(): array
    {
        return [
            'users' => [SharedUser::class],
        ];
    }
}
