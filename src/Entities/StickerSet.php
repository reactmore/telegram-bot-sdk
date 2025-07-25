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
 * Class StickerSet
 *
 * @see https://core.telegram.org/bots/api#stickerset
 *
 * @method string        getName()        Sticker set name
 * @method list<Sticker> getStickers()    List of all set stickers
 * @method string        getStickerType() Type of stickers in the set, currently one of “regular”, “mask”, “custom_emoji”
 * @method PhotoSize     getThumbnail()   Optional. Sticker set thumbnail in the .WEBP or .TGS format
 * @method string        getTitle()       Sticker set title
 */
class StickerSet extends Entity
{
    /**
     * {@inheritDoc}
     */
    protected function subEntities(): array
    {
        return [
            'stickers'  => [Sticker::class],
            'thumbnail' => PhotoSize::class,
        ];
    }
}
