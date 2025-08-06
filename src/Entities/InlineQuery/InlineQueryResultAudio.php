<?php

namespace Reactmore\TelegramBotSdk\Entities\InlineQuery;

use Reactmore\TelegramBotSdk\Entities\InlineKeyboard;
use Reactmore\TelegramBotSdk\Entities\InputMessageContent\InputMessageContent;

/**
 * Class InlineQueryResultAudio
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresultaudio
 *
 * <code>
 * $data = [
 *   'id'                    => '',
 *   'audio_url'             => '',
 *   'title'                 => '',
 *   'caption'               => '',
 *   'performer'             => '',
 *   'audio_duration'        => 123,
 *   'reply_markup'          => <InlineKeyboard>,
 *   'input_message_content' => <InputMessageContent>,
 * ];
 * </code>
 *
 * @method int                 getAudioDuration()                                                 Optional. Audio duration in seconds
 * @method string              getAudioUrl()                                                      A valid URL for the audio file
 * @method string              getCaption()                                                       Optional. Caption, 0-200 characters
 * @method list<MessageEntity> getCaptionEntities()                                               Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
 * @method string              getId()                                                            Unique identifier for this result, 1-64 bytes
 * @method InputMessageContent getInputMessageContent()                                           Optional. Content of the message to be sent instead of the audio
 * @method string              getParseMode()                                                     Optional. Mode for parsing entities in the audio caption
 * @method string              getPerformer()                                                     Optional. Performer
 * @method InlineKeyboard      getReplyMarkup()                                                   Optional. Inline keyboard attached to the message
 * @method string              getTitle()                                                         Title
 * @method string              getType()                                                          Type of the result, must be audio
 * @method $this               setAudioDuration(int $audio_duration)                              Optional. Audio duration in seconds
 * @method $this               setAudioUrl(string $audio_url)                                     A valid URL for the audio file
 * @method $this               setCaption(string $caption)                                        Optional. Caption, 0-200 characters
 * @method $this               setCaptionEntities(array $caption_entities)                        Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
 * @method $this               setId(string $id)                                                  Unique identifier for this result, 1-64 bytes
 * @method $this               setInputMessageContent(InputMessageContent $input_message_content) Optional. Content of the message to be sent instead of the audio
 * @method $this               setParseMode(string $parse_mode)                                   Optional. Mode for parsing entities in the audio caption
 * @method $this               setPerformer(string $performer)                                    Optional. Performer
 * @method $this               setReplyMarkup(InlineKeyboard $reply_markup)                       Optional. Inline keyboard attached to the message
 * @method $this               setTitle(string $title)                                            Title
 */
class InlineQueryResultAudio extends InlineEntity implements InlineQueryResult
{
    /**
     * InlineQueryResultAudio constructor
     */
    public function __construct(array $data = [])
    {
        $data['type'] = 'audio';
        parent::__construct($data);
    }
}
