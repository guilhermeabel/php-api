<?php

require_once __DIR__ . '/../src/config.php';

use App\Web\Router;

$userController = new \App\Controllers\UserController();
$testController = new \App\Controllers\TestController();

$router = new Router();
$router->get('/signup', fn () => $userController->create());
$router->post('/signup', fn () => $userController->store());
$router->get('/test', fn () => $testController->index());

$router->handleRequest();



