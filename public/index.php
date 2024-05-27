<?php

declare(strict_types=1);

require_once __DIR__ . '/../src/config.php';

use Infrastructure\Api\AccountController;
use Infrastructure\Api\TestController;
use Infrastructure\Middleware\LogRequestMiddleware;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app = AppFactory::create();
$app->addRoutingMiddleware();
$app->addBodyParsingMiddleware();
$app->addErrorMiddleware(true, true, true);

$app->add(new LogRequestMiddleware());

$app->get('/', static fn (Request $request, Response $response) => TestController::index($request, $response));
$app->post('/account', static fn (Request $request, Response $response) => AccountController::store($request, $response));

$app->run();
