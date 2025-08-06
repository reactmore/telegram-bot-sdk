<?php

namespace Reactmore\TelegramBotSdk\Entities;

use Reactmore\TelegramBotSdk\Entities\Background\BackgroundType;

/**
 * Class ChatBackground
 *
 * This object represents a chat background.
 *
 * @see https://core.telegram.org/bots/api#chatbackground
 *
 * @method BackgroundType getType() Type of the background
 */
class ChatBackground extends Entity
{
    /**
     * {@inheritDoc}
     */
    protected function subEntities(): array
    {
        return [
            'type' => BackgroundType::class,
        ];
    }
}
