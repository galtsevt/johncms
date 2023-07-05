<?php

/**
 * This file is part of JohnCMS Content Management System.
 *
 * @copyright JohnCMS Community
 * @license   https://opensource.org/licenses/GPL-3.0 GPL-3.0
 * @link      https://johncms.com JohnCMS Project
 */

use Johncms\Notifications\Controllers\NotificationController;
use Johncms\Users\Middlewares\AuthorizedUserMiddleware;
use League\Route\RouteGroup;
use League\Route\Router;

/**
 * @psalm-suppress UndefinedInterfaceMethod
 */
return function (Router $router) {
    $router->addPatternMatcher('topType', '[a-z]+');

    $router->group('/notification', function (RouteGroup $route) {
        $route->get('/', [NotificationController::class, 'index'])->setName('notification.index');
    })->middleware(AuthorizedUserMiddleware::class);
};
