<?php

declare(strict_types=1);

namespace Infrastructure\Database;

interface DatabaseConnectionInterface extends TransactionInterface {
    public function connect(string $host, string $database, string $username, string $password): bool;

    public function disconnect(): void;

    public function query(string $sql): mixed;
}
