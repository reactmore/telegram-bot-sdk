<?php

namespace Reactmore\TelegramBotSdk\Entities\PaidMedia;

use Reactmore\TelegramBotSdk\Entities\PhotoSize;

/**
 * Class PaidMediaPhoto
 *
 * The paid media is a photo.
 *
 * @see https://core.telegram.org/bots/api#paidmediaphoto
 *
 * @method list<PhotoSize> getPhoto()                   The photo
 * @method string          getType()                    Type of the paid media, always “photo”
 * @method $this           setPhoto(PhotoSize[] $photo) The photo
 * @method $this           setType(string $type)        Type of the paid media, always “photo”
 */
class PaidMediaPhoto extends PaidMedia
{
    protected function subEntities(): array
    {
        return [
            'photo' => [PhotoSize::class],
        ];
    }
}
