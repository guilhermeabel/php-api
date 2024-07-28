<?php

declare(strict_types=1);

namespace Application\Entities;

class UserEntity {
    private ?int $id;
    private string $name;
    private string $email;
    private string $password;
    private ?string $created_at;
    private ?string $updated_at;

    public function __construct(?int $id, string $name, string $email, string $password, ?string $created_at, ?string $updated_at) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    public static function create(string $name, string $email, string $password): self {
        return new self(null, $name, $email, $password, null, null);
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getPassword(): string {
        return $this->password;
    }

    public function getCreatedAt(): ?string {
        return $this->created_at;
    }

    public function getUpdatedAt(): ?string {
        return $this->updated_at;
    }
}
