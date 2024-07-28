<?php

declare(strict_types=1);

use Infrastructure\Persistence\Database\MySQL\MySQLDatabase;

require_once __DIR__ . '/../vendor/autoload.php';

session_start();

define('APP_ENV', $_ENV['APP_ENV']);
define('ENV_DEV', 'dev');
define('ENV_PROD', 'prod');

$hostname = $_ENV['MYSQL_HOST'];
$port = $_ENV['MYSQL_PORT'];
$database = $_ENV['MYSQL_DATABASE'];
$username = $_ENV['MYSQL_USER'];
$password = $_ENV['MYSQL_PASSWORD'];

try {
    $databaseConnection = MySQLDatabase::getInstance();
    $databaseConnection->setPersistent(true);
    $databaseConnection->connect($hostname, $port, $database, $username, $password);
} catch (Exception $e) {
    echo "Error connecting to the database. \n";

    if (APP_ENV === ENV_PROD) {
        echo 'Please contact the system administrator.';

        exit;
    }

    echo "\nError: " . $e->getMessage();
}

function shutdown(): void {
    $error = error_get_last();
    // Fatal error, E_ERROR === 1
    if ($error && E_ERROR === $error['type']) {
        echo 'fatal error';
    }
}

register_shutdown_function('shutdown');
