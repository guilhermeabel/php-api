<?php

namespace Infrastructure\Database\MySQL;

use Infrastructure\Database\TransactionInterface;

class MockTransaction implements TransactionInterface {
	public function begin(): void {}

	public function commit(): void {}

	public function rollback(): void {}
}
