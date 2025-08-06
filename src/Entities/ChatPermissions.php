<?php

namespace Reactmore\TelegramBotSdk\Entities;

/**
 * Class ChatPermissions
 *
 * @see https://core.telegram.org/bots/api#chatpermissions
 *
 * @method bool getCanAddWebPagePreviews() Optional. True, if the user is allowed to add web page previews to their messages, implies can_send_media_messages
 * @method bool getCanChangeInfo()         Optional. True, if the user is allowed to change the chat title, photo and other settings. Ignored in public supergroups
 * @method bool getCanInviteUsers()        Optional. True, if the user is allowed to invite new users to the chat
 * @method bool getCanManageTopics()       Optional. True, if the user is allowed to create forum topics. If omitted defaults to the value of can_pin_messages
 * @method bool getCanPinMessages()        Optional. True, if the user is allowed to pin messages. Ignored in public supergroups
 * @method bool getCanSendAudios()         Optional. True, if the user is allowed to send audios
 * @method bool getCanSendDocuments()      Optional. True, if the user is allowed to send documents
 * @method bool getCanSendMessages()       Optional. True, if the user is allowed to send text messages, contacts, locations and venues
 * @method bool getCanSendOtherMessages()  Optional. True, if the user is allowed to send animations, games, stickers and use inline bots, implies can_send_media_messages
 * @method bool getCanSendPhotos()         Optional. True, if the user is allowed to send photos
 * @method bool getCanSendPolls()          Optional. True, if the user is allowed to send polls, implies can_send_messages
 * @method bool getCanSendVideoNotes()     Optional. True, if the user is allowed to send video notes
 * @method bool getCanSendVideos()         Optional. True, if the user is allowed to send videos
 * @method bool getCanSendVoiceNotes()     Optional. True, if the user is allowed to send voice notes
 */
class ChatPermissions extends Entity
{
    /**
     * True, if the user is allowed to send audios, documents, photos, videos, video notes OR voice notes
     *
     * @deprecated Use new fine-grained methods provided by Telegram Bot API.
     */
    public function getCanSendMediaMessages(): bool
    {
        return $this->getCanSendAudios()
            || $this->getCanSendDocuments()
            || $this->getCanSendPhotos()
            || $this->getCanSendVideos()
            || $this->getCanSendVideoNotes()
            || $this->getCanSendVoiceNotes();
    }
}
