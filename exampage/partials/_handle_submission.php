<?php
include "../../database/connectdb.php";
include "../../session_handler.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// session_start();
if(isset($_POST)){
    $data=file_get_contents("php://input"); // json string
    $resultData=json_decode($data,true); // return a php array
    $marks= $resultData['marks'];
    $symbol = $_SESSION["symbolNumber"];

    $sql = "UPDATE `examinee_info` SET `Result` = '$marks' WHERE `Symbol_Number` = '$symbol' ";

    $result = $mysqlConnection->query(query: $sql);  
    echo $marks; 
}
