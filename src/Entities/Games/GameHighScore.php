<?php

namespace Reactmore\TelegramBotSdk\Entities\Games;

use Reactmore\TelegramBotSdk\Entities\Entity;
use Reactmore\TelegramBotSdk\Entities\User;

/**
 * Class GameHighScore
 *
 * This object represents one row of the high scores table for a game.
 *
 * @see https://core.telegram.org/bots/api#gamehighscore
 *
 * @method int  getPosition() Position in high score table for the game
 * @method int  getScore()    Score
 * @method User getUser()     User
 */
class GameHighScore extends Entity
{
    /**
     * {@inheritDoc}
     */
    protected function subEntities(): array
    {
        return [
            'user' => User::class,
        ];
    }
}
