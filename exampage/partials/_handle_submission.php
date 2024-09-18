<?php
include "../../database/connectdb.php";
include "../../session_handler.php";

if(!isLoggedIn()) {
    header("Location:../../student/login.php");
}
if(isset($_POST)){
    $data=file_get_contents("php://input"); // json string
    $resultData=json_decode($data,true); // return a php array
    $marks= $resultData['marks'];
    $symbolNumber = $_SESSION["symbolNumber"];
    $sqlQuery = <<<sqlQuery
    UPDATE `examinee_info` SET `Result` = '$marks', `Exam_Completion_Status` = 1 WHERE `Symbol_Number` = '$symbolNumber' ";
    sqlQuery;
    $queryResult = $mysqlConnection->query($sqlQuery);

    if ($queryResult) {
        $_SESSION["userExamCompletionStatus"] = true;
    }
    echo $marks; 
}
