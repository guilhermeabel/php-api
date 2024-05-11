<?php

declare(strict_types=1);

require_once __DIR__ . '/../src/config.php';

use App\Controllers\TestController;
use App\Controllers\UserController;
use App\Web\Router;

$userController = new UserController();
$testController = new TestController();

$router = new Router();
$router->get('/signup', static fn () => $userController->create());
$router->post('/signup', static fn () => $userController->store());
$router->get('/test', static fn () => $testController->index());

$router->handleRequest();
