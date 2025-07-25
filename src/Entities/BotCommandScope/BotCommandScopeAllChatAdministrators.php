<?php

namespace Reactmore\TelegramBotSdk\Entities\BotCommandScope;

use Reactmore\TelegramBotSdk\Entities\Entity;

/**
 * Class BotCommandScopeAllChatAdministrators
 *
 * @see https://core.telegram.org/bots/api#botcommandscopeallchatadministrators
 */
class BotCommandScopeAllChatAdministrators extends Entity implements BotCommandScope
{
    public function __construct(array $data = [])
    {
        $data['type'] = 'all_chat_administrators';
        parent::__construct($data);
    }
}
