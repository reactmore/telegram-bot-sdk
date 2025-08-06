<?php

namespace Reactmore\TelegramBotSdk\Entities;

/**
 * Class User
 *
 * @see https://core.telegram.org/bots/api#user
 *
 * @method bool   getAddedToAttachmentMenu()   Optional. True, if this user added the bot to the attachment menu
 * @method bool   getCanConnectToBusiness()    Optional. True, if the bot can be connected to a Telegram Business account to receive its messages. Returned only in getMe.
 * @method bool   getCanJoinGroups()           Optional. True, if the bot can be invited to groups. Returned only in getMe.
 * @method bool   getCanReadAllGroupMessages() Optional. True, if privacy mode is disabled for the bot. Returned only in getMe.
 * @method string getFirstName()               User's or bot’s first name
 * @method int    getId()                      Unique identifier for this user or bot
 * @method bool   getIsBot()                   True, if this user is a bot
 * @method bool   getIsPremium()               Optional. True, if this user is a Telegram Premium user
 * @method string getLanguageCode()            Optional. IETF language tag of the user's language
 * @method string getLastName()                Optional. User's or bot’s last name
 * @method bool   getSupportsInlineQueries()   Optional. True, if the bot supports inline queries. Returned only in getMe.
 * @method string getUsername()                Optional. User's or bot’s username
 */
class User extends Entity
{
}
