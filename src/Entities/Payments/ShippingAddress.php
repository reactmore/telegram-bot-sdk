<?php

namespace Reactmore\TelegramBotSdk\Entities\Payments;

use Reactmore\TelegramBotSdk\Entities\Entity;

/**
 * Class ShippingAddress
 *
 * This object represents a shipping address.
 *
 * @see https://core.telegram.org/bots/api#shippingaddress
 *
 * @method string getCity()        City
 * @method string getCountryCode() ISO 3166-1 alpha-2 country code
 * @method string getPostCode()    Address post code
 * @method string getState()       State, if applicable
 * @method string getStreetLine1() First line for the address
 * @method string getStreetLine2() Second line for the address
 */
class ShippingAddress extends Entity
{
}
