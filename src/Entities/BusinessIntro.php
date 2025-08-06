<?php

namespace Reactmore\TelegramBotSdk\Entities;

/**
 * Class BusinessIntro
 *
 * Describes the introductory message of a business account.
 *
 * @see https://core.telegram.org/bots/api#businessintro
 *
 * @method string  getMessage() Optional. Message text of the business intro
 * @method Sticker getSticker() Optional. Sticker of the business intro
 * @method string  getTitle()   Optional. Title text of the business intro
 */
class BusinessIntro extends Entity
{
    /**
     * {@inheritDoc}
     */
    protected function subEntities(): array
    {
        return [
            'sticker' => Sticker::class,
        ];
    }
}
