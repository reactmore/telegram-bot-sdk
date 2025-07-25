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
