<?php

namespace Reactmore\TelegramBotSdk\Entities\Topics;

use Reactmore\TelegramBotSdk\Entities\Entity;

/**
 * Class ForumTopicEdited
 *
 * This object represents a service message about an edited forum topic.
 *
 * @see https://core.telegram.org/bots/api#forumtopicedited
 *
 * @method string getIconCustomEmojiId() Optional. New identifier of the custom emoji shown as the topic icon, if it was edited; an empty string if the icon was removed
 * @method string getName()              Optional. New name of the topic, if it was edited
 */
class ForumTopicEdited extends Entity
{
}
