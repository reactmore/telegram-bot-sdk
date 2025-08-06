<?php

namespace Reactmore\TelegramBotSdk\Entities;

use Reactmore\TelegramBotSdk\Entities\Payments\PreCheckoutQuery;
use Reactmore\TelegramBotSdk\Entities\Payments\ShippingQuery;

/**
 * Class Update
 *
 * @see https://core.telegram.org/bots/api#update
 *
 * @method BusinessConnection          getBusinessConnection()      Optional. The bot was connected to or disconnected from a business account, or a user edited an existing connection with the bot
 * @method Message                     getBusinessMessage()         Optional. New message from a connected business account
 * @method CallbackQuery               getCallbackQuery()           Optional. New incoming callback query
 * @method Message                     getChannelPost()             Optional. New post in the channel, can be any kind — text, photo, sticker, etc.
 * @method ChatBoostUpdated            getChatBoost()               Optional. A chat boost was added or changed. The bot must be an administrator in the chat to receive these updates.
 * @method ChatJoinRequest             getChatJoinRequest()         Optional. A request to join the chat has been sent. The bot must have the can_invite_users administrator right in the chat to receive these updates.
 * @method ChatMemberUpdated           getChatMember()              Optional. A chat member's status was updated in a chat. The bot must be an administrator in the chat and must explicitly specify “chat_member” in the list of allowed_updates to receive these updates.
 * @method ChosenInlineResult          getChosenInlineResult()      Optional. The result of an inline query that was chosen by a user and sent to their chat partner.
 * @method BusinessMessagesDeleted     getDeletedBusinessMessages() Optional. Messages were deleted from a connected business account
 * @method Message                     getEditedBusinessMessage()   Optional. New version of a message from a connected business account
 * @method Message                     getEditedChannelPost()       Optional. New version of a post in the channel that is known to the bot and was edited
 * @method Message                     getEditedMessage()           Optional. New version of a message that is known to the bot and was edited
 * @method InlineQuery                 getInlineQuery()             Optional. New incoming inline query
 * @method Message                     getMessage()                 Optional. New incoming message of any kind — text, photo, sticker, etc.
 * @method MessageReactionUpdated      getMessageReaction()         Optional. A reaction to a message was changed by a user. The bot must be an administrator in the chat and must explicitly specify "message_reaction" in the list of allowed_updates to receive these updates. The update isn't received for reactions set by bots.
 * @method MessageReactionCountUpdated getMessageReactionCount()    Optional. Reactions to a message with anonymous reactions were changed. The bot must be an administrator in the chat and must explicitly specify "message_reaction_count" in the list of allowed_updates to receive these updates. The updates are grouped and can be sent with delay up to a few minutes.
 * @method ChatMemberUpdated           getMyChatMember()            Optional. The bot's chat member status was updated in a chat. For private chats, this update is received only when the bot is blocked or unblocked by the user.
 * @method Poll                        getPoll()                    Optional. New poll state. Bots receive only updates about polls, which are sent or stopped by the bot
 * @method PollAnswer                  getPollAnswer()              Optional. A user changed their answer in a non-anonymous poll. Bots receive new votes only in polls that were sent by the bot itself.
 * @method PreCheckoutQuery            getPreCheckoutQuery()        Optional. New incoming pre-checkout query. Contains full information about checkout
 * @method ChatBoostRemoved            getRemovedChatBoost()        Optional. A boost was removed from a chat. The bot must be an administrator in the chat to receive these updates.
 * @method ShippingQuery               getShippingQuery()           Optional. New incoming shipping query. Only for invoices with flexible price
 * @method StarTransaction             getTransaction()             Optional. New incoming transaction; for bots only
 * @method int                         getUpdateId()                The update's unique identifier. Update identifiers start from a certain positive number and increase sequentially. This ID becomes especially handy if you’re using Webhooks, since it allows you to ignore repeated updates or to restore the correct update sequence, should they get out of order.
 */
