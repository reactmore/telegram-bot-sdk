<?php

namespace Reactmore\TelegramBotSdk\Entities\Payments;

use Reactmore\TelegramBotSdk\Entities\Entity;
use Reactmore\TelegramBotSdk\Entities\ServerResponse;
use Reactmore\TelegramBotSdk\Entities\User;
use Reactmore\TelegramBotSdk\Request;

/**
 * Class PreCheckoutQuery
 *
 * This object contains information about an incoming pre-checkout query.
 *
 * @see https://core.telegram.org/bots/api#precheckoutquery
 *
 * @method int       getTotalAmount()      Total price in the smallest units of the currency (integer, not float/double).
 * @method string    getCurrency()         Three-letter ISO 4217 currency code
 * @method User      getFrom()             User who sent the query
 * @method string    getId()               Unique query identifier
 * @method string    getInvoicePayload()   Bot specified invoice payload
 * @method OrderInfo getOrderInfo()        Optional. Order info provided by the user
 * @method string    getShippingOptionId() Optional. Identifier of the shipping option chosen by the user
 */
class PreCheckoutQuery extends Entity
{
    /**
     * {@inheritDoc}
     */
    protected function subEntities(): array
    {
        return [
            'from'       => User::class,
            'order_info' => OrderInfo::class,
        ];
    }

    /**
     * Answer this pre-checkout query.
     */
    public function answer(bool $ok, array $data = []): ServerResponse
    {
        return Request::answerPreCheckoutQuery(array_merge([
            'pre_checkout_query_id' => $this->getId(),
            'ok'                    => $ok,
        ], $data));
    }
}
