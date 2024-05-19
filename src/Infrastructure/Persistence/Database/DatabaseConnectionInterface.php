<?php

declare(strict_types=1);

namespace Infrastructure\Persistence\Database;

interface DatabaseConnectionInterface extends Transaction {
    public function connect(string $host, string $database, string $username, string $password): bool;

    public function disconnect(): void;

    public function query(string $sql): mixed;
}
