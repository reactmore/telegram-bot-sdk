<?php

namespace Reactmore\TelegramBotSdk\Entities\Payments;

use Reactmore\TelegramBotSdk\Entities\Entity;

/**
 * Class Invoice
 *
 * This object contains basic information about an invoice.
 *
 * @see https://core.telegram.org/bots/api#invoice
 *
 * @method int    getTotalAmount()    Total price in the smallest units of the currency (integer, not float/double).
 * @method string getCurrency()       Three-letter ISO 4217 currency code
 * @method string getDescription()    Product description
 * @method string getStartParameter() Unique bot deep-linking parameter that can be used to generate this invoice
 * @method string getTitle()          Product name
 */
class Invoice extends Entity
{
}
