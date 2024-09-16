<?php
include"../database/connectdb.php";

//process starts
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $symbol = $_POST['symbolNo'];
    // SQL query to check if the symbol number exists in the database
    $sql = "SELECT * FROM stuInfo WHERE Symbol_No = $symbol";
    $result = $conn->query($sql);
    // $completionStatus = $conn->query($sql2);


    if ($result->num_rows > 0) {
        // if ($completionStatus == 0) {
            // User exists, login success
            $_SESSION['symbolNo'] = $symbol;
            //when login is succesfull it takes you to the profile page 
            header(header: "Location: profile.php");
            exit();
        // }

    } else {
        // Symbol number does not exist
        echo '<script>
            window.location.href = "login.html";
            alert("Login Failed. Symbol Number not registered")
        </script>';
    }

    //     //In Attempt to relogging in using the same symbol number
//     $sql = "SELECT completion_status FROM stuLogin WHERE Symbol_No = '$symbol'";


    //     if ($completionStatus == 1) {
//         // User has already taken the exam
//         header("Location: login.html");
//         exit();
//     } else {
//         // Allow login and proceed to exam
//         // ...
//         $_SESSION['symbolNo'] = $symbol;
//         //when login is succesfull it takes you to the profile page 
//         header("Location: profile.php");
//         exit();

    //     }
}

$conn->close();
