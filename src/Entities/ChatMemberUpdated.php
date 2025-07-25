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

use Reactmore\TelegramBotSdk\Entities\ChatMember\ChatMember;
use Reactmore\TelegramBotSdk\Entities\ChatMember\Factory as ChatMemberFactory;

/**
 * Class ChatMemberUpdated
 *
 * Represents changes in the status of a chat member
 *
 * @see https://core.telegram.org/bots/api#chatmemberupdated
 *
 * @method Chat           getChat()                    Chat the user belongs to
 * @method int            getDate()                    Date the change was done in Unix time
 * @method User           getFrom()                    Performer of the action, which resulted in the change
 * @method ChatInviteLink getInviteLink()              Optional. Chat invite link, which was used by the user to join the chat; for joining by invite link events only.
 * @method ChatMember     getNewChatMember()           New information about the chat member
 * @method ChatMember     getOldChatMember()           Previous information about the chat member
 * @method bool           getViaChatFolderInviteLink() Optional. True, if the user joined the chat via a chat folder invite link
 * @method bool           getViaJoinRequest()          Optional. True, if the user joined the chat after sending a direct join request without using an invite link and being approved by an administrator
 */
class ChatMemberUpdated extends Entity
{
    /**
     * {@inheritDoc}
     */
    protected function subEntities(): array
    {
        return [
            'chat'            => Chat::class,
            'from'            => User::class,
            'old_chat_member' => ChatMemberFactory::class,
            'new_chat_member' => ChatMemberFactory::class,
            'invite_link'     => ChatInviteLink::class,
        ];
    }
}
