<?php
$HOST = "localhost";
$USERNAME = "root";
$PASSWORD = "";
$DB_NAME = "entrancems"; // Database name-> entrancems

try {
    $con = new PDO("mysql:host=$HOST;dbname=$DB_NAME", $USERNAME, $PASSWORD);
} catch (Exception $e) {
    echo $e->getMessage();
}

// delete record
// Check if 'qid' and 'grade' are passed as query parameters
if (isset($_GET['qid']) && isset($_GET['grade'])) {
    $qid = $_GET['qid'];
    $grade = $_GET['grade'];

    // Prepare SQL DELETE query
    $sql = "DELETE FROM `$grade` WHERE qid = :qid";
    $stmt = $con->prepare($sql);
    $stmt->bindParam(':qid', $qid, PDO::PARAM_INT);
    $stmt->execute();
    header("Location: QnView.php?grade=$grade");
}
