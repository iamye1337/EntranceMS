<?php
$servername = "localhost";
$username = "entrance_ms";
$password = "entrance_ms@Mysql123";
$dbname = "entrance_ms";

// Create connection
$conn = new mysqli(hostname: $servername, username: $username, password: $password, database: $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
