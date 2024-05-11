<?php

declare(strict_types=1);

namespace App\Model;

use App\Database\MySQLDatabase;

class User {
    private MySQLDatabase $database;

    public function __construct() {
        $this->database = MySQLDatabase::getInstance();
    }

    public function all() {
        return $this->database->query('SELECT * FROM users');
    }

    public function find(int $id) {
        return $this->database->query("SELECT * FROM users WHERE id = {$id}");
    }

    public function create(array $data): void {
        $name = $data['name'];
        $email = $data['email'];
        $document = $data['document'];

        $this->database->query("INSERT INTO users (name, email, document) VALUES ('{$name}', '{$email}', '{$document}')");
    }

    public function update(int $id, array $data): void {
        $name = $data['name'];
        $email = $data['email'];
        $document = $data['document'];

        $this->database->query("UPDATE users SET name = '{$name}', email = '{$email}', document = '{$document}' WHERE id = {$id}");
    }

    public function delete(int $id): void {
        $this->database->query("DELETE FROM users WHERE id = {$id}");
    }

    public function findByEmail(string $email) {
        return $this->database->query("SELECT * FROM users WHERE email = '{$email}'");
    }
}
