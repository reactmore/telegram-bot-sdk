<?php

namespace Reactmore\TelegramBotSdk\Entities;

/**
 * Class ChatLocation
 *
 * Represents a location to which a chat is connected.
 *
 * @see https://core.telegram.org/bots/api#chatlocation
 *
 * @method string   getAddress()  Location address; 1-64 characters, as defined by the chat owner
 * @method Location getLocation() The location to which the supergroup is connected. Can't be a live location.
 */
class ChatLocation extends Entity
{
    /**
     * {@inheritDoc}
     */
    protected function subEntities(): array
    {
        return [
            'location' => Location::class,
        ];
    }
}
