<?php

namespace Reactmore\TelegramBotSdk\Entities\BotCommandScope;

use Reactmore\TelegramBotSdk\Entities\Entity;

/**
 * Class BotCommandScopeAllPrivateChats
 *
 * @see https://core.telegram.org/bots/api#botcommandscopeallprivatechats
 */
class BotCommandScopeAllPrivateChats extends Entity implements BotCommandScope
{
    public function __construct(array $data = [])
    {
        $data['type'] = 'all_private_chats';
        parent::__construct($data);
    }
}
