<?php

namespace Reactmore\TelegramBotSdk\Entities;

/**
 * Class Sticker
 *
 * @see https://core.telegram.org/bots/api#sticker
 *
 * @method string       getCustomEmojiId()    Optional. For custom emoji stickers, unique identifier of the custom emoji
 * @method string       getEmoji()            Optional. Emoji associated with the sticker
 * @method string       getFileId()           Identifier for this file, which can be used to download or reuse the file
 * @method int          getFileSize()         Optional. File size
 * @method string       getFileUniqueId()     Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
 * @method int          getHeight()           Sticker height
 * @method bool         getIsAnimated()       True, if the sticker is animated
 * @method bool         getIsVideo()          True, if the sticker is a video sticker
 * @method MaskPosition getMaskPosition()     Optional. For mask stickers, the position where the mask should be placed
 * @method bool         getNeedsRepainting()  Optional. True, if the sticker must be repainted to a text color in messages, the color of the Telegram Premium badge in emoji status, white color on chat photos, or another appropriate color in other places
 * @method File         getPremiumAnimation() Optional. Premium animation for the sticker, if the sticker is premium
 * @method string       getSetName()          Optional. Name of the sticker set to which the sticker belongs
 * @method PhotoSize    getThumbnail()        Optional. Sticker thumbnail in .webp or .jpg format
 * @method string       getType()             Type of the sticker, currently one of “regular”, “mask”, “custom_emoji”. The type of the sticker is independent from its format, which is determined by the fields is_animated and is_video.
 * @method int          getWidth()            Sticker width
 */
class Sticker extends Entity
{
    /**
     * {@inheritDoc}
     */
    protected function subEntities(): array
    {
        return [
            'thumbnail'         => PhotoSize::class,
            'premium_animation' => File::class,
            'mask_position'     => MaskPosition::class,
        ];
    }
}
