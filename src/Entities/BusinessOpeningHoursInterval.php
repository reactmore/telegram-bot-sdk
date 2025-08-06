<?php

namespace Reactmore\TelegramBotSdk\Entities;

/**
 * Class BusinessOpeningHoursInterval
 *
 * Describes an interval of time during which a business is open.
 *
 * @see https://core.telegram.org/bots/api#businessopeninghoursinterval
 *
 * @method int getClosingMinute() The minute's sequence number in a week, starting on Monday, marking the end of the time interval during which the business is open; 0 - 8 * 24 * 60
 * @method int getOpeningMinute() The minute's sequence number in a week, starting on Monday, marking the start of the time interval during which the business is open; 0 - 7 * 24 * 60
 */
class BusinessOpeningHoursInterval extends Entity
{
}
