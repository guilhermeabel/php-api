<?php

declare(strict_types=1);

use Application\Entities\UserEntity;
use Infrastructure\Database\MySQL\MySQLDatabase;

require_once __DIR__ . '/../vendor/autoload.php';

$hostname = getenv('MYSQL_DB_HOST');
$database = getenv('MYSQL_DB_NAME');
$username = getenv('MYSQL_DB_USER');
$password = getenv('MYSQL_DB_PASSWORD');

new UserEntity(0, 'john', 'john@gmail.com', 'password');

try {
    $databaseConnection = MySQLDatabase::getInstance();
    $databaseConnection->setPersistent(true);
    $databaseConnection->connect($hostname, $database, $username, $password);
} catch (Exception $e) {
    echo 'Error connecting to the database.';
}

function shutdown(): void {
    $error = error_get_last();
    // Fatal error, E_ERROR === 1
    if ($error && E_ERROR === $error['type']) {
        echo 'fatal error';
    }
}

register_shutdown_function('shutdown');
