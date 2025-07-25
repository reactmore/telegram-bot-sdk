<?php

namespace Reactmore\TelegramBotSdk\Entities\PaidMedia;

use Reactmore\TelegramBotSdk\Entities\Video;

/**
 * Class PaidMediaVideo
 *
 * The paid media is a video.
 *
 * @see https://core.telegram.org/bots/api#paidmediavideo
 *
 * @method string getType()              Type of the paid media, always “video”
 * @method Video  getVideo()             The video
 * @method $this  setType(string $type)  Type of the paid media, always “video”
 * @method $this  setVideo(Video $video) The video
 */
class PaidMediaVideo extends PaidMedia
{
    protected function subEntities(): array
    {
        return [
            'video' => Video::class,
        ];
    }
}
