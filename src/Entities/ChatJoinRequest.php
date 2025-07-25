<?php

namespace Reactmore\TelegramBotSdk\Entities;

/**
 * Class ChatJoinRequest
 *
 * Represents a join request sent to a chat.
 *
 * @see https://core.telegram.org/bots/api#chatjoinrequest
 *
 * @method string         getBio()        Optional. Bio of the user.
 * @method Chat           getChat()       Chat to which the request was sent
 * @method int            getDate()       Date the request was sent in Unix time
 * @method User           getFrom()       User that sent the join request
 * @method ChatInviteLink getInviteLink() Optional. Chat invite link that was used by the user to send the join request
 * @method int            getUserChatId() Identifier of a private chat with the user who sent the join request.
 */
class ChatJoinRequest extends Entity
{
    protected function subEntities(): array
    {
        return [
            'chat'        => Chat::class,
            'from'        => User::class,
            'invite_link' => ChatInviteLink::class,
        ];
    }
}
