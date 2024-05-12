<?php

declare(strict_types=1);

namespace Infrastructure\Database\MySQL;

use Infrastructure\Database\DatabaseConnectionInterface;

class MySQLDatabase implements DatabaseConnectionInterface {
    private \PDO $connection;
    private bool $persistent = false;
    private static ?MySQLDatabase $instance = null;

    private function __construct() {}

    public static function getInstance(): self {
        if (null === self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function connect(string $host, string $database, string $username, string $password): bool {
        $pdo = new \PDO("mysql:host={$host};dbname={$database}", $username, $password, [
            \PDO::ATTR_PERSISTENT => $this->persistent,
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        ]);

        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $this->connection = $pdo;

        return isset($this->connection);
    }

    public function query(string $sql): mixed {
        try {
            $statement = $this->connection->prepare($sql);
            $statement->execute();

            return $statement->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            return null;
        }
    }

    public function disconnect(): void {
        if ($this->connection->getAttribute(\PDO::ATTR_PERSISTENT)) {
            throw new \Exception('Cannot disconnect a persistent connection');
        }

        if (!$this->connection) {
            return;
        }

        $this->connection = null;
    }

    public function setPersistent(bool $persistent): void {
        $this->persistent = $persistent;
    }

    public function isPersistent(): bool {
        return $this->persistent;
    }

    public function begin(): void {
        $this->connection->beginTransaction();
    }

    public function commit(): void {
        $this->connection->commit();
    }

    public function rollback(): void {
        $this->connection->rollBack();
    }
}
