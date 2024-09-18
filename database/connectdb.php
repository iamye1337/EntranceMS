<?php
$serverName = "localhost";
$userName = "root";
$password = "";
$databaseName = "entrance_ms";

// Create connection
$mysqlConnection = new mysqli($serverName, $userName, $password, $databaseName);
// Check connection
if ($mysqlConnection->connect_error) {
    die("Connection failed: " . $mysqlConnection->connect_error);
}
?>
