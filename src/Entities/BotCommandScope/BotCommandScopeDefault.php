<?php

namespace Reactmore\TelegramBotSdk\Entities\BotCommandScope;

use Reactmore\TelegramBotSdk\Entities\Entity;

/**
 * Class BotCommandScopeDefault
 *
 * @see https://core.telegram.org/bots/api#botcommandscopedefault
 */
class BotCommandScopeDefault extends Entity implements BotCommandScope
{
    public function __construct(array $data = [])
    {
        $data['type'] = 'default';
        parent::__construct($data);
    }
}
