<?php

declare(strict_types=1);

require_once __DIR__ . '/../src/config.php';

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();
$app->addRoutingMiddleware();
$app->addBodyParsingMiddleware();
$app->addErrorMiddleware(true, true, true);

$logMiddleware = static function (Request $request, $handler) {
    $response = $handler->handle($request);
    $requestBody = $request->getParsedBody();
    $responseBody = (string) $response->getBody();

    file_put_contents(__DIR__ . '/../logs/app.requests.log', sprintf(
        "[%s] %s %s %s %s\n",
        date('Y-m-d H:i:s'),
        $request->getMethod(),
        $request->getUri()->getPath(),
        json_encode($requestBody),
        $responseBody
    ), FILE_APPEND);

    return $response;
};

// $app->add($logMiddleware);

$app->get('/', static function (Request $request, Response $response, $args) {
    $response->getBody()->write('Hello world!');

    return $response;
});

$app->run();
