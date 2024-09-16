<?php
session_start();

function isLoggedIn () {
    if (isset($_SESSION["isLoggedIn"]) && $_SESSION["isLoggedIn"] == true) {
        return true;
    }
    return false;
}