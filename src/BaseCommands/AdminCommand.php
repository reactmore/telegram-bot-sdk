<?php

namespace Reactmore\TelegramBotSdk\BaseCommands;

abstract class AdminCommand extends Command
{
    /**
     * @var bool
     */
    protected $private_only = true;
}
