<?php

/**
 * This file is part of the TelegramBot package.
 *
 * (c) Avtandil Kikabidze aka LONGMAN <akalongman@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Reactmore\TelegramBotSdk\Entities;

/**
 * Class BusinessConnection
 *
 * Describes the connection of the bot with a business account.
 *
 * @see https://core.telegram.org/bots/api#businessconnection
 *
 * @method bool   getCanReply()   True, if the bot can act on behalf of the business account in chats that were active in the last 24 hours
 * @method int    getDate()       Date the connection was established in Unix time
 * @method string getId()         Unique identifier of the business connection
 * @method bool   getIsEnabled()  True, if the business connection is active
 * @method int    getUserChatId() Business account user that created the business connection
 */
class BusinessConnection extends Entity
{
}
