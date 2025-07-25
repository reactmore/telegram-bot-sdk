<?php

namespace Reactmore\TelegramBotSdk\BaseCommands\AdminCommands;

use Reactmore\TelegramBotSdk\BaseCommands\AdminCommand;
use Reactmore\TelegramBotSdk\Entities\ServerResponse;
use Reactmore\TelegramBotSdk\Exception\TelegramException;

class ChatsCommand extends AdminCommand
{
    /**
     * @var string
     */
    protected $name = 'chats';

    /**
     * @var string
     */
    protected $description = 'List or search all chats stored by the bot';

    /**
     * @var string
     */
    protected $usage = '/chats, /chats * or /chats <search string>';

    /**
     * @var string
     */
    protected $version = '1.2.0';

    /**
     * @var bool
     */
    protected $need_mysql = true;

    /**
     * Command execute method
     *
     * @throws TelegramException
     */
    public function execute(): ServerResponse
    {
        $usage = $this->getUsage();

        return $this->replyToChat(sprintf('This command is not available because the database feature has been removed.%sUsage: %s', PHP_EOL, $usage));
    }
}
