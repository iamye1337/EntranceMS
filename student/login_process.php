<?php

session_start();

include"../database/connectdb.php";

//process starts
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $symbol = $_POST['symbolNo'];
    // SQL query to check if the symbol number exists in the database

    $sql = "SELECT * FROM stuInfo WHERE Symbol_No = '$symbol'";
    $result = $conn->query($sql);


    if ($result->num_rows > 0) {
            $_SESSION['symbolNo'] = $symbol;
            //when login is succesfull it takes you to the profile page 
            header(header: "Location: profile.php");
            exit();

    } else {
        // Symbol number does not exist
        echo '<script>
            window.location.href = "login.html";
            alert("Login Failed. Symbol Number not registered")
        </script>';
    }
}
?>