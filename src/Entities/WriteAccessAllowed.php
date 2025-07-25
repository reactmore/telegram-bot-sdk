<?php

namespace Reactmore\TelegramBotSdk\Entities;

/**
 * Class WriteAccessAllowed
 *
 * This object represents a service message about a user allowing a bot added to the attachment menu to write messages. Currently holds no information.
 *
 * @see https://core.telegram.org/bots/api#writeaccessallowed
 *
 * @method bool   getFromAttachmentMenu() Optional. True, if the access was granted when the bot was added to the attachment or side menu
 * @method bool   getFromRequest()        Optional. True, if the access was granted after the user accepted an explicit request from a Web App sent by the method requestWriteAccess
 * @method string getWebAppName()         Optional. Name of the Web App, if the access was granted when the Web App was launched from a link
 */
class WriteAccessAllowed extends Entity
{
}
