<?php

namespace Reactmore\TelegramBotSdk\Entities\InlineQuery;

use Reactmore\TelegramBotSdk\Entities\InlineKeyboard;
use Reactmore\TelegramBotSdk\Entities\InputMessageContent\InputMessageContent;

/**
 * Class InlineQueryResultCachedVideo
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresultcachedvideo
 *
 * <code>
 * $data = [
 *   'id'                    => '',
 *   'video_file_id'         => '',
 *   'title'                 => '',
 *   'description'           => '',
 *   'caption'               => '',
 *   'reply_markup'          => <InlineKeyboard>,
 *   'input_message_content' => <InputMessageContent>,
 * ];
 * </code>
 *
 * @method string              getCaption()                                                       Optional. Caption of the video to be sent, 0-200 characters
 * @method list<MessageEntity> getCaptionEntities()                                               Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
 * @method string              getDescription()                                                   Optional. Short description of the result
 * @method string              getId()                                                            Unique identifier for this result, 1-64 bytes
 * @method InputMessageContent getInputMessageContent()                                           Optional. Content of the message to be sent instead of the video
 * @method string              getParseMode()                                                     Optional. Mode for parsing entities in the video caption
 * @method InlineKeyboard      getReplyMarkup()                                                   Optional. An Inline keyboard attached to the message
 * @method string              getTitle()                                                         Title for the result
 * @method string              getType()                                                          Type of the result, must be video
 * @method string              getVideoFileId()                                                   A valid file identifier for the video file
 * @method $this               setCaption(string $caption)                                        Optional. Caption of the video to be sent, 0-200 characters
 * @method $this               setCaptionEntities(array $caption_entities)                        Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
 * @method $this               setDescription(string $description)                                Optional. Short description of the result
 * @method $this               setId(string $id)                                                  Unique identifier for this result, 1-64 bytes
 * @method $this               setInputMessageContent(InputMessageContent $input_message_content) Optional. Content of the message to be sent instead of the video
 * @method $this               setParseMode(string $parse_mode)                                   Optional. Mode for parsing entities in the video caption
 * @method $this               setReplyMarkup(InlineKeyboard $reply_markup)                       Optional. An Inline keyboard attached to the message
 * @method $this               setTitle(string $title)                                            Title for the result
 * @method $this               setVideoFileId(string $video_file_id)                              A valid file identifier for the video file
 */
class InlineQueryResultCachedVideo extends InlineEntity implements InlineQueryResult
{
    /**
     * InlineQueryResultCachedVideo constructor
     */
    public function __construct(array $data = [])
    {
        $data['type'] = 'video';
        parent::__construct($data);
    }
}
