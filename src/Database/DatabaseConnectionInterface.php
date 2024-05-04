<?php

namespace App\Database;

interface DatabaseConnectionInterface extends TransactionInterface
{
	public function connect(string $host, string $database, string $username, string $password): bool;
	public function disconnect(): void;
	public function query(string $sql): mixed;

}
