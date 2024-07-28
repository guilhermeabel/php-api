<?php

declare(strict_types=1);

namespace Infrastructure\Persistence\Repository;

use Application\Entities\UserEntity;
use Application\Repositories\UserRepository;
use Infrastructure\Persistence\Database\MySQL\MySQLDatabase;

class UserMySQLRepository implements UserRepository {
    public function save(UserEntity $user): void {
        MySQLDatabase::getInstance()->query("INSERT INTO users (name, email, password) VALUES ('{$user->getName()}', '{$user->getEmail()}', '{$user->getPassword()}')");
    }
}
