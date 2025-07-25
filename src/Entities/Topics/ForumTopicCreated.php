<?php

namespace Reactmore\TelegramBotSdk\Entities\Topics;

use Reactmore\TelegramBotSdk\Entities\Entity;

/**
 * Class ForumTopicCreated
 *
 * This object represents a service message about a new forum topic created in the chat.
 *
 * @see https://core.telegram.org/bots/api#forumtopiccreated
 *
 * @method int    getIconColor()         Color of the topic icon in RGB format
 * @method string getIconCustomEmojiId() Optional. Unique identifier of the custom emoji shown as the topic icon
 * @method string getName()              Name of the topic
 */
class ForumTopicCreated extends Entity
{
}
