<?php

declare(strict_types=1);

require_once __DIR__ . '/../src/config.php';

use App\Middleware\LogRequestMiddleware;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();
$app->addRoutingMiddleware();
$app->addBodyParsingMiddleware();
$app->addErrorMiddleware(true, true, true);

$app->add(new LogRequestMiddleware());

$app->get('/', static function (Request $request, Response $response, $args) {
    $response->getBody()->write('Hello world!');

    return $response;
});

$app->run();
