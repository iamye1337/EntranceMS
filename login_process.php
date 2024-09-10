<?php
session_start();

include 'database/connect.php';

//retrieving form data
$symbol_no = $_POST['symbol_no'];

//Execute SQL query
$sql = "SELECT * FROM student WHERE Symbol_No='$symbol_no'";
$result = $conn->query($sql);

// Check if a row was returned
if ($result->num_rows > 0) {
    // Start a session and store user data
    $_SESSION['Symbol_No'] = $Symbol_No;
    $_SESSION['logged_in'] = true;

    // Redirect to dashboard or other protected page
    header("Location: profile.html");
    exit();
} else {
    // Handle incorrect credentials (e.g., display an error message)
    echo "Symbol number is not registered";
}

$conn->close();
?>