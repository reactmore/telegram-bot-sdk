<?php

namespace Reactmore\TelegramBotSdk\Entities;

use Reactmore\TelegramBotSdk\Entities\Games\Game;
use Reactmore\TelegramBotSdk\Entities\Giveaway\Giveaway;
use Reactmore\TelegramBotSdk\Entities\Giveaway\GiveawayCompleted;
use Reactmore\TelegramBotSdk\Entities\Giveaway\GiveawayCreated;
use Reactmore\TelegramBotSdk\Entities\Giveaway\GiveawayWinners;
use Reactmore\TelegramBotSdk\Entities\Message\Factory as MaybeInaccessibleMessageFactory;
use Reactmore\TelegramBotSdk\Entities\Message\MaybeInaccessibleMessage;
use Reactmore\TelegramBotSdk\Entities\MessageOrigin\Factory as MessageOriginFactory;
use Reactmore\TelegramBotSdk\Entities\MessageOrigin\MessageOrigin;
use Reactmore\TelegramBotSdk\Entities\Payments\Invoice;
use Reactmore\TelegramBotSdk\Entities\Payments\SuccessfulPayment;
use Reactmore\TelegramBotSdk\Entities\TelegramPassport\PassportData;
use Reactmore\TelegramBotSdk\Entities\Topics\ForumTopicClosed;
use Reactmore\TelegramBotSdk\Entities\Topics\ForumTopicCreated;
use Reactmore\TelegramBotSdk\Entities\Topics\ForumTopicEdited;
use Reactmore\TelegramBotSdk\Entities\Topics\ForumTopicReopened;
use Reactmore\TelegramBotSdk\Entities\Topics\GeneralForumTopicHidden;
use Reactmore\TelegramBotSdk\Entities\Topics\GeneralForumTopicUnhidden;

