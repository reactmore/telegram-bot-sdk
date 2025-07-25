<?php

namespace Reactmore\TelegramBotSdk\Entities;

use Reactmore\TelegramBotSdk\Entities\PaidMedia\PaidMedia;

/**
 * Class PaidMediaInfo
 *
 * Describes the paid media.
 *
 * @see https://core.telegram.org/bots/api#paidmediainfo
 *
 * @method list<PaidMedia> getPaidMedia()                       The paid media
 * @method int             getStarCount()                       The number of Telegram Stars that must be paid to buy access to the media
 * @method $this           setPaidMedia(PaidMedia[] $paidMedia) The paid media
 * @method $this           setStarCount(int $starCount)         The number of Telegram Stars that must be paid to buy access to the media
 */
class PaidMediaInfo extends Entity
{
    protected function subEntities(): array
    {
        return [
            'paid_media' => [PaidMedia::class],
        ];
    }
}
