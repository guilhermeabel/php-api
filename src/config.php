<?php

declare(strict_types=1);

use Infrastructure\Persistence\Database\MySQL\MySQLDatabase;

require_once __DIR__ . '/../vendor/autoload.php';

$hostname = getenv('MYSQL_HOST');
$port = getenv('MYSQL_PORT');
$database = getenv('MYSQL_DB');
$username = getenv('MYSQL_USER');
$password = getenv('MYSQL_PASSWORD');

try {
    $databaseConnection = MySQLDatabase::getInstance();
    $databaseConnection->setPersistent(true);
    $databaseConnection->connect($hostname, $port, $database, $username, $password);
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
