<?php

namespace Reactmore\TelegramBotSdk\BaseCommands\UserCommands;

use Reactmore\TelegramBotSdk\BaseCommands\UserCommand;
use Reactmore\TelegramBotSdk\Entities\ServerResponse;
use Reactmore\TelegramBotSdk\Request;

/**
 * Start command
 */
class StartCommand extends UserCommand
{
    /**
     * @var string
     */
    protected $name = 'start';

    /**
     * @var string
     */
    protected $description = 'Start command';

    /**
     * @var string
     */
    protected $usage = '/start';

    /**
     * @var string
     */
    protected $version = '1.2.0';

    /**
     * Command execute method
     */
    public function execute(): ServerResponse
    {
        // $message = $this->getMessage() ?: $this->getEditedMessage() ?: $this->getChannelPost() ?: $this->getEditedChannelPost();
        // $chat_id = $message->getChat()->getId();
        // $user_id = $message->getFrom()->getId();

        return Request::emptyResponse();
    }
}
