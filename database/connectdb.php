<?php
// Database connection details
$servername = "localhost";   //  server
$username = "schoolwork";  //  username
$password = "newpassword";  //  password
$dbname = "login";    // database name

// Create a connection to the MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
/*if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected successfully"; }
*/
if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
