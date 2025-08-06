<?php

namespace Reactmore\TelegramBotSdk\Entities\Payments;

use Reactmore\TelegramBotSdk\Entities\Entity;

/**
 * Class LabeledPrice
 *
 * This object represents a portion of the price for goods or services.
 *
 * @see https://core.telegram.org/bots/api#labeledprice
 *
 * @method int    getAmount() Price of the product in the smallest units of the currency (integer, not float/double).
 * @method string getLabel()  Portion label
 */
class LabeledPrice extends Entity
{
}
