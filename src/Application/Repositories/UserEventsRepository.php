<?php

declare(strict_types=1);

namespace Application\Repositories;

use Application\Entities\UserEventsEntity;

interface UserEventsRepository {
    public function save(UserEventsEntity $userEvents): void;
}
