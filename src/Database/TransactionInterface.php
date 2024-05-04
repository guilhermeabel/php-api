<?php

namespace App\Database;

interface TransactionInterface
{
	public function beginTransaction(): void;
	public function commit(): void;
	public function rollback(): void;
}
