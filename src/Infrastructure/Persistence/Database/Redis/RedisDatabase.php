<?php

declare(strict_types=1);

namespace Infrastructure\Persistence\Database\Redis;

class RedisDatabase {
    private static self $instance;
    private \Redis $connection;

    private function __construct() {}

    public static function getInstance(): self {
        if (null === self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function getConnection() {
        return $this->connection;
    }

    public function connect(string $host, string $port, string $password): bool {
        $this->connection = new \Redis();

        $this->connection->connect($host, $port);

        if (!empty($password)) {
            $this->connection->auth($password);
        }

        try {
            $this->connection->ping();
        } catch (\RedisException $e) {
            return false;
        }
    }

    public static function set(string $key, string $value): void {
        $instance = self::getInstance();
        $connection = $instance->getConnection();

        $connection->set($key, $value);
    }

    public static function get(string $key): string {
        $instance = self::getInstance();
        $connection = $instance->getConnection();

        return $connection->get($key);
    }
}
