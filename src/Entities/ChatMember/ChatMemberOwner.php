<?php

namespace Reactmore\TelegramBotSdk\Entities\ChatMember;

use Reactmore\TelegramBotSdk\Entities\Entity;
use Reactmore\TelegramBotSdk\Entities\User;

/**
 * Class ChatMemberOwner
 *
 * @see https://core.telegram.org/bots/api#chatmemberowner
 *
 * @method string getCustomTitle() Custom title for this user
 * @method bool   getIsAnonymous() True, if the user's presence in the chat is hidden
 * @method string getStatus()      The member's status in the chat, always “creator”
 * @method User   getUser()        Information about the user
 */
class ChatMemberOwner extends Entity implements ChatMember
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
