<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->group('telegram', ['namespace' => 'Reactmore\TelegramBotSdk\Controllers\Services'], function ($routes) {
    $routes->post('hook', 'TelegramController::index');
    $routes->get('setWebhook', 'TelegramController::setWebhook');
    $routes->get('deleteWebhook', 'TelegramController::deleteWebhook');
});
