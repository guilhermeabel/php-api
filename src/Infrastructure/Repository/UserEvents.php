<?php

declare(strict_types=1);

namespace Model;

use \Database\MySQLDatabase;

class UserEvents {
    private MySQLDatabase $database;

    public function __construct() {
        $this->database = MySQLDatabase::getInstance();
    }

    public function all() {
        return $this->database->query('SELECT * FROM user_events');
    }

    public function find(int $id) {
        return $this->database->query("SELECT * FROM user_events WHERE id = {$id}");
    }

    public function create(array $data): void {
        $user_id = $data['user_id'];
        $event_id = $data['event_id'];

        $this->database->query("INSERT INTO user_events (user_id, event_id) VALUES ('{$user_id}', '{$event_id}')");
    }

    public function update(int $id, array $data): void {
        $user_id = $data['user_id'];
        $event_id = $data['event_id'];

        $this->database->query("UPDATE user_events SET user_id = '{$user_id}', event_id = '{$event_id}' WHERE id = {$id}");
    }

    public function delete(int $id): void {
        $this->database->query("DELETE FROM user_events WHERE id = {$id}");
    }

    public function findByEmail(string $email) {
        return $this->database->query("SELECT * FROM user_events WHERE email = '{$email}'");
    }
}