class Update extends Entity
{
    public const TYPE_MESSAGE                   = 'message';
    public const TYPE_EDITED_MESSAGE            = 'edited_message';
    public const TYPE_CHANNEL_POST              = 'channel_post';
    public const TYPE_EDITED_CHANNEL_POST       = 'edited_channel_post';
    public const TYPE_MESSAGE_REACTION          = 'message_reaction';
    public const TYPE_MESSAGE_REACTION_COUNT    = 'message_reaction_count';
    public const TYPE_INLINE_QUERY              = 'inline_query';
    public const TYPE_CHOSEN_INLINE_RESULT      = 'chosen_inline_result';
    public const TYPE_CALLBACK_QUERY            = 'callback_query';
    public const TYPE_SHIPPING_QUERY            = 'shipping_query';
    public const TYPE_PRE_CHECKOUT_QUERY        = 'pre_checkout_query';
    public const TYPE_POLL                      = 'poll';
    public const TYPE_POLL_ANSWER               = 'poll_answer';
    public const TYPE_MY_CHAT_MEMBER            = 'my_chat_member';
    public const TYPE_CHAT_MEMBER               = 'chat_member';
    public const TYPE_CHAT_JOIN_REQUEST         = 'chat_join_request';
    public const TYPE_CHAT_BOOST                = 'chat_boost';
    public const TYPE_REMOVED_CHAT_BOOST        = 'removed_chat_boost';
    public const TYPE_BUSINESS_CONNECTION       = 'business_connection';
    public const TYPE_BUSINESS_MESSAGE          = 'business_message';
    public const TYPE_EDITED_BUSINESS_MESSAGE   = 'edited_business_message';
    public const TYPE_DELETED_BUSINESS_MESSAGES = 'deleted_business_messages';
    public const TYPE_TRANSACTION               = 'transaction';

    /**
     * {@inheritDoc}
     */
    protected function subEntities(): array
    {
        return [
            self::TYPE_MESSAGE                   => Message::class,
            self::TYPE_EDITED_MESSAGE            => EditedMessage::class,
            self::TYPE_CHANNEL_POST              => ChannelPost::class,
            self::TYPE_EDITED_CHANNEL_POST       => EditedChannelPost::class,
            self::TYPE_MESSAGE_REACTION          => MessageReactionUpdated::class,
            self::TYPE_MESSAGE_REACTION_COUNT    => MessageReactionCountUpdated::class,
            self::TYPE_INLINE_QUERY              => InlineQuery::class,
            self::TYPE_CHOSEN_INLINE_RESULT      => ChosenInlineResult::class,
            self::TYPE_CALLBACK_QUERY            => CallbackQuery::class,
            self::TYPE_SHIPPING_QUERY            => ShippingQuery::class,
            self::TYPE_PRE_CHECKOUT_QUERY        => PreCheckoutQuery::class,
            self::TYPE_POLL                      => Poll::class,
            self::TYPE_POLL_ANSWER               => PollAnswer::class,
            self::TYPE_MY_CHAT_MEMBER            => ChatMemberUpdated::class,
            self::TYPE_CHAT_MEMBER               => ChatMemberUpdated::class,
            self::TYPE_CHAT_JOIN_REQUEST         => ChatJoinRequest::class,
            self::TYPE_CHAT_BOOST                => ChatBoostUpdated::class,
            self::TYPE_REMOVED_CHAT_BOOST        => ChatBoostRemoved::class,
            self::TYPE_BUSINESS_CONNECTION       => BusinessConnection::class,
            self::TYPE_BUSINESS_MESSAGE          => Message::class,
            self::TYPE_EDITED_BUSINESS_MESSAGE   => Message::class,
            self::TYPE_DELETED_BUSINESS_MESSAGES => BusinessMessagesDeleted::class,
            self::TYPE_TRANSACTION               => StarTransaction::class,
        ];
    }

    /**
     * Get the list of all available update types
     *
     * @return list<string>
     */
    public static function getUpdateTypes(): array
    {
        return array_keys((new self([]))->subEntities());
    }

    /**
     * Get the update type based on the set properties
     */
    public function getUpdateType(): ?string
    {
        foreach (self::getUpdateTypes() as $type) {
            if ($this->getProperty($type)) {
                return $type;
            }
        }

        return null;
    }

    /**
     * Get update content
     *
     * @return CallbackQuery|ChannelPost|ChatBoostRemoved|ChatBoostUpdated|ChatJoinRequest|ChatMemberUpdated|ChosenInlineResult|EditedChannelPost|EditedMessage|InlineQuery|Message|MessageReactionCountUpdated|MessageReactionUpdated|Poll|PollAnswer|PreCheckoutQuery|ShippingQuery
     */
    public function getUpdateContent()
    {
        if ($update_type = $this->getUpdateType()) {
            // Instead of just getting the property as an array,
            // use the __call method to get the correct Entity object.
            $method = 'get' . str_replace('_', '', ucwords($update_type, '_'));

            return $this->{$method}();
        }

        return null;
    }
}
