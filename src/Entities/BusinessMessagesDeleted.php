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
 * Class BusinessMessagesDeleted
 *
 * This object is received when messages are deleted from a business account.
 *
 * @see https://core.telegram.org/bots/api#businessmessagesdeleted
 *
 * @method string    getBusinessConnectionId() Unique identifier of the business connection
 * @method Chat      getChat()                 Information about a chat in the business account. The bot may not have access to the chat or the corresponding user.
 * @method list<int> getMessageIds()           A list of identifiers of deleted messages in the chat of the business account
 */
class BusinessMessagesDeleted extends Entity
{
    /**
     * {@inheritDoc}
     */
    protected function subEntities(): array
    {
        return [
            'chat' => Chat::class,
        ];
    }
}
