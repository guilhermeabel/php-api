<?php

declare(strict_types=1);

namespace Application\Entities;

class UserEventsEntity {
    public const CREATED = 'user_created';
    public const UPDATED = 'user_updated';

    private int $userId;
    private int $eventId;

    public function __construct(int $userId, int $eventId) {
        $this->userId = $userId;
        $this->eventId = $eventId;
    }

    public static function create(int $userId, string $eventName): self {
        $eventId = (int) uniqid() + $eventName; // get id based on name enum

        return new self($userId, $eventId);
    }
}
