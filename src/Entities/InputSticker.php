<?php

namespace Reactmore\TelegramBotSdk\Entities;

/**
 * Class InputSticker
 *
 * This entity describes a sticker to be added to a sticker set.
 *
 * @see https://core.telegram.org/bots/api#inputsticker
 *
 * @method list<string> getEmojiList()    List of 1-20 emoji associated with the sticker
 * @method string       getFormat()       Format of the sticker, must be one of “static”, “animated”, “video”
 * @method list<string> getKeywords()     Optional. List of 0-20 search keywords for the sticker with total length of up to 64 characters. For “regular” and “custom_emoji” stickers only.
 * @method MaskPosition getMaskPosition() Optional. Position where the mask should be placed on faces. For “mask” stickers only.
 * @method string       getSticker()      The added sticker. Pass a file_id as a String to send a file that already exists on the Telegram servers, pass an HTTP URL as a String for Telegram to get a file from the Internet, upload a new one using multipart/form-data, or pass “attach://<file_attach_name>” to upload a new one using multipart/form-data under <file_attach_name> name. Animated and video stickers can't be uploaded via HTTP URL. More information on Sending Files »
 */
class InputSticker extends Entity
{
}
