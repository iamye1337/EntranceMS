<?php
include "database/connectdb.php";
include "session_handler.php";
if (isLoggedIn()) {
    header("Location:student/profile.php");
} else {
    header("Location:student/login.php");
}
?>