/**
 * Class Message
 *
 * Represents a message
 *
 * @see https://core.telegram.org/bots/api#message
 *
 * @method Animation                     getAnimation()                                                                                                                                        Optional. Message is an animation, information about the animation. For backward compatibility, when this field is set, the document field will also be set
 * @method Audio                         getAudio()                                                                                                                                            Optional. Message is an audio file, information about the file
 * @method string                        getAuthorSignature()                                                                                                                                  Optional. Signature of the post author for messages in channels
 * @method ChatBoostAdded                getBoostAdded()                                                                                                                                       Optional. Service message: user boosted the chat
 * @method string                        getBusinessConnectionId()                                                                                                                             Optional. Unique identifier of the business connection from which the message was received. If non-empty, the message is business_message.
 * @method string                        getCaption()                                                                                                                                          Optional. Caption for the document, photo or video, 0-200 characters
 * @method list<MessageEntity>           getCaptionEntities()                                                                                                                                  Optional. For messages with a caption, special entities like usernames, URLs, bot commands, etc. that appear in the caption
 * @method bool                          getChannelChatCreated()                                                                                                                               Optional. Service message: the channel has been created. This field can't be received in a message coming through updates, because bot can’t be a member of a channel when it is created. It can only be found in reply_to_message if someone replies to a very first message in a channel.
 * @method Chat                          getChat()                                                                                                                                             Conversation the message belongs to
 * @method ChatBackground                getChatBackgroundSet()                                                                                                                                Optional. Service message: chat background set
 * @method ChatShared                    getChatShared()                                                                                                                                       Optional. Service message: a chat was shared with the bot
 * @method string                        getConnectedWebsite()                                                                                                                                 Optional. The domain name of the website on which the user has logged in.
 * @method Contact                       getContact()                                                                                                                                          Optional. Message is a shared contact, information about the contact
 * @method int                           getDate()                                                                                                                                             Date the message was sent in Unix time
 * @method bool                          getDeleteChatPhoto()                                                                                                                                  Optional. Service message: the chat photo was deleted
 * @method Dice                          getDice()                                                                                                                                             Optional. Message is a dice with random value, 1-6 for “🎲” and “🎯” base emoji, 1-5 for “🏀” and “⚽” base emoji, 1-64 for “🎰” base emoji
 * @method Document                      getDocument()                                                                                                                                         Optional. Message is a general file, information about the file
 * @method int                           getEditDate()                                                                                                                                         Optional. Date the message was last edited in Unix time
 * @method list<MessageEntity>           getEntities()                                                                                                                                         Optional. For text messages, special entities like usernames, URLs, bot commands, etc. that appear in the text
 * @method ExternalReplyInfo             getExternalReply()                                                                                                                                    Optional. Information about the message that is being replied to, which may come from another chat or forum topic
 * @method ForumTopicClosed              getForumTopicClosed()                                                                                                                                 Optional. Service message: forum topic closed
 * @method ForumTopicCreated             getForumTopicCreated()                                                                                                                                Optional. Service message: forum topic created
 * @method ForumTopicEdited              getForumTopicEdited()                                                                                                                                 Optional. Service message: forum topic edited
 * @method ForumTopicReopened            getForumTopicReopened()                                                                                                                               Optional. Service message: forum topic reopened
 * @method MessageOrigin                 getForwardOrigin()                                                                                                                                    Optional. Information about the original message for forwarded messages
 * @method User                          getFrom()                                                                                                                                             Optional. Sender, can be empty for messages sent to channels
 * @method Game                          getGame()                                                                                                                                             Optional. Message is a game, information about the game.
 * @method GeneralForumTopicHidden       getGeneralForumTopicHidden()                                                                                                                          Optional. Service message: the 'General' forum topic hidden
 * @method GeneralForumTopicUnhidden     getGeneralForumTopicUnhidden()                                                                                                                        Optional. Service message: the 'General' forum topic unhidden
 * @method Giveaway                      getGiveaway()                                                                                                                                         Optional. The message is a scheduled giveaway message
 * @method GiveawayCompleted             getGiveawayCompleted()                                                                                                                                Optional. Service message: a giveaway without public winners was completed
 * @method GiveawayCreated               getGiveawayCreated()                                                                                                                                  Optional. Service message: a scheduled giveaway was created
 * @method GiveawayWinners               getGiveawayWinners()                                                                                                                                  Optional. A giveaway with public winners was completed
 * @method bool                          getGroupChatCreated()                                                                                                                                 Optional. Service message: the group has been created
 * @method bool                          getHasMediaSpoiler()                                                                                                                                  Optional. True, if the message media is covered by a spoiler animation
 * @method bool                          getHasProtectedContent()                                                                                                                              Optional. True, if the message can't be forwarded
 * @method Invoice                       getInvoice()                                                                                                                                          Optional. Message is an invoice for a payment, information about the invoice.
 * @method bool                          getIsAutomaticForward()                                                                                                                               Optional. True, if the message is a channel post that was automatically forwarded to the connected discussion group
 * @method bool                          getIsFromOffline()                                                                                                                                    Optional. True, if the message was sent by an offline user. Applicable to messages sent by the bot on behalf of a user to a fellow user in a private chat.
 * @method bool                          getIsTopicMessage()                                                                                                                                   Optional. True, if the message is sent to a forum topic
 * @method LinkPreviewOptions            getLinkPreviewOptions()                                                                                                                               Optional. Options used for link preview generation for the message, if it is a text message and link preview options were changed
 * @method Location                      getLocation()                                                                                                                                         Optional. Message is a shared location, information about the location
 * @method string                        getMediaGroupId()                                                                                                                                     Optional. The unique identifier of a media message group this message belongs to
 * @method MessageAutoDeleteTimerChanged getMessageAutoDeleteTimerChanged()                                                                                                                    Optional. Service message: auto-delete timer settings changed in the chat
 * @method int                           getMessageId()                                                                                                                                        Unique message identifier
 * @method int                           getMessageThreadId()                                                                                                                                  Optional. Unique identifier of a message thread to which the message belongs; for supergroups only
 * @method int                           getMigrateFromChatId()                                                                                                                                Optional. The supergroup has been migrated from a group with the specified identifier. This number may be greater than 32 bits and some programming languages may have difficulty/silent defects in interpreting it. But it smaller than 52 bits, so a signed 64 bit integer or double-precision float type are safe for storing this identifier.
 * @method int                           getMigrateToChatId()                                                                                                                                  Optional. The group has been migrated to a supergroup with the specified identifier. This number may be greater than 32 bits and some programming languages may have difficulty/silent defects in interpreting it. But it smaller than 52 bits, so a signed 64 bit integer or double-precision float type are safe for storing this identifier.
 * @method list<PhotoSize>               getNewChatPhoto()                                                                                                                                     Optional. A chat photo was changed to this value
 * @method string                        getNewChatTitle()                                                                                                                                     Optional. A chat title was changed to this value
 * @method PaidMediaInfo                 getPaidMedia()                                                                                                                                        Optional. Message is a paid media purchase, information about the paid media
 * @method PassportData                  getPassportData()                                                                                                                                     Optional. Telegram Passport data
 * @method list<PhotoSize>               getPhoto()                                                                                                                                            Optional. Message is a photo, available sizes of the photo
 * @method MaybeInaccessibleMessage      getPinnedMessage()                                                                                                                                    Optional. Specified message was pinned. Note that the Message object in this field will not contain further reply_to_message fields even if it is itself a reply.
 * @method Poll                          getPoll()                                                                                                                                             Optional. Message is a native poll, information about the poll
 * @method ProximityAlertTriggered       getProximityAlertTriggered()                                                                                                                          Optional. Service message. A user in the chat triggered another user's proximity alert while sharing Live Location.
 * @method TextQuote                     getQuote()                                                                                                                                            Optional. For replies that quote part of the original message, the quoted part of the message
 * @method InlineKeyboard                getReplyMarkup()                                                                                                                                      Optional. Inline keyboard attached to the message. login_url buttons are represented as ordinary url buttons.
 * @method ReplyToMessage                getReplyToMessage()                                                                                                                                   Optional. For replies, the original message. Note that the Message object in this field will not contain further reply_to_message fields even if it itself is a reply.
 * @method Story                         getReplyToStory()                                                                                                                                     Optional. For replies to a story, the original story
 * @method int                           getSenderBoostCount()                                                                                                                                 Optional. If the sender of the message boosted the chat, the number of boosts added by the user
 * @method User                          getSenderBusinessBot()                                                                                                                                Optional. The bot that actually sent the message on behalf of the business account. Available only for outgoing messages sent on behalf of the business account.
 * @method Chat                          getSenderChat()                                                                                                                                       Optional. Sender of the message, sent on behalf of a chat. The channel itself for channel messages. The supergroup itself for messages from anonymous group administrators. The linked channel for messages automatically forwarded to the discussion group
 * @method Sticker                       getSticker()                                                                                                                                          Optional. Message is a sticker, information about the sticker
 * @method Story                         getStory()                                                                                                                                            Optional. Message is a forwarded story
 * @method SuccessfulPayment             getSuccessfulPayment()                                                                                                                                Optional. Message is a service message about a successful payment, information about the payment.
 * @method bool                          getSupergroupChatCreated()                                                                                                                            Optional. Service message: the supergroup has been created. This field can't be received in a message coming through updates, because bot can’t be a member of a supergroup when it is created. It can only be found in reply_to_message if someone replies to a very first message in a directly created supergroup.
 * @method StarTransaction               getTransaction()                                                                                                                                      Optional. Message is a service message about a successful payment, information about the payment.
 * @method UsersShared                   getUsersShared()                                                                                                                                      Optional. Service message: users were shared with the bot
 * @method Venue                         getVenue()                                                                                                                                            Optional. Message is a venue, information about the venue
 * @method User                          getViaBot()                                                                                                                                           Optional. Bot through which the message was sent
 * @method Video                         getVideo()                                                                                                                                            Optional. Message is a video, information about the video
 * @method VideoChatEnded                getVideoChatEnded()                                                                                                                                   Optional. Service message: voice chat ended
 * @method VideoChatParticipantsInvited  getVideoChatParticipantsInvited()                                                                                                                     Optional. Service message: new participants invited to a voice chat
 * @method VideoChatScheduled            getVideoChatScheduled()                                                                                                                               Optional. Service message: voice chat scheduled
 * @method VideoChatStarted              getVideoChatStarted()                                                                                                                                 Optional. Service message: voice chat started
 * @method VideoNote                     getVideoNote()                                                                                                                                        Optional. Message is a video note message, information about the video
 * @method Voice                         getVoice()                                                                                                                                            Optional. Message is a voice message, information about the file
 * @method WebAppInfo                    getWebApp()                                                                                                                                           Optional. Service message: a Web App was launched for the user
 * @method WebAppData                    getWebAppData()                                                                                                                                       Optional. Service message: data sent by a Web App
 * @method WriteAccessAllowed            getWriteAccessAllowed()                                                                                                                               Optional. Service message: the user allowed the bot added to the attachment menu to write messages
 * @method $this                         setPaidMedia(PaidMediaInfo $paidMedia)                                                                                                                Optional. Message is a paid media purchase, information about the paid media
 * @method $this                         setTransaction(StarTransaction $transaction)                                                                                                          Optional. Message is a service message about a successful payment, information about the payment.
 * @method $this                         setWebApp(WebAppInfo $webApp)                                                                                                                         Optional. Service message: a Web App was launched for the user
 * @method User                          getLeftChatMember()                         Optional. A member was removed from the group, information about them (this member may be the bot itself)
 */
