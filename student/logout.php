<?php
include "../session_handler.php";
session_destroy();
header("Location:login.php");
?>