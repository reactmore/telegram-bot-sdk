<?php

namespace Reactmore\TelegramBotSdk\Entities\BotCommandScope;

use Reactmore\TelegramBotSdk\Entities\Entity;

/**
 * Class BotCommandScopeChatMember
 *
 * @see https://core.telegram.org/bots/api#botcommandscopechatmember
 *
 * <code>
 * $data = [
 *   'chat_id' => '123456',
 *   'user_id' => 987654,
 * ];
 * </code>
 *
 * @method string getType()                                                                                                                                 Scope type, must be chat_member
 * @method int    getUserId()                                                                                                                               Unique identifier of the target user
 * @method $this  setUserId(int $user_id)                                                                                                                   Unique identifier of the target user
 * @method $this  setChatId(string $chat_id) Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
 */
class BotCommandScopeChatMember extends Entity implements BotCommandScope
{
    public function __construct(array $data = [])
    {
        $data['type'] = 'chat_member';
        parent::__construct($data);
    }
}
