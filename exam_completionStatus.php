<!-- onclick of submit button exucute this php using "location" and this will uodate the completionStatus to 1 which will prevent relog-in ->


<?php
include("database/connectdb.php");
include("login_process.php");


session_start();
if ($symbol) {
    $sql = "UPDATE users SET CompletionStatus = 1 WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $symbol);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Completion status updated successfully.";
    } else {
        echo "Error updating completion status.";
    }
} else {
    echo "User not found.";
}


?>