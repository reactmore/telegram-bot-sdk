<?php

namespace Reactmore\TelegramBotSdk\Entities\Payments;

use Reactmore\TelegramBotSdk\Entities\Entity;

/**
 * Class SuccessfulPayment
 *
 * This object contains basic information about a successful payment.
 *
 * @see https://core.telegram.org/bots/api#successfulpayment
 *
 * @method int       getTotalAmount()             Total price in the smallest units of the currency (integer, not float/double).
 * @method string    getCurrency()                Three-letter ISO 4217 currency code
 * @method string    getInvoicePayload()          Bot specified invoice payload
 * @method OrderInfo getOrderInfo()               Optional. Order info provided by the user
 * @method string    getProviderPaymentChargeId() Provider payment identifier
 * @method string    getShippingOptionId()        Optional. Identifier of the shipping option chosen by the user
 * @method string    getTelegramPaymentChargeId() Telegram payment identifier
 */
class SuccessfulPayment extends Entity
{
    /**
     * {@inheritDoc}
     */
    protected function subEntities(): array
    {
        return [
            'order_info' => OrderInfo::class,
        ];
    }
}
