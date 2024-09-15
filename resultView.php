<?php
session_start();
include"database/connectdb.php";

//query that fetches datas from table
$sql = "SELECT * FROM stuLogin";

//execute query
$result = $conn->query(query: $sql);

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
    $date = $row["examDate"];
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
    <title><?php echo $name; ?>'s Result </title>
</head>

<body>
    <!-- title bar -->
    <div class="d-flex p-2 justify-content-center align-items-center" style="background-color: #002561;">
        <p class="fs-1 fw-medium text-light">Adarsha Saula Yubak Secondary School</p>
    </div>

    <!-- action bar -->
    <div class="d-flex justify-content-between p-2 mb-5" style="background-color: white;">
        <!-- logo -->
        <img src="images/asarshaLogo.png" style="height: 70px;" alt="">
    </div>
    <!-- title bar end -->

    <!----------------------- Main Container -------------------------->
    <div class="container d-flex justify-content-center align-items-center">
        <!----------------------- Visible Container -------------------------->
        <div class="border rounded-5 p-4 ps-5 pe-5 bg-white shadow box-area text-nowrap">
            <!--------------------------- Top Box (profilepicL, NameR) ----------------------------->

            <!-- Top name section -->
            <div class="row">
                <div class="col d-flex justify-content-center">
                    <img src="images/profpic.png" class="img-fluid" style="max-height: 140px;">
                </div>
                <div class="col row">
                    <div class="col pt-3 ps-5 pe-5 big-text">
                        <p><?php echo $name; ?></p>
                    </div>
                    <div class="col ps-5">
                        <p>
                            Father's Name: <?php echo $fName; ?> &emsp;
                            Contact Number: <?php echo $contactNo; ?> &emsp;
                            Address: <?php echo $address; ?>
                        </p>
                    </div>
                </div>
            </div>
            <!-- Top Name section end -->

            <div class="row-auto g-1 rounded-5 mt-5" style="background-color: green;">&ensp;</div>

            <!-- test date bar -->
            <div class="row pt-5">
                <p>Test Date: <?php echo $date; ?></p>
            </div>
            <!-- test date bar end -->

            <!-- Score bar -->
            <div class="border rounded-5 p-4 bg-white shadow box-area text-nowrap">
                <div class="row">
                    <div class="col">
                        <p>Total Score:</p>
                        <p class="fs-2">59 out of 100</p>
                    </div>
                    <div class="col">
                        <p>Result:</p>
                        <p class="fs-2 w-30 d-inline-flex ps-3 pe-3 rounded-3" style="background-color: green; color: white;">Passed</p>
                    </div>
                </div>
            </div>


            <!--------------------------- Middle Boxes (Credentials) (*maybe make boxes around them)----------------------------->



        </div>
    </div>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>