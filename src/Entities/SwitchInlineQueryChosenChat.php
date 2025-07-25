<?php

namespace Reactmore\TelegramBotSdk\Entities;

/**
 * Class SwitchInlineQueryChosenChat
 *
 * This entity represents an inline button that switches the current user to inline mode in a chosen chat, with an optional default inline query.
 *
 * @see https://core.telegram.org/bots/api#switchinlinequerychosenchat
 *
 * @method bool   getAllowBotChats()     Optional. True, if private chats with bots can be chosen
 * @method bool   getAllowChannelChats() Optional. True, if channel chats can be chosen
 * @method bool   getAllowGroupChats()   Optional. True, if group and supergroup chats can be chosen
 * @method bool   getAllowUserChats()    Optional. True, if private chats with users can be chosen
 * @method string getQuery()             Optional. The default inline query to be inserted in the input field. If left empty, only the bot's username will be inserted
 */
class SwitchInlineQueryChosenChat extends Entity
{
}
