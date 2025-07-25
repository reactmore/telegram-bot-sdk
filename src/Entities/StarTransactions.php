<?php

namespace Reactmore\TelegramBotSdk\Entities;

/**
 * Class StarTransactions
 *
 * Contains a list of Telegram Star transactions.
 *
 * @see https://core.telegram.org/bots/api#startransactions
 *
 * @method list<StarTransaction> getTransactions()                                The list of transactions
 * @method $this                 setTransactions(StarTransaction[] $transactions) The list of transactions
 */
class StarTransactions extends Entity
{
    protected function subEntities(): array
    {
        return [
            'transactions' => [StarTransaction::class],
        ];
    }
}
