<?php

declare(strict_types=1);

namespace Infrastructure\Database;

interface Transaction {
    public function begin(): void;

    public function commit(): void;

    public function rollback(): void;
}
