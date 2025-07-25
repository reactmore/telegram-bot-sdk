<?php

/**
 * This file is part of the TelegramBot package.
 *
 * (c) Avtandil Kikabidze aka LONGMAN <akalongman@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Reactmore\TelegramBotSdk\Entities\Payments;

use Reactmore\TelegramBotSdk\Entities\Entity;
use Reactmore\TelegramBotSdk\Entities\ServerResponse;
use Reactmore\TelegramBotSdk\Entities\User;
use Reactmore\TelegramBotSdk\Request;

/**
 * Class ShippingQuery
 *
 * This object contains information about an incoming shipping query.
 *
 * @see https://core.telegram.org/bots/api#shippingquery
 *
 * @method User            getFrom()            User who sent the query
 * @method string          getId()              Unique query identifier
 * @method string          getInvoicePayload()  Bot specified invoice payload
 * @method ShippingAddress getShippingAddress() User specified shipping address
 */
class ShippingQuery extends Entity
{
    /**
     * {@inheritDoc}
     */
    protected function subEntities(): array
    {
        return [
            'from'             => User::class,
            'shipping_address' => ShippingAddress::class,
        ];
    }

    /**
     * Answer this shipping query.
     */
    public function answer(bool $ok, array $data = []): ServerResponse
    {
        return Request::answerShippingQuery(array_merge([
            'shipping_query_id' => $this->getId(),
            'ok'                => $ok,
        ], $data));
    }
}
