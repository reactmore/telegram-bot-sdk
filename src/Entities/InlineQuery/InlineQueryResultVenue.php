<?php

namespace Reactmore\TelegramBotSdk\Entities\InlineQuery;

use Reactmore\TelegramBotSdk\Entities\InlineKeyboard;
use Reactmore\TelegramBotSdk\Entities\InputMessageContent\InputMessageContent;

/**
 * Class InlineQueryResultVenue
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresultvenue
 *
 * <code>
 * $data = [
 *   'id'                    => '',
 *   'latitude'              => 36.0338,
 *   'longitude'             => 71.8601,
 *   'title'                 => '',
 *   'address'               => '',
 *   'foursquare_id'         => '',
 *   'reply_markup'          => <InlineKeyboard>,
 *   'input_message_content' => <InputMessageContent>,
 *   'thumbnail_url'         => '',
 *   'thumbnail_width'       => 30,
 *   'thumbnail_height'      => 30,
 * ];
 * </code>
 *
 * @method string              getAddress()                                                                                                                                                                                                                    Address of the venue
 * @method string              getFoursquareId()                                                                                                                                                                                                               Optional. Foursquare identifier of the venue if known
 * @method string              getGooglePlaceId()                                                                                                                                                                                                              Optional. Google Places identifier of the venue
 * @method string              getGooglePlaceType()                                                                                                                                                                                                            Optional. Google Places type of the venue
 * @method string              getId()                                                                                                                                                                                                                         Unique identifier for this result, 1-64 Bytes
 * @method InputMessageContent getInputMessageContent()                                                                                                                                                                                                        Optional. Content of the message to be sent instead of the venue
 * @method float               getLatitude()                                                                                                                                                                                                                   Latitude of the venue location in degrees
 * @method float               getLongitude()                                                                                                                                                                                                                  Longitude of the venue location in degrees
 * @method InlineKeyboard      getReplyMarkup()                                                                                                                                                                                                                Optional. Inline keyboard attached to the message
 * @method int                 getThumbnailHeight()                                                                                                                                                                                                            Optional. Thumbnail height
 * @method string              getThumbnailUrl()                                                                                                                                                                                                               Optional. Url of the thumbnail for the result
 * @method int                 getThumbnailWidth()                                                                                                                                                                                                             Optional. Thumbnail width
 * @method string              getTitle()                                                                                                                                                                                                                      Title of the venue
 * @method string              getType()                                                                                                                                                                                                                       Type of the result, must be venue
 * @method $this               setFoursquareType(string $foursquare_type)                         Optional. Foursquare type of the venue, if known. (For example, “arts_entertainment/default”, “arts_entertainment/aquarium” or “food/icecream”.)
 * @method $this               setAddress(string $address)                                                                                                                                                                                                     Address of the venue
 * @method $this               setFoursquareId(string $foursquare_id)                                                                                                                                                                                          Optional. Foursquare identifier of the venue if known
 * @method $this               setGooglePlaceId(string $google_place_id)                                                                                                                                                                                       Optional. Google Places identifier of the venue
 * @method $this               setGooglePlaceType(string $google_place_type)                                                                                                                                                                                   Optional. Google Places type of the venue
 * @method $this               setId(string $id)                                                                                                                                                                                                               Unique identifier for this result, 1-64 Bytes
 * @method $this               setInputMessageContent(InputMessageContent $input_message_content)                                                                                                                                                              Optional. Content of the message to be sent instead of the venue
 * @method $this               setLatitude(float $latitude)                                                                                                                                                                                                    Latitude of the venue location in degrees
 * @method $this               setLongitude(float $longitude)                                                                                                                                                                                                  Longitude of the venue location in degrees
 * @method $this               setReplyMarkup(InlineKeyboard $reply_markup)                                                                                                                                                                                    Optional. Inline keyboard attached to the message
 * @method $this               setThumbnailHeight(int $thumbnail_height)                                                                                                                                                                                       Optional. Thumbnail height
 * @method $this               setThumbnailUrl(string $thumbnail_url)                                                                                                                                                                                          Optional. Url of the thumbnail for the result
 * @method $this               setThumbnailWidth(int $thumbnail_width)                                                                                                                                                                                         Optional. Thumbnail width
 * @method $this               setTitle(string $title)                                                                                                                                                                                                         Title of the venue
 */
class InlineQueryResultVenue extends InlineEntity implements InlineQueryResult
{
    /**
     * InlineQueryResultVenue constructor
     */
    public function __construct(array $data = [])
    {
        $data['type'] = 'venue';
        parent::__construct($data);
    }
}
