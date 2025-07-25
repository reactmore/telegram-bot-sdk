<?php

/**
 * This file is part of the TelegramBot package.
 *
 * (c) Avtandil Kikabidze aka LONGMAN <akalongman@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Reactmore\TelegramBotSdk\Entities\InlineQuery;

use Reactmore\TelegramBotSdk\Entities\InlineKeyboard;
use Reactmore\TelegramBotSdk\Entities\InputMessageContent\InputMessageContent;

/**
 * Class InlineQueryResultContact
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresultcontact
 *
 * <code>
 * $data = [
 *   'id'                    => '',
 *   'phone_number'          => '',
 *   'first_name'            => '',
 *   'last_name'             => '',
 *   'reply_markup'          => <InlineKeyboard>,
 *   'input_message_content' => <InputMessageContent>,
 *   'thumbnail_url'         => '',
 *   'thumbnail_width'       => 30,
 *   'thumbnail_height'      => 30,
 * ];
 * </code>
 *
 * @method string              getFirstName()                                                     Contact's first name
 * @method string              getId()                                                            Unique identifier for this result, 1-64 Bytes
 * @method InputMessageContent getInputMessageContent()                                           Optional. Content of the message to be sent instead of the contact
 * @method string              getLastName()                                                      Optional. Contact's last name
 * @method string              getPhoneNumber()                                                   Contact's phone number
 * @method InlineKeyboard      getReplyMarkup()                                                   Optional. Inline keyboard attached to the message
 * @method int                 getThumbnailHeight()                                               Optional. Thumbnail height
 * @method string              getThumbnailUrl()                                                  Optional. Url of the thumbnail for the result
 * @method int                 getThumbnailWidth()                                                Optional. Thumbnail width
 * @method string              getType()                                                          Type of the result, must be contact
 * @method string              getVcard()                                                         Optional. Additional data about the contact in the form of a vCard, 0-2048 bytes
 * @method $this               setFirstName(string $first_name)                                   Contact's first name
 * @method $this               setId(string $id)                                                  Unique identifier for this result, 1-64 Bytes
 * @method $this               setInputMessageContent(InputMessageContent $input_message_content) Optional. Content of the message to be sent instead of the contact
 * @method $this               setLastName(string $last_name)                                     Optional. Contact's last name
 * @method $this               setPhoneNumber(string $phone_number)                               Contact's phone number
 * @method $this               setReplyMarkup(InlineKeyboard $reply_markup)                       Optional. Inline keyboard attached to the message
 * @method $this               setThumbnailHeight(int $thumbnail_height)                          Optional. Thumbnail height
 * @method $this               setThumbnailUrl(string $thumbnail_url)                             Optional. Url of the thumbnail for the result
 * @method $this               setThumbnailWidth(int $thumbnail_width)                            Optional. Thumbnail width
 * @method $this               setVcard(string $vcard)                                            Optional. Additional data about the contact in the form of a vCard, 0-2048 bytes
 */
class InlineQueryResultContact extends InlineEntity implements InlineQueryResult
{
    /**
     * InlineQueryResultContact constructor
     */
    public function __construct(array $data = [])
    {
        $data['type'] = 'contact';
        parent::__construct($data);
    }
}
