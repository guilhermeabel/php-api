<?php

declare(strict_types=1);

namespace Infrastructure\Middleware;

use Application\DataTransferObjects\RequestLogDTO;
use Infrastructure\Monitoring\Log;
use Psr\Http\Message\ServerRequestInterface as Request;

class LogRequestMiddleware {
    public function __invoke(Request $request, $handler) {
        $response = $handler->handle($request);
        $requestLogDTO = new RequestLogDTO(
            $request->getMethod(),
            $request->getUri()->getPath(),
            $request->getUri()->getQuery(),
            $request->getParsedBody()
        );

        (new Log())->logRequest($requestLogDTO);

        return $response;
    }
}
