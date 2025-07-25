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
