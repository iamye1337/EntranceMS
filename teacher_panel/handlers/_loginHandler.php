<?php
include "../../session_handler.php";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["password"])) {
    if ($_POST["password"] == "teacher@123") {
        $_SESSION["isAdminLoggedIn"] = true;
        $result = [
            "status" => "success"
        ];
        echo json_encode($result);
    }
    else {
        echo json_encode(
            ["status" => "fail"]
        );
    }
}
