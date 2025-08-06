<?php


namespace Reactmore\TelegramBotSdk\Entities\InlineQuery;

use Reactmore\TelegramBotSdk\Entities\InlineKeyboard;
use Reactmore\TelegramBotSdk\Entities\InputMessageContent\InputMessageContent;

/**
 * Class InlineQueryResultCachedGif
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresultcachedgif
 *
 * <code>
 * $data = [
 *   'id'                    => '',
 *   'gif_file_id'           => '',
 *   'title'                 => '',
 *   'caption'               => '',
 *   'reply_markup'          => <InlineKeyboard>,
 *   'input_message_content' => <InputMessageContent>,
 * ];
 * </code>
 *
 * @method string              getCaption()                                                       Optional. Caption of the GIF file to be sent, 0-200 characters
 * @method list<MessageEntity> getCaptionEntities()                                               Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
 * @method string              getGifFileId()                                                     A valid file identifier for the GIF file
 * @method string              getId()                                                            Unique identifier for this result, 1-64 bytes
 * @method InputMessageContent getInputMessageContent()                                           Optional. Content of the message to be sent instead of the GIF animation
 * @method string              getParseMode()                                                     Optional. Mode for parsing entities in the caption
 * @method InlineKeyboard      getReplyMarkup()                                                   Optional. An Inline keyboard attached to the message
 * @method string              getTitle()                                                         Optional. Title for the result
 * @method string              getType()                                                          Type of the result, must be gif
 * @method $this               setCaption(string $caption)                                        Optional. Caption of the GIF file to be sent, 0-200 characters
 * @method $this               setCaptionEntities(array $caption_entities)                        Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
 * @method $this               setGifFileId(string $gif_file_id)                                  A valid file identifier for the GIF file
 * @method $this               setId(string $id)                                                  Unique identifier for this result, 1-64 bytes
 * @method $this               setInputMessageContent(InputMessageContent $input_message_content) Optional. Content of the message to be sent instead of the GIF animation
 * @method $this               setParseMode(string $parse_mode)                                   Optional. Mode for parsing entities in the caption
 * @method $this               setReplyMarkup(InlineKeyboard $reply_markup)                       Optional. An Inline keyboard attached to the message
 * @method $this               setTitle(string $title)                                            Optional. Title for the result
 */
class InlineQueryResultCachedGif extends InlineEntity implements InlineQueryResult
{
    /**
     * InlineQueryResultCachedGif constructor
     */
    public function __construct(array $data = [])
    {
        $data['type'] = 'gif';
        parent::__construct($data);
    }
}
