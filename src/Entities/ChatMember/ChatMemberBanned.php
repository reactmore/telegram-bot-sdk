<?php

namespace Reactmore\TelegramBotSdk\Entities\ChatMember;

use Reactmore\TelegramBotSdk\Entities\Entity;
use Reactmore\TelegramBotSdk\Entities\User;

/**
 * Class ChatMemberBanned
 *
 * @see https://core.telegram.org/bots/api#chatmemberbanned
 *
 * @method string getStatus()    The member's status in the chat, always “kicked”
 * @method int    getUntilDate() Date when restrictions will be lifted for this user; unix time
 * @method User   getUser()      Information about the user
 */
class ChatMemberBanned extends Entity implements ChatMember
{
    /**
     * {@inheritDoc}
     */
    protected function subEntities(): array
    {
        return [
            'user' => User::class,
        ];
    }
}
