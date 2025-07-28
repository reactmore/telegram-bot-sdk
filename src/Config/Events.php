<?php

namespace Reactmore\TelegramBotSdk\Config;

use CodeIgniter\Events\Events;

Events::on('pre_system', function () {
    helper("telegram");
});