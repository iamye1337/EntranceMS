<?php
include "../../database/connectdb.php";
include "../../session_handler.php";
if(!isAdminLoggedIn()) {
    header("Location:../teach_login.php");
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $questionID = $_GET["questionID"];
    $grade = $_POST["grade"];
    $subjectName = $_POST["subject"];
    $questionTitle = $_POST["question"];
    $option1 = $_POST["option1"];
    $option2 = $_POST["option2"];
    $option3 = $_POST["option3"];
    $option4 = $_POST["option4"];
    $correctOption = $_POST["correctOption"];
    $sqlQuery = <<<Query
    UPDATE `entrance_ms`.`question_bank` SET 
    `Question_ID`='$questionID',
    `Subject_Name`='$subjectName',
    `Grade`='$grade',
    `Question_Title`='$questionTitle',
    `Option_1`='$option1',
    `Option_2`='$option2',
    `Option_3`='$option3',
    `Option_4`='$option4',
    `Correct_Option`=$correctOption
    WHERE `Question_ID` = '$questionID';
    Query;
    $queryResult = $mysqlConnection->query($sqlQuery);
    if($queryResult) {
        header("Location:../questionView.php?editSuccess=true");
    }
    else {
        header("Location:../questionView.php?editSuccess=false");

    }
}
?>