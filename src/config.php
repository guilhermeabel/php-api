<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Database\MySQLDatabase;

$hostname = getenv('MYSQL_DB_HOST');
$database = getenv('MYSQL_DB_NAME');
$username = getenv('MYSQL_DB_USER');
$password = getenv('MYSQL_DB_PASSWORD');

try {
	$databaseConnection = MySQLDatabase::getInstance();
	$databaseConnection->setPersistent(true);
	$databaseConnection->connect($hostname, $database, $username, $password);
} catch (Exception $e) {
	echo 'Error connecting to the database.';
}

function shutdown() {
    $error = error_get_last();
     // Fatal error, E_ERROR === 1
    if ($error && $error['type'] === E_ERROR) {
        echo 'fatal error';
    }
}

register_shutdown_function('shutdown');
