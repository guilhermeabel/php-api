<?php

declare(strict_types=1);

namespace Application\Repositories;

use Application\Entities\UserEntity;

interface UserRepository {
    public function save(UserEntity $user): void;
}
