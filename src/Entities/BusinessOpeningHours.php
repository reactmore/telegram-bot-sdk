<?php

namespace Reactmore\TelegramBotSdk\Entities;

/**
 * Class BusinessOpeningHours
 *
 * Describes the opening hours of a business.
 *
 * @see https://core.telegram.org/bots/api#businessopeninghours
 *
 * @method list<BusinessOpeningHoursInterval> getOpeningHours() List of time intervals describing business opening hours
 * @method string                             getTimeZoneName() Unique name of the time zone for which the opening hours are defined
 */
class BusinessOpeningHours extends Entity
{
    /**
     * {@inheritDoc}
     */
    protected function subEntities(): array
    {
        return [
            'opening_hours' => [BusinessOpeningHoursInterval::class],
        ];
    }
}
