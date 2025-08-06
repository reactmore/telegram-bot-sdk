<?php

namespace Reactmore\TelegramBotSdk\Entities\InlineQuery;

use Reactmore\TelegramBotSdk\Entities\InlineKeyboard;
use Reactmore\TelegramBotSdk\Entities\InputMessageContent\InputMessageContent;

/**
 * Class InlineQueryResultCachedAudio
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresultcachedaudio
 *
 * <code>
 * $data = [
 *   'id'                    => '',
 *   'audio_file_id'         => '',
 *   'caption'               => '',
 *   'reply_markup'          => <InlineKeyboard>,
 *   'input_message_content' => <InputMessageContent>,
 * ];
 * </code>
 *
 * @method string              getAudioFileId()                                                   A valid file identifier for the audio file
 * @method string              getCaption()                                                       Optional. Caption, 0-200 characters
 * @method list<MessageEntity> getCaptionEntities()                                               Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
 * @method string              getId()                                                            Unique identifier for this result, 1-64 bytes
 * @method InputMessageContent getInputMessageContent()                                           Optional. Content of the message to be sent instead of the audio
 * @method string              getParseMode()                                                     Optional. Mode for parsing entities in the audio caption
 * @method InlineKeyboard      getReplyMarkup()                                                   Optional. An Inline keyboard attached to the message
 * @method string              getType()                                                          Type of the result, must be audio
 * @method $this               setAudioFileId(string $audio_file_id)                              A valid file identifier for the audio file
 * @method $this               setCaption(string $caption)                                        Optional. Caption, 0-200 characters
 * @method $this               setCaptionEntities(array $caption_entities)                        Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
 * @method $this               setId(string $id)                                                  Unique identifier for this result, 1-64 bytes
 * @method $this               setInputMessageContent(InputMessageContent $input_message_content) Optional. Content of the message to be sent instead of the audio
 * @method $this               setParseMode(string $parse_mode)                                   Optional. Mode for parsing entities in the audio caption
 * @method $this               setReplyMarkup(InlineKeyboard $reply_markup)                       Optional. An Inline keyboard attached to the message
 */
class InlineQueryResultCachedAudio extends InlineEntity implements InlineQueryResult
{
    /**
     * InlineQueryResultCachedAudio constructor
     */
    public function __construct(array $data = [])
    {
        $data['type'] = 'audio';
        parent::__construct($data);
    }
}
