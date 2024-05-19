<?php

declare(strict_types=1);

namespace Infrastructure\Repository;

use Application\Entities\SessionEntity;
use Application\Repositories\SessionRepository;
use Infrastructure\Database\MySQL\MySQLDatabase;

class SessionMySQLRepository implements SessionRepository {
    public function save(SessionEntity $session): void {
        MySQLDatabase::getInstance()->query("INSERT INTO sessions (user_id, token) VALUES ({$session->getUserId()}, '{$session->getToken()}')");
    }

    public function findByToken(string $token): ?SessionEntity {
        $session = MySQLDatabase::getInstance()->query("SELECT * FROM sessions WHERE token = '{$token}'");

        if (empty($session)) {
            return null;
        }

        return new SessionEntity($session['id'], $session['user_id'], $session['token'], $session['created_at'], $session['updated_at']);
    }

    public function deleteByToken(string $token): void {
        MySQLDatabase::getInstance()->query("DELETE FROM sessions WHERE token = '{$token}'");
    }
}
