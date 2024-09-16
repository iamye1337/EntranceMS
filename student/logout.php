<?php
session_start();
session_destroy(); // Destroys all session data
header("Location: login.html"); // Redirects the user to the login page (or wherever you want)
exit();
?>
