<?php

namespace Reactmore\TelegramBotSdk\BaseCommands\SystemCommands;

use Reactmore\TelegramBotSdk\BaseCommands\SystemCommand;

/**
 * Generic command
 */
class GenericCommand extends SystemCommand
{
    /**
     * @var string
     */
    protected $name = 'generic';

    /**
     * @var string
     */
    protected $description = 'Handles generic commands or is executed by default when a command is not found';

    /**
     * @var string
     */
    protected $version = '1.1.0';
}
