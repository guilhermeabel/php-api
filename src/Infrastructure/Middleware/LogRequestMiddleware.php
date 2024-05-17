<?php

declare(strict_types=1);

namespace Infrastructure\Middleware;

use Psr\Http\Message\ServerRequestInterface as Request;

class LogRequestMiddleware {
    public function __invoke(Request $request, $handler) {
        $response = $handler->handle($request);
        $requestBody = $request->getParsedBody();
        $responseBody = (string) $response->getBody();

        file_put_contents(__DIR__ . '/../../../logs/app.requests.log', sprintf(
            "[%s] %s %s %s %s\n",
            date('Y-m-d H:i:s'),
            $request->getMethod(),
            $request->getUri()->getPath(),
            json_encode($requestBody),
            $responseBody
        ), FILE_APPEND);

        return $response;
    }
}
