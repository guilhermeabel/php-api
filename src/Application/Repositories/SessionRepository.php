<?php

declare(strict_types=1);

namespace Application\Repositories;

use Application\Entities\SessionEntity;

interface SessionRepository {
    public function save(SessionEntity $session): void;

    public function findByToken(string $token): ?SessionEntity;

    public function deleteByToken(string $token): void;
}
