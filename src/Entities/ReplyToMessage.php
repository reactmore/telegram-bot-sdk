<?php

namespace Reactmore\TelegramBotSdk\Entities;

/**
 * Class ReplyToMessage
 *
 * @todo Is this even required?!
 */
class ReplyToMessage extends Message
{
    /**
     * ReplyToMessage constructor.
     */
    public function __construct(array $data, string $bot_username = '')
    {
        // As explained in the documentation
        // Reply to message can't contain other reply to message entities
        unset($data['reply_to_message']);

        parent::__construct($data, $bot_username);
    }
}
