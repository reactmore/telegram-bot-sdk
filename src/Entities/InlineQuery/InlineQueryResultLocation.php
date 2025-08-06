<?php

namespace Reactmore\TelegramBotSdk\Entities\InlineQuery;

use Reactmore\TelegramBotSdk\Entities\InlineKeyboard;
use Reactmore\TelegramBotSdk\Entities\InputMessageContent\InputMessageContent;

/**
 * Class InlineQueryResultLocation
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresultlocation
 *
 * <code>
 * $data = [
 *   'id'                     => '',
 *   'latitude'               => 36.0338,
 *   'longitude'              => 71.8601,
 *   'title'                  => '',
 *   'horizontal_accuracy'    => 36.9,
 *   'live_period'            => 900,
 *   'heading'                => 88,
 *   'proximity_alert_radius' => 300,
 *   'reply_markup'           => <InlineKeyboard>,
 *   'input_message_content'  => <InputMessageContent>,
 *   'thumbnail_url'          => '',
 *   'thumbnail_width'        => 30,
 *   'thumbnail_height'       => 30,
 * ];
 * </code>
 *
 * @method int                 getHeading()                                                       Optional. For live locations, a direction in which the user is moving, in degrees. Must be between 1 and 360 if specified.
 * @method float               getHorizontalAccuracy()                                            Optional. The radius of uncertainty for the location, measured in meters; 0-1500
 * @method string              getId()                                                            Unique identifier for this result, 1-64 Bytes
 * @method InputMessageContent getInputMessageContent()                                           Optional. Content of the message to be sent instead of the location
 * @method float               getLatitude()                                                      Location latitude in degrees
 * @method int                 getLivePeriod()                                                    Optional. Period in seconds for which the location can be updated, should be between 60 and 86400.
 * @method float               getLongitude()                                                     Location longitude in degrees
 * @method int                 getProximityAlertRadius()                                          Optional. For live locations, a maximum distance for proximity alerts about approaching another chat member, in meters. Must be between 1 and 100000 if specified.
 * @method InlineKeyboard      getReplyMarkup()                                                   Optional. Inline keyboard attached to the message
 * @method int                 getThumbnailHeight()                                               Optional. Thumbnail height
 * @method string              getThumbnailUrl()                                                  Optional. Url of the thumbnail for the result
 * @method int                 getThumbnailWidth()                                                Optional. Thumbnail width
 * @method string              getTitle()                                                         Location title
 * @method string              getType()                                                          Type of the result, must be location
 * @method $this               setHeading(int $heading)                                           Optional. For live locations, a direction in which the user is moving, in degrees. Must be between 1 and 360 if specified.
 * @method $this               setHorizontalAccuracy(float $horizontal_accuracy)                  Optional. The radius of uncertainty for the location, measured in meters; 0-1500
 * @method $this               setId(string $id)                                                  Unique identifier for this result, 1-64 Bytes
 * @method $this               setInputMessageContent(InputMessageContent $input_message_content) Optional. Content of the message to be sent instead of the location
 * @method $this               setLatitude(float $latitude)                                       Location latitude in degrees
 * @method $this               setLivePeriod(int $live_period)                                    Optional. Period in seconds for which the location can be updated, should be between 60 and 86400.
 * @method $this               setLongitude(float $longitude)                                     Location longitude in degrees
 * @method $this               setProximityAlertRadius(int $proximity_alert_radius)               Optional. For live locations, a maximum distance for proximity alerts about approaching another chat member, in meters. Must be between 1 and 100000 if specified.
 * @method $this               setReplyMarkup(InlineKeyboard $reply_markup)                       Optional. Inline keyboard attached to the message
 * @method $this               setThumbnailHeight(int $thumbnail_height)                          Optional. Thumbnail height
 * @method $this               setThumbnailUrl(string $thumbnail_url)                             Optional. Url of the thumbnail for the result
 * @method $this               setThumbnailWidth(int $thumbnail_width)                            Optional. Thumbnail width
 * @method $this               setTitle(string $title)                                            Location title
 */
class InlineQueryResultLocation extends InlineEntity implements InlineQueryResult
{
    /**
     * InlineQueryResultLocation constructor
     */
    public function __construct(array $data = [])
    {
        $data['type'] = 'location';
        parent::__construct($data);
    }
}
