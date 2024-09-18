<?php
include "../../database/connectdb.php";
include "../../session_handler.php";
if(!isAdminLoggedIn()) {
    header("Location:../teach_login.php");
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["questionID"])) {
    $sqlQuery = <<<sqlQuery
    DELETE FROM `question_bank` WHERE `Question_ID` = {$_GET["questionID"]};
    sqlQuery;
    $queryResult = $mysqlConnection->query($sqlQuery);
    if($queryResult) {
        header("Location:../questionView.php?deleteSuccess=true");
    }
    else {
        header("Location:../questionView.php?deleteSuccess=false");

    }
}
?>