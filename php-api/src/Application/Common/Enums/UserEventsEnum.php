<?php

declare(strict_types=1);

namespace Application\Common\Enums;

enum UserEventsEnum: string {
    case USER_CREATED = 'user_created';
    case USER_UPDATED = 'user_updated';
    case USER_DELETED = 'user_deleted';
}
