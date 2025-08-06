<?php

namespace Reactmore\TelegramBotSdk\Entities\Background;

use Reactmore\TelegramBotSdk\Entities\Entity;

/**
 * Class BackgroundType
 *
 * This object represents the type of a background. Currently, it can be one of
 * - BackgroundTypeFill
 * - BackgroundTypeWallpaper
 * - BackgroundTypePattern
 * - BackgroundTypeChatTheme
 *
 * @see https://core.telegram.org/bots/api#backgroundtype
 *
 * @method string getType() Type of the background
 */
class BackgroundType extends Entity
{
    // Further specific properties depend on the actual type of background,
    // which will be handled by subclasses or by checking the 'type' field.
    // For example, BackgroundTypeFill, BackgroundTypeWallpaper, etc.
}
