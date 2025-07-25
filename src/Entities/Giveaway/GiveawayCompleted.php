<?php

namespace Reactmore\TelegramBotSdk\Entities\Giveaway;

use Reactmore\TelegramBotSdk\Entities\Entity;
use Reactmore\TelegramBotSdk\Entities\Message;

/**
 * This object represents a service message about the completion of a giveaway without public winners.
 *
 * @see https://core.telegram.org/bots/api#giveawaycompleted
 *
 * @method Message getGiveawayMessage()     Optional. Message with the giveaway that was completed, if it wasn't deleted
 * @method int     getUnclaimedPrizeCount() Optional. Number of undistributed prizes
 * @method int     getWinnerCount()         Number of winners in the giveaway
 */
class GiveawayCompleted extends Entity
{
    protected function subEntities(): array
    {
        return [
            'giveaway_message' => Message::class,
        ];
    }
}
