<?php

namespace Reactmore\TelegramBotSdk\Entities\Payments;

use Reactmore\TelegramBotSdk\Entities\Entity;

/**
 * Class OrderInfo
 *
 * This object represents information about an order.
 *
 * @see https://core.telegram.org/bots/api#orderinfo
 *
 * @method string          getEmail()           Optional. User email
 * @method string          getName()            Optional. User name
 * @method string          getPhoneNumber()     Optional. User's phone number
 * @method ShippingAddress getShippingAddress() Optional. User shipping address
 */
class OrderInfo extends Entity
{
    /**
     * {@inheritDoc}
     */
    protected function subEntities(): array
    {
        return [
            'shipping_address' => ShippingAddress::class,
        ];
    }
}