class Message extends Entity implements MaybeInaccessibleMessage
{
    /**
     * {@inheritDoc}
     */
    protected function subEntities(): array
    {
        return [
            'from'                              => User::class,
            'sender_chat'                       => Chat::class,
            'chat'                              => Chat::class,
            'forward_origin'                    => MessageOriginFactory::class,
            'reply_to_message'                  => ReplyToMessage::class,
            'external_reply'                    => ExternalReplyInfo::class,
            'quote'                             => TextQuote::class,
            'reply_to_story'                    => Story::class,
            'via_bot'                           => User::class,
            'link_preview_options'              => LinkPreviewOptions::class,
            'entities'                          => [MessageEntity::class],
            'animation'                         => Animation::class,
            'audio'                             => Audio::class,
            'document'                          => Document::class,
            'photo'                             => [PhotoSize::class],
            'sticker'                           => Sticker::class,
            'story'                             => Story::class,
            'video'                             => Video::class,
            'video_note'                        => VideoNote::class,
            'voice'                             => Voice::class,
            'caption_entities'                  => [MessageEntity::class],
            'contact'                           => Contact::class,
            'dice'                              => Dice::class,
            'game'                              => Game::class,
            'poll'                              => Poll::class,
            'venue'                             => Venue::class,
            'location'                          => Location::class,
            'new_chat_members'                  => [User::class],
            'left_chat_member'                  => User::class,
            'new_chat_photo'                    => [PhotoSize::class],
            'message_auto_delete_timer_changed' => MessageAutoDeleteTimerChanged::class,
            'pinned_message'                    => MaybeInaccessibleMessageFactory::class,
            'invoice'                           => Invoice::class,
            'successful_payment'                => SuccessfulPayment::class,
            'users_shared'                      => UsersShared::class,
            'chat_shared'                       => ChatShared::class,
            'write_access_allowed'              => WriteAccessAllowed::class,
            'passport_data'                     => PassportData::class,
            'proximity_alert_triggered'         => ProximityAlertTriggered::class,
            'boost_added'                       => ChatBoostAdded::class,
            'forum_topic_created'               => ForumTopicCreated::class,
            'forum_topic_edited'                => ForumTopicEdited::class,
            'forum_topic_closed'                => ForumTopicClosed::class,
            'forum_topic_reopened'              => ForumTopicReopened::class,
            'general_forum_topic_hidden'        => GeneralForumTopicHidden::class,
            'general_forum_topic_unhidden'      => GeneralForumTopicUnhidden::class,
            'giveaway_created'                  => GiveawayCreated::class,
            'giveaway'                          => Giveaway::class,
            'giveaway_winners'                  => GiveawayWinners::class,
            'giveaway_completed'                => GiveawayCompleted::class,
            'video_chat_scheduled'              => VideoChatScheduled::class,
            'video_chat_started'                => VideoChatStarted::class,
            'video_chat_ended'                  => VideoChatEnded::class,
            'video_chat_participants_invited'   => VideoChatParticipantsInvited::class,
            'web_app_data'                      => WebAppData::class,
            'reply_markup'                      => InlineKeyboard::class,
            'chat_background_set'               => ChatBackground::class,
            'paid_media'                        => PaidMediaInfo::class,
            'transaction'                       => StarTransaction::class,
            'web_app'                           => WebAppInfo::class,
        ];
    }

