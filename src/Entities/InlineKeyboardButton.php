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

use Reactmore\TelegramBotSdk\Entities\Games\CallbackGame;

/**
 * Class InlineKeyboardButton
 *
 * @see https://core.telegram.org/bots/api#inlinekeyboardbutton
 *
 * @method string                      getCallbackData()                                                                            Optional. Data to be sent in a callback query to the bot when button is pressed, 1-64 bytes
 * @method CallbackGame                getCallbackGame()                                                                            Optional. Description of the game that will be launched when the user presses the button.
 * @method LoginUrl                    getLoginUrl()                                                                                Optional. An HTTP URL used to automatically authorize the user. Can be used as a replacement for the Telegram Login Widget.
 * @method bool                        getPay()                                                                                     Optional. Specify True, to send a Pay button.
 * @method string                      getSwitchInlineQuery()                                                                       Optional. If set, pressing the button will prompt the user to select one of their chats, open that chat and insert the bot's username and the specified inline query in the input field. Can be empty, in which case just the bot’s username will be inserted.
 * @method SwitchInlineQueryChosenChat getSwitchInlineQueryChosenChat()                                                             Optional. If set, pressing the button will prompt the user to select one of their chats of the specified type, open that chat and insert the bot's username and the specified inline query in the input field
 * @method string                      getSwitchInlineQueryCurrentChat()                                                            Optional. If set, pressing the button will insert the bot‘s username and the specified inline query in the current chat's input field. Can be empty, in which case only the bot’s username will be inserted.
 * @method string                      getText()                                                                                    Label text on the button
 * @method string                      getUrl()                                                                                     Optional. HTTP url to be opened when button is pressed
 * @method WebAppInfo                  getWebApp()                                                                                  Optional. Description of the Web App that will be launched when the user presses the button. The Web App will be able to send an arbitrary message on behalf of the user using the method answerWebAppQuery. Available only in private chats between a user and the bot.
 * @method $this                       setCallbackData(string $callback_data)                                                       Optional. Data to be sent in a callback query to the bot when button is pressed, 1-64 bytes
 * @method $this                       setCallbackGame(CallbackGame $callback_game)                                                 Optional. Description of the game that will be launched when the user presses the button.
 * @method $this                       setLoginUrl(LoginUrl $login_url)                                                             Optional. HTTP url to be opened when button is pressed
 * @method $this                       setPay(bool $pay)                                                                            Optional. Specify True, to send a Pay button.
 * @method $this                       setSwitchInlineQuery(string $switch_inline_query)                                            Optional. If set, pressing the button will prompt the user to select one of their chats, open that chat and insert the bot's username and the specified inline query in the input field. Can be empty, in which case just the bot’s username will be inserted.
 * @method $this                       setSwitchInlineQueryChosenChat(SwitchInlineQueryChosenChat $switch_inline_query_chosen_chat) Optional. If set, pressing the button will prompt the user to select one of their chats of the specified type, open that chat and insert the bot's username and the specified inline query in the input field
 * @method $this                       setSwitchInlineQueryCurrentChat(string $switch_inline_query_current_chat)                    Optional. If set, pressing the button will insert the bot‘s username and the specified inline query in the current chat's input field. Can be empty, in which case only the bot’s username will be inserted.
 * @method $this                       setText(string $text)                                                                        Label text on the button
 * @method $this                       setUrl(string $url)                                                                          Optional. HTTP url to be opened when button is pressed
 * @method $this                       setWebApp(WebAppInfo $web_app)                                                               Optional. Description of the Web App that will be launched when the user presses the button. The Web App will be able to send an arbitrary message on behalf of the user using the method answerWebAppQuery. Available only in private chats between a user and the bot.
 */
class InlineKeyboardButton extends KeyboardButton
{
    /**
     * Check if the passed data array could be an InlineKeyboardButton.
     */
    public static function couldBe(array $data): bool
    {
        return array_key_exists('text', $data) && (
            array_key_exists('url', $data)
                || array_key_exists('login_url', $data)
                || array_key_exists('callback_data', $data)
                || array_key_exists('web_app', $data)
                || array_key_exists('switch_inline_query', $data)
                || array_key_exists('switch_inline_query_current_chat', $data)
                || array_key_exists('switch_inline_query_chosen_chat', $data)
                || array_key_exists('callback_game', $data)
                || array_key_exists('pay', $data)
        );
    }

    /**
     * {@inheritDoc}
     */
    public function __call($method, $args)
    {
        // Only 1 of these can be set, so clear the others when setting a new one.
        if (in_array($method, ['setUrl', 'setLoginUrl', 'setCallbackData', 'setWebApp', 'setSwitchInlineQuery', 'setSwitchInlineQueryCurrentChat', 'setSwitchInlineQueryChosenChat', 'setCallbackGame', 'setPay'], true)) {
            unset($this->url, $this->login_url, $this->callback_data, $this->web_app, $this->switch_inline_query, $this->switch_inline_query_current_chat, $this->switch_inline_query_chosen_chat, $this->callback_game, $this->pay);
        }

        return parent::__call($method, $args);
    }
}
