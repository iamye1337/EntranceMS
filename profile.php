<?php
session_start();
include("database/connectdb.php");

//query that fetches datas from table
$sql = "SELECT * FROM student";

//execute query
$result = $conn->query($sql);

//fetch data
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Store user data in variables
    $name = $row["Name"];
    $fName = $row["Fathers_Name"];
    $mName = $row["Mothers_Name"];
    $doB = $row["Date_of_Birth"];
    $address = $row["Address"];
    $contactNo = $row["Contact_No"];
} else {
    echo "User not found.";
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title><?php echo $name; ?>'s Profile </title>
</head>

<body>
    <!----------------------- Main Container -------------------------->
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <!----------------------- Question Container -------------------------->
        <div class="border rounded-5 p-4 bg-white shadow box-area text-nowrap">
            <!--------------------------- Top Box (profilepicL, NameR) ----------------------------->
            <div class="row">
                <div class="col d-flex justify-content-center">
                    <img src="images/profpic.png" class="img-fluid" style="max-height: 140px;">
                </div>
                <div class="col p-5 big-text">
                    <p><?php echo $name; ?></p>
                </div>
            </div>
            <!--------------------------- Middle Boxes (Credentials) (*maybe make boxes around them)----------------------------->
            <div class="d-flex mb-3">
                <div class="col me-3">
                    <div class="d-flex">
                        <p class="fw-medium p-2">Father's Name:</p>
                        <p class="p-2"><?php echo $fName; ?></p>
                    </div>
                    <div class="d-flex">
                        <p class="fw-medium p-2">Mother's Name:</p>
                        <p class="p-2"><?php echo $mName; ?></p>
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex">
                        <p class="fw-medium p-2">Date of Birth:</p>
                        <p class="p-2"><?php echo $doB; ?></p>
                    </div>
                    <div class="d-flex">
                        <p class="fw-medium p-2">Address:</p>
                        <p class="p-2"><?php echo $address; ?></p>
                    </div>
                    <div class="d-flex">
                        <p class="fw-medium p-2">Contact Number:</p>
                        <p class="p-2"><?php echo $contactNo; ?></p>
                    </div>
                </div>
            </div>
            <!-- take exam button -->
            <div class="input-group">
                <a href="exam.html" class="w-100"><button class="btn btn-lg btn-primary w-100">Take the
                        Test</button></a>
            </div>
        </div>
    </div>
    </div>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