    /**
     * return the entire command like /echo or /echo@bot1 if specified
     */
    public function getFullCommand(): ?string
    {
        $text = $this->getProperty('text') ?? '';
        if (! str_starts_with($text, '/')) {
            return null;
        }

        $no_EOL   = strtok($text, PHP_EOL);
        $no_space = strtok($text, ' ');

        // try to understand which separator \n or space divide /command from text
        return strlen($no_space) < strlen($no_EOL) ? $no_space : $no_EOL;
    }

    /**
     * Get command
     */
    public function getCommand(): ?string
    {
        if ($command = $this->getProperty('command')) {
            return $command;
        }

        $full_command = $this->getFullCommand() ?? '';
        if (! str_starts_with($full_command, '/')) {
            return null;
        }
        $full_command = substr($full_command, 1);

        // check if command is followed by bot username
        $split_cmd = explode('@', $full_command);
        if (! isset($split_cmd[1])) {
            // command is not followed by name
            return $full_command;
        }

        if (strtolower($split_cmd[1]) === strtolower($this->getBotUsername())) {
            // command is addressed to me
            return $split_cmd[0];
        }

        return null;
    }

    /**
     * For text messages, the actual UTF-8 text of the message, 0-4096 characters.
     *
     * @param bool $without_cmd
     */
    public function getText($without_cmd = false): ?string
    {
        $text = $this->getProperty('text');

        if ($without_cmd && $command = $this->getFullCommand()) {
            if (strlen($command) + 1 < strlen($text)) {
                return substr($text, strlen($command) + 1);
            }

            return '';
        }

        return $text;
    }

