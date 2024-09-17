<?php
include("../database/connectdb.php");
include("../student/login_process.php");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$symbol = $_SESSION['symbolNo'];
//query that fetches datas from table
$sql = "SELECT * FROM stuInfo WHERE Symbol_No = '$symbol'";

//execute query
$result = $conn->query($sql);

//fetch data
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Store user data in variables
    $name = $row["Name"];
    $fName = $row["Fathers_Name"];
    $mName = $row["Mothers_name"];
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
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
    <title>
        <?php echo $name; ?>'s Profile
    </title>
</head>

<body>
    <!-- title bar -->
    <div class="d-flex p-2 justify-content-center align-items-center" style="background-color: #002561;">
        <p class="fs-1 fw-medium text-light">Adarsha Saula Yubak Secondary School</p>
    </div>

    <!-- action bar -->
    <div class="d-flex justify-content-between p-2 mb-5" style="background-color: white;">
        <!-- logo -->
        <img src="../images/adarshaLogo.png" style="height: 70px;" alt="">

        <!-- action button -->
        <div class="input-group justify-content-end d-flex">
            <a href="completionStatus.php" class="pe-3 align-self-center" type="submit"><button
                    class="ps-5 pe-5 btn btn-lg btn-primary">Take the Test</button></a>

            <a class="pe-3 align-self-center" href="resultView.php"><button class="ps-5 pe-5 btn btn-lg btn-primary"
                    id="viewResult">View Result</button></a>

            <form action="logout.php" method="POST" class="pe-3 align-self-center">
                <button type="submit" class="ps-5 pe-5 btn btn-lg btn-danger">Logout</button>
            </form>

        </div>
    </div>
    </div>

    <div class="row row-cols-2 equal-height-row d-flex flex-wrap ps-5 pe-5 justify-content-center">
        <!----------------------- Main Container -------------------------->
        <div class="p-5 pe-3 pt-1 col-md-4 roundedd-flex flex-column justify-content-between">
            <!----------------------- Container -------------------------->
            <div class="col col border rounded-5 p-4 pb-1 bg-white shadow box-area text-nowrap">
                <!--------------------------- Top Box (profilepicL, NameR) ----------------------------->
                <div class="row d-flex">
                    <div class="col  justify-content-start">
                        <img src="../images/profpic.png" class="img-fluid" style="max-height: 140px;">
                    </div>
                    <div class="col p-5 ps-1 big-text">
                        <p>
                            <?php echo $name; ?>
                        </p>
                    </div>
                </div>
                <!--------------------------- Middle Boxes (Credentials) (*maybe make boxes around them)----------------------------->
                <div class="row row-cols-1 fs-5">
                    <div class="col d-flex">
                        <p class="fw-medium p-1">Father's Name:</p>
                        <p class="p-1">
                            <?php echo $fName; ?>
                        </p>
                    </div>
                    <div class="col d-flex">
                        <p class="fw-medium p-1">Mother's Name:</p>
                        <p class="p-1">
                            <?php echo $mName; ?>
                        </p>
                    </div>
                    <div class="col d-flex">
                        <p class="fw-medium p-1">Contact Number:</p>
                        <p class="p-1">
                            <?php echo $contactNo; ?>
                        </p>
                    </div>
                    <div class="col d-flex">
                        <p class="fw-medium p-1">Date of Birth:</p>
                        <p class="p-1">
                            <?php echo $doB; ?>
                        </p>
                    </div>
                    <div class="col d-flex">
                        <p class="fw-medium p-1">Address:</p>
                        <p class="p-1">
                            <?php echo $address; ?>
                        </p>
                    </div>
                </div>
            </div>

        </div>
        <!----------------------- Rules Container -------------------------->

        <div class="p-5 ps-3 pt-1  col-md-4 rounded d-flex flex-column justify-content-between">
            <div class="border rounded-5 p-4 bg-white shadow box-area">
                <p class="fs-2">Rules for Online Examination</p>
                <ul class="fs-5">
                    <li><strong>Time Limit:</strong> 2 hours</li>
                    <li><strong>Total Number of Questions:</strong> 100</li>
                    <li><strong>Exam Rules:</strong></li>
                    <ol type="1">
                        <li>Ensure you have a stable internet connection.</li>
                        <li>Do not navigate away from the exam page.</li>
                        <li>Read each question carefully before answering.</li>
                        <li>Manage your time effectively to complete all questions.</li>
                        <li>Do not refresh or Close the exam window.</li>
                        <li>Use of unauthorized materials is prohibited.</li>
                        <li>Contact support if you encounter any issues during the exam.</li>

                </ul>
                </ul>
            </div>
        </div>
    </div>
</body>
<script src="../bootstrap/js/bootstrap.bundle.min.js"></script>

</html>

<!-- <html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
        }

        .sidebar {
            width: 250px;
            padding: 20px;
            background-color: #f4f4f4;
            border-right: 1px solid #ddd;
        }

        .sidebar h2 {
            margin-top: 0;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar li {
            margin-bottom: 10px;
        }

        .sidebar ul ul {
            margin-left: 20px;
        }

        .main-content {
            flex: 1;
            padding: 20px;
        }
    </style>
</head>

<body>
    <aside class="sidebar">
        <h2>Online Examination </h2>
        <ul>
            <li><strong>Time Limit:</strong> 2 hours</li>
            <li><strong>Total Number of Questions:</strong> 100</li>
            <li><strong>Exam Rules:</strong></li>
            <ul>
                <li>Rule No 1:Ensure you have a stable internet connection.</li>
                <li>Rule No 2:Do not navigate away from the exam page.</li>
                <li>Rule No 3:Read each question carefully before answering.</li>
                <li>Rule No 4:Manage your time effectively to complete all questions.</li>
                <li>Rule No 5:Do not refresh or Close the exam window.</li>
                <li>Rule No 6:No unauthorized materials.</li>
                <li>Rule No 7:Contact support if you encounter any issues during the exam.</li>

            </ul>
        </ul>
    </aside>
</body>

</html> -->