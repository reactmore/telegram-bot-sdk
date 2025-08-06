<?php

namespace Reactmore\TelegramBotSdk\Entities\Background;

/**
 * Class BackgroundFill
 *
 * The background is automatically filled based on the selected colors.
 *
 * @see https://core.telegram.org/bots/api#backgroundfill
 *
 * @method int    getBottomColor()   The color of the bottom gradient fill as a RGB24 value
 * @method int    getRotationAngle() Clockwise rotation angle of the background fill in degrees; 0-359
 * @method int    getTopColor()      The color of the top gradient fill as a RGB24 value
 * @method string getType()          Type of the fill, always “fill”
 */
class BackgroundFill extends BackgroundType
{
    /**
     * {@inheritDoc}
     */
    public function __construct(array $data = [])
    {
        $data['type'] = 'fill';
        parent::__construct($data);
    }
}
