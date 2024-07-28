<?php

declare(strict_types=1);

namespace Application\Entities;

class SessionEntity {
    private $id;
    private $user_id;
    private $token;
    private $created_at;
    private $updated_at;

    public function __construct(int $id, int $user_id, string $token, string $created_at, string $updated_at) {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->token = $token;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getUserId(): int {
        return $this->user_id;
    }

    public function getToken(): string {
        return $this->token;
    }

    public function getCreatedAt(): string {
        return $this->created_at;
    }

    public function getUpdatedAt(): string {
        return $this->updated_at;
    }
}
