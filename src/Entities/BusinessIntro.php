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
