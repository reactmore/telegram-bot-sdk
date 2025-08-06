<?php

namespace Reactmore\TelegramBotSdk\Entities;

/**
 * This object represents a service message about new members invited to a video chat.
 *
 * @see https://core.telegram.org/bots/api#videochatparticipantsinvited
 *
 * @method list<User> getUsers() New members that were invited to the video chat
 */
class VideoChatParticipantsInvited extends Entity
{
    /**
     * {@inheritDoc}
     */
    protected function subEntities(): array
    {
        return [
            'users' => [User::class],
        ];
    }
}
