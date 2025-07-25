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

/**
 * Class ShippingOption
 *
 * This object represents one shipping option.
 *
 * @see https://core.telegram.org/bots/api#shippingoption
 *
 * @method string             getId()     Shipping option identifier
 * @method list<LabeledPrice> getPrices() List of price portions
 * @method string             getTitle()  Option title
 */
class ShippingOption extends Entity
{
    /**
     * {@inheritDoc}
     */
    protected function subEntities(): array
    {
        return [
            'prices' => [LabeledPrice::class],
        ];
    }
}
