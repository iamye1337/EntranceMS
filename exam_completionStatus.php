
<!-- onclick of submit button exucute this php using "location" and this will uodate the completionStatus to 1 which will prevent relog-in ->


<?php
include("database/connectdb.php");
include("login_process.php");


session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $symbol = $_SESSION['symbolNo'];

    //when the exam is completed, execute this query
    $sql = "UPDATE student SET completionStatus = 1 WHERE id = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("i", $symbol);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        // Update was successful
        echo "Exam completion status updated successfully.";
    } else {
        // Error updating status
        echo "Error updating exam completion status.";
    }
}
?>