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


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the POST data
    $selectedGrade = $_POST['grade'];  // Fetch grade
    $qid = $_POST['qid'];  // Fetch question ID
    $subject = $_POST['subject'];
    $queTitle = $_POST['queTitle'];
    $option1 = $_POST['option1'];
    $option2 = $_POST['option2'];
    $option3 = $_POST['option3'];
    $option4 = $_POST['option4'];
    $correctOption = $_POST['correctOption'];

    if (!empty($selectedGrade)) {
        // Prepare and execute the update query
        $sql = "UPDATE `$selectedGrade` SET
                    subject = :subject,
                    queTitle = :queTitle,
                    option1 = :option1,
                    option2 = :option2,
                    option3 = :option3,
                    option4 = :option4,
                    correctOption = :correctOption
                WHERE qid = :qid";

        $stmt = $con->prepare($sql);
        $stmt->bindParam(':subject', $subject);
        $stmt->bindParam(':queTitle', $queTitle);
        $stmt->bindParam(':option1', $option1);
        $stmt->bindParam(':option2', $option2);
        $stmt->bindParam(':option3', $option3);
        $stmt->bindParam(':option4', $option4);
        $stmt->bindParam(':correctOption', $correctOption);
        $stmt->bindParam(':qid', $qid);

        $stmt->execute();
        echo "Question updated successfully!";
        header("location: QnView.php?grade=$selectedGrade");
    } else {
        echo "Grade not set!";
    }
}
