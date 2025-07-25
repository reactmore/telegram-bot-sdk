<?php

namespace Reactmore\TelegramBotSdk\Entities;

/**
 * Class WebAppInfo
 *
 * @see https://core.telegram.org/bots/api#webappinfo
 *
 * @property string $url An HTTPS URL of a Web App to be opened with additional data as specified in Initializing Web Apps
 *
 * @method bool   getAllowWritingToPm()                       Optional. If true, a Web App can be opened from a link pressed in a bot's message always in full size, even if the Web App is not designed to support full size layout. Ignored for inline keyboard buttons.
 * @method string getUrl()                                    An HTTPS URL of a Web App to be opened with additional data as specified in Initializing Web Apps
 * @method $this  setAllowWritingToPm(bool $allowWritingToPm) Optional. If true, a Web App can be opened from a link pressed in a bot's message always in full size, even if the Web App is not designed to support full size layout. Ignored for inline keyboard buttons.
 * @method $this  setUrl(string $url)                         An HTTPS URL of a Web App to be opened with additional data as specified in Initializing Web Apps
 */
class WebAppInfo extends Entity
{
}
