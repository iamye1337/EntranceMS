<?php
include "../session_handler.php";

if (!isLoggedIn()) {
    header("Location:login.php");
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
    <title><?= $_SESSION["userName"] ?>'s Profile </title>
</head>

<body>
    <!----------------------- Main Container -------------------------->
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <!----------------------- Question Container -------------------------->
        <div id="profile-container" class="border rounded-5 p-4 bg-white shadow box-area text-nowrap">
            <!--------------------------- Top Box (profilepicL, NameR) ----------------------------->
            <div class="row">
                <div class="col d-flex justify-content-center">
                    <img src="../images/profpic.png" class="img-fluid" style="max-height: 140px;">
                </div>
                <div class="col p-5 big-text">
                    <p>
                    <?= $_SESSION["userName"]; ?>
                    </p>
                </div>
            </div>
            <!--------------------------- Middle Boxes (Credentials) (*maybe make boxes around them)----------------------------->
            <div class="d-flex mb-3">
                <div class="col me-3">
                    <div class="d-flex">
                        <p class="fw-medium p-2">Father's Name:</p>
                        <p class="p-2">
                        <?= $_SESSION["userFatherName"]; ?>
                        </p>
                    </div>
                    <div class="d-flex">
                        <p class="fw-medium p-2">Mother's Name:</p>
                        <p class="p-2">
                        <?= $_SESSION["userMotherName"]; ?>
                        </p>
                    </div>
                    <div class="d-flex">
                        <p class="fw-medium p-2">Contact Number:</p>
                        <p class="p-2">
                        <?= $_SESSION["userContactNumber"]; ?>
                        </p>
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex">
                        <p class="fw-medium p-2">Date of Birth:</p>
                        <p class="p-2">
                        <?= $_SESSION["userDateOfBirth"]; ?>
                        </p>
                    </div>
                    <div class="d-flex">
                        <p class="fw-medium p-2">Address:</p>
                        <p class="p-2">
                        <?= $_SESSION["userAddress"]; ?>
                        </p>
                    </div>
                </div>
            </div>
            <!-- take exam button -->
            <div class="input-group">
                <a href="completionStatus.php" class="w-100" type="submit"><button
                        class="btn btn-lg btn-primary w-100">Take the Test</button></a>
            </div>
        </div>
    </div>
    </div>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<html lang="en">

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
        #display-container {
            width: 500px;
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

</html>