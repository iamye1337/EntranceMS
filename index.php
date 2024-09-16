<?php
include "database/connectdb.php";
session_start();
if (isset($_SESSION["isLoggedIn"]) && $_SESSION["isLoggedIn"] == true) {
    //check session values
}

?>