<?php

/**
 * This file is part of the TelegramBot package.
 *
 * (c) Avtandil Kikabidze aka LONGMAN <akalongman@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Reactmore\TelegramBotSdk\Entities\InputMedia;

use Reactmore\TelegramBotSdk\Entities\Entity;

/**
 * Class InputMediaPhoto
 *
 * @see https://core.telegram.org/bots/api#inputmediaphoto
 *
 * <code>
 * $data = [
 *   'media'      => '123abc',
 *   'caption'    => '*Photo* caption',
 *   'parse_mode' => 'markdown',
 * ];
 * </code>
 *
 * @method string              getCaption()                                Optional. Caption of the photo to be sent, 0-200 characters
 * @method list<MessageEntity> getCaptionEntities()                        Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
 * @method bool                getHasSpoiler()                             Optional. Pass True if the photo needs to be covered with a spoiler animation
 * @method string              getParseMode()                              Optional. Mode for parsing entities in the photo caption
 * @method string              getType()                                   Type of the result, must be photo
 * @method $this               setMedia(string $media)                     File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended), pass an HTTP URL for Telegram to get a file from the Internet, or pass "attach://<file_attach_name>" to upload a new one using multipart/form-data under <file_attach_name> name.
 * @method $this               setCaption(string $caption)                 Optional. Caption of the photo to be sent, 0-200 characters
 * @method $this               setCaptionEntities(array $caption_entities) Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
 * @method $this               setHasSpoiler(bool $has_spoiler)            Optional. Pass True if the photo needs to be covered with a spoiler animation
 * @method $this               setParseMode(string $parse_mode)            Optional. Mode for parsing entities in the photo caption
 */
class InputMediaPhoto extends Entity implements InputMedia
{
    /**
     * InputMediaPhoto constructor
     */
    public function __construct(array $data = [])
    {
        $data['type'] = 'photo';
        parent::__construct($data);
    }
}
