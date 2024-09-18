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
    <!-- title bar -->
    <div class="d-flex p-2 justify-content-center align-items-center" style="background-color: #002561;">
        <h1 class="fs-3 fw-normal text-light">Adarsha Saula Yubak Secondary School</h1>
    </div>

    <!-- action bar -->
    <div class="d-flex justify-content-between p-2 mb-5" style="background-color: white;">
        <!-- logo -->
        <img src="../images/adarshaLogo.png" style="height: 40px;" alt="">

        <!-- action button -->
        <div class="input-group justify-content-end d-flex">
<<<<<<< HEAD
            <a href="../exampage/exam.php" class="pe-3 align-self-center" type="submit"><button
                    class="ps-5 pe-5 btn btn-lg btn-primary fs-6">Take the Test</button></a>
=======
            <?php
            if (!(isset($_SESSION["userExamCompletionStatus"]) && $_SESSION["userExamCompletionStatus"] == true)) {
                echo <<<TakeTheTest
                <a href="../exampage/exam.php" class="pe-3 align-self-center" type="submit"><button
                class="ps-5 pe-5 btn btn-lg btn-primary">Take the Test</button></a>
                TakeTheTest;
            }
            ?>
>>>>>>> 65462271d78763c7745bdfc86f89b46ed0ec86ff

            <a class="pe-3 align-self-center" href="resultView.php"><button class="ps-5 pe-5 btn btn-lg btn-primary fs-6"
                    id="viewResult">View Result</button></a>

            <form action="logout.php" method="POST" class="pe-3 align-self-center">
                <button type="submit" class="ps-4 pe-4 btn btn-lg btn-danger fs-6">Logout</button>
            </form>

        </div>
    </div>

    <div class="row row-cols-1 row-cols-md-2 g-4 ps-5 me-4 justify-content-center">
        <!-- Profile Container -->
        <div class="col-md-6 d-flex flex-column justify-content-between">
            <div id="profile-container" class="border rounded-5 p-4 bg-white shadow-sm text-nowrap">
                <!-- Profile Picture and Name -->
                <div class="row align-items-center">
                    <div class="col-4">
                        <img src="../images/profpic.png" class="img-fluid rounded-circle" style="max-height: 140px;" alt="Profile Picture">
                    </div>
                    <div class="col-8 text-start fw-bold fs-4">
                        <p><?= $_SESSION["userName"]; ?></p>
                    </div>
                </div>

                <!-- User Information -->
                <div class="mt-4">
                    <p><strong>Father's Name:</strong> <?= $_SESSION["userFatherName"]; ?></p>
                    <p><strong>Mother's Name:</strong> <?= $_SESSION["userMotherName"]; ?></p>
                    <p><strong>Contact Number:</strong> <?= $_SESSION["userContactNumber"]; ?></p>
                    <p><strong>Date of Birth:</strong> <?= $_SESSION["userDateOfBirth"]; ?></p>
                    <p><strong>Address:</strong> <?= $_SESSION["userAddress"]; ?></p>
                </div>
            </div>
        </div>
<<<<<<< HEAD

        <!-- Rules Container -->
        <div class="col-md-6 d-flex flex-column justify-content-between">
            <div class="border rounded-5 p-4 bg-white shadow-sm">
                <p class="fs-3 fw-bold" style="color:#002561">Rules for Online Examination</p>
                <ul class="fs-6">
                    <li><strong>Time Limit:</strong> 2 hours</li>
                    <li><strong>Total Number of Questions:</strong> 100</li>
                    <li><strong>Exam Rules:</strong></li>
                    <ol class="ms-1">
=======
        <!----------------------- Rules Container -------------------------->

        <div class="p-5 ps-3 pt-1  col-md-4 rounded d-flex flex-column justify-content-between">
            <div class="border rounded-5 p-4 bg-white shadow box-area">
                <p class="fs-2">Rules for Online Examination</p>
                <ul class="fs-5">
                    <li><strong>Time Limit:</strong> 2 hours</li>
                    <li><strong>Total Number of Questions:</strong> 100</li>
                    <li><strong>Exam Rules:</strong></li>
                    <ol type="1">
>>>>>>> 65462271d78763c7745bdfc86f89b46ed0ec86ff
                        <li>Ensure you have a stable internet connection.</li>
                        <li>Do not navigate away from the exam page.</li>
                        <li>Read each question carefully before answering.</li>
                        <li>Manage your time effectively to complete all questions.</li>
<<<<<<< HEAD
                        <li>Do not refresh or close the exam window.</li>
                        <li>Use of unauthorized materials is prohibited.</li>
                        <li>Contact support if you encounter any issues during the exam.</li>
                    </ol>
=======
                        <li>Do not refresh or Close the exam window.</li>
                        <li>Use of unauthorized materials is prohibited.</li>
                        <li>Contact support if you encounter any issues during the exam.</li>

                </ul>
>>>>>>> 65462271d78763c7745bdfc86f89b46ed0ec86ff
                </ul>
            </div>
        </div>

<<<<<<< HEAD
=======
    </div>
>>>>>>> 65462271d78763c7745bdfc86f89b46ed0ec86ff
    </div>


</body>
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../bootstrap/js/bootstrap.bundle.min.js"></script>

</html>