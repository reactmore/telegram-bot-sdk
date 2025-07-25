<?php

declare(strict_types=1);

namespace Reactmore\TelegramBotSdk\Commands;

use CodeIgniter\CLI\BaseCommand;

/**
 * Base functionality for enable/disable.
 */
abstract class TelegramCommand extends BaseCommand
{
    /**
     * Command grouping.
     */
    protected $group = 'Telegram';

}