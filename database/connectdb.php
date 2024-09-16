<?php
$serverName = "localhost";
$userName = "entrance_ms";
$password = "entrance_ms@Mysql123";
$databaseName = "entrance_ms";

// Create connection
$mysqlConnection = new mysqli(hostname: $serverName, username: $userName, password: $password, database: $databaseName);

// Check connection
if ($mysqlConnection->connect_error) {
    die("Connection failed: " . $mysqlConnection->connect_error);
}
?>