    /**
     * Bot added in chat
     */
    public function botAddedInChat(): bool
    {
        foreach ($this->getNewChatMembers() as $member) {
            if ($member instanceof User && $member->getUsername() === $this->getBotUsername()) {
                return true;
            }
        }

        return false;
    }

    /**
     * Detect type based on properties.
     */
    public function getType(): string
    {
        $types = [
            'text',
            'animation',
            'audio',
            'document',
            'photo',
            'sticker',
            'video',
            'video_note',
            'voice',
            'contact',
            'dice',
            'game',
            'poll',
            'venue',
            'location',
            'new_chat_members',
            'left_chat_member',
            'new_chat_title',
            'new_chat_photo',
            'delete_chat_photo',
            'group_chat_created',
            'supergroup_chat_created',
            'channel_chat_created',
            'message_auto_delete_timer_changed',
            'migrate_to_chat_id',
            'migrate_from_chat_id',
            'pinned_message',
            'invoice',
            'successful_payment',
            'users_shared',
            'chat_shared',
            'write_access_allowed',
            'passport_data',
            'proximity_alert_triggered',
            'boost_added',
            'forum_topic_created',
            'forum_topic_edited',
            'forum_topic_closed',
            'forum_topic_reopened',
            'general_forum_topic_hidden',
            'general_forum_topic_unhidden',
            'video_chat_scheduled',
            'video_chat_started',
            'video_chat_ended',
            'video_chat_participants_invited',
            'web_app_data',
            'reply_markup',
            'chat_background_set',
        ];

        $is_command = $this->getCommand() !== null;

        foreach ($types as $type) {
            if ($this->getProperty($type) !== null) {
                if ($is_command && $type === 'text') {
                    return 'command';
                }

                return $type;
            }
        }

        return 'message';
    }
}
