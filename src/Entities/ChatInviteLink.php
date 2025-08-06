<?php

namespace Reactmore\TelegramBotSdk\Entities;

/**
 * Class ChatInviteLink
 *
 * Represents an invite link for a chat
 *
 * @see https://core.telegram.org/bots/api#chatinvitelink
 *
 * @method bool   getCreatesJoinRequest()                                               True, if users joining the chat via the link need to be approved by chat administrators
 * @method User   getCreator()                                                          Creator of the link
 * @method string getInviteLink()                                                       The invite link. If the link was created by another chat administrator, then the second part of the link will be replaced with “…”
 * @method bool   getIsPrimary()                                                        True, if the link is primary
 * @method bool   getIsRevoked()                                                        True, if the link is revoked
 * @method int    getMemberLimit()                                                      Optional. Maximum number of users that can be members of the chat simultaneously after joining the chat via this invite link; 1-99999
 * @method string getName()                                                             Optional. Invite link name
 * @method int    getPendingJoinRequestCount()                                          Optional. Number of pending join requests created using this link
 * @method int    getExpireDate()              Optional. Point in time (Unix timestamp) when the link will expire or has been expired
 */
class ChatInviteLink extends Entity
{
    /**
     * {@inheritDoc}
     */
    protected function subEntities(): array
    {
        return [
            'creator' => User::class,
        ];
    }
}
