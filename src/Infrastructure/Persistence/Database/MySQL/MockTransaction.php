<?php

declare(strict_types=1);

namespace Infrastructure\Persistence\Database\MySQL;

use Infrastructure\Persistence\Database\Transaction;

class MockTransaction implements Transaction {
    public function begin(): void {}

    public function commit(): void {}

    public function rollback(): void {}
}
