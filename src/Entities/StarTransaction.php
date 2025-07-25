<?php

namespace Reactmore\TelegramBotSdk\Entities;

/**
 * Class StarTransaction
 *
 * Describes a Telegram Star transaction.
 *
 * @see https://core.telegram.org/bots/api#startransaction
 *
 * @method int    getAmount()                 Number of Telegram Stars transferred by the transaction
 * @method int    getDate()                   Date the transaction was created in Unix time
 * @method string getId()                     Unique identifier of the transaction. Coincides with the identifer of the original transaction for refund transactions.
 * @method User   getReceiver()               Optional. Receiver of the transaction. Can be a user, a bot, or an app. Null for refund transactions.
 * @method User   getSource()                 Optional. Source of the transaction. Can be a user, a bot, or an app. Null for refund transactions.
 * @method $this  setAmount(int $amount)      Number of Telegram Stars transferred by the transaction
 * @method $this  setDate(int $date)          Date the transaction was created in Unix time
 * @method $this  setId(string $id)           Unique identifier of the transaction. Coincides with the identifer of the original transaction for refund transactions.
 * @method $this  setReceiver(User $receiver) Optional. Receiver of the transaction. Can be a user, a bot, or an app. Null for refund transactions.
 * @method $this  setSource(User $source)     Optional. Source of the transaction. Can be a user, a bot, or an app. Null for refund transactions.
 */
class StarTransaction extends Entity
{
    protected function subEntities(): array
    {
        return [
            'source'   => User::class,
            'receiver' => User::class,
        ];
    }
}
