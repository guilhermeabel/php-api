<?php

declare(strict_types=1);

namespace Infrastructure\Api;

use Application\UseCases\CreateAccountUseCase;
use Infrastructure\Database\MySQL\MySQLDatabase;
use Infrastructure\Repository\UserMySQLRepository;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class AccountController extends Controller {
    public static function store(Request $request, Response $response): void {
        $dbConnection = MySQLDatabase::getInstance();
        $userRepository = new UserMySQLRepository();

        $data = $request->getParsedBody();
        $name = $data['name'];
        $email = $data['email'];
        $password = $data['password'];

        if (empty($name) || empty($email) || empty($password)) {
            $response->getBody()->write(json_encode(['error' => 'Invalid data']));
            $response->withHeader('Content-Type', 'application/json');
            $response->withStatus(400);

            return;
        }

        $useCase = new CreateAccountUseCase($dbConnection, $userRepository);
        $userEntity = $useCase->execute(
            $name,
            $email,
            $password
        );

        $response->getBody()->write(json_encode($userEntity));

        $response->withHeader('Content-Type', 'application/json');
        $response->withStatus(201);
    }
}
