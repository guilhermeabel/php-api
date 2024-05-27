<?php

declare(strict_types=1);

namespace Infrastructure\Api;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class TestController extends Controller {
    public static function index(Request $request, Response $response) {
        // $_SESSION['user'] = 'John Doe';
        echo $_SESSION['user'];
        $id = session_id();
        echo "\n id:{$id}\n";

        $key = "PHPREDIS_SESSION:{$id}";

        return $response;
    }
}
