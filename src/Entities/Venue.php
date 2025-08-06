<?php

namespace Reactmore\TelegramBotSdk\Entities;

/**
 * Class Venue
 *
 * @see https://core.telegram.org/bots/api#venue
 *
 * @method string   getAddress()                                                                                                                                                            Address of the venue
 * @method string   getFoursquareId()                                                                                                                                                       Optional. Foursquare identifier of the venue
 * @method string   getGooglePlaceId()                                                                                                                                                      Optional. Google Places identifier of the venue
 * @method string   getGooglePlaceType()                                                                                                                                                    Optional. Google Places type of the venue
 * @method Location getLocation()                                                                                                                                                           Venue location
 * @method string   getTitle()                                                                                                                                                              Name of the venue
 * @method string   getFoursquareType()  Optional. Foursquare type of the venue. (For example, “arts_entertainment/default”, “arts_entertainment/aquarium” or “food/icecream”.)
 */
class Venue extends Entity
{
    /**
     * {@inheritDoc}
     */
    protected function subEntities(): array
    {
        return [
            'location' => Location::class,
        ];
    }
}
