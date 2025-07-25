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
 * Class ProximityAlertTriggered
 *
 * Represents the content of a service message, sent whenever a user in the chat triggers a proximity alert set by another user.
 *
 * @see https://core.telegram.org/bots/api#proximityalerttriggered
 *
 * @method int  getDistance() The distance between the users
 * @method User getTraveler() User that triggered the alert
 * @method User getWatcher()  User that set the alert
 */
class ProximityAlertTriggered extends Entity
{
    /**
     * {@inheritDoc}
     */
    protected function subEntities(): array
    {
        return [
            'traveler' => User::class,
            'watcher'  => User::class,
        ];
    }
}
