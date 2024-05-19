<?php

declare(strict_types=1);

namespace Infrastructure\Api;

use Infrastructure\Persistence\Database\MySQL\MySQLDatabase;

class UserController extends Controller {
    private MySQLDatabase $database;

    public function __construct() {
        $this->database = MySQLDatabase::getInstance();
    }

    public function index() {
        $users = $this->database->query('SELECT * FROM users');

        return $this->view('users/index', ['users' => $users]);
    }

    public function create() {
        return $this->view('signup');
    }

    public function store() {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $document = $_POST['document'];

        $this->database->query("INSERT INTO users (name, email, document, phone) VALUES ('{$name}', '{$email}', '{$document}', '{$phone}')");

        return $this->view('home');
    }

    public function update(int $id) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $document = $_POST['document'];

        $this->database->query("UPDATE users SET name = '{$name}', email = '{$email}', document = '{$document}' WHERE id = {$id}");

        return $this->view('users');
    }

    public function delete(int $id) {
        $this->database->query("DELETE FROM users WHERE id = {$id}");

        return $this->view('users');
    }
}
