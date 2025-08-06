<?php

namespace Reactmore\TelegramBotSdk\Entities;

/**
 * Class Story
 *
 * @see https://core.telegram.org/bots/api#story
 *
 * @method Chat getChat() Chat that posted the story
 * @method int  getId()   Unique identifier for the story in the chat
 */
class Story extends Entity
{
    /**
     * {@inheritDoc}
     */
    protected function subEntities(): array
    {
        return [
            'chat' => Chat::class,
        ];
    }
}
