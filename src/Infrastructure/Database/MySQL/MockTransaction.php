<?php

declare(strict_types=1);

namespace Infrastructure\Database\MySQL;

use Infrastructure\Database\Transaction;

class MockTransaction implements Transaction {
    public function begin(): void {}

    public function commit(): void {}

    public function rollback(): void {}
}
