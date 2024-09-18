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
        <p class="fs-1 fw-medium text-light">Adarsha Saula Yubak Secondary School</p>
    </div>

    <!-- action bar -->
    <div class="d-flex justify-content-between p-2 mb-5" style="background-color: white;">
        <!-- logo -->
        <img src="../images/adarshaLogo.png" style="height: 70px;" alt="">

        <!-- action button -->
        <div class="input-group justify-content-end d-flex">
            <?php
            if (!(isset($_SESSION["userExamCompletionStatus"]) && $_SESSION["userExamCompletionStatus"] == true)) {
                echo <<<TakeTheTest
                <a href="../exampage/exam.php" class="pe-3 align-self-center" type="submit"><button
                class="ps-5 pe-5 btn btn-lg btn-primary">Take the Test</button></a>
                TakeTheTest;
            }
            ?>

            <a class="pe-3 align-self-center" href="resultView.php"><button class="ps-5 pe-5 btn btn-lg btn-primary"
                    id="viewResult">View Result</button></a>

            <form action="logout.php" method="POST" class="pe-3 align-self-center">
                <button type="submit" class="ps-5 pe-5 btn btn-lg btn-danger">Logout</button>
            </form>

        </div>
    </div>

    <div class="row row-cols-2 equal-height-row ps-1 pe-1 justify-content-between mx-3">
        <!----------------------- Main Container -------------------------->
        <div class=" p-1 pe-1 pt-1 col roundedd-flex flex-column justify-content-between responsive p-1">
            <!----------------------- Container -------------------------->
            <div id="profile-container" class="col col border rounded-5 p-3 pb-1 bg-white shadow box-area text-nowrap">
                <!--------------------------- Top Box (profilepicL, NameR) ----------------------------->
                <div class="d-flex">
                    <div class="">
                        <img src="../images/profpic.png" class="img-fluid" style="max-height: 140px;">
                    </div>
                    <div class="flex-grow-1 big-text align-self-center">
                        <p>
                            <?= $_SESSION["userName"]; ?>
                        </p>
                    </div>
                </div>
                <!--------------------------- Middle Boxes (Credentials) ----------------------------->
                <div class="row row-cols-1 fs-5 responsive" style="font-size: xx-small;">
                    <div class="col d-flex">
                        <p class="fw-medium p-1">Father's Name:</p>
                        <p class="p-1">
                            <?= $_SESSION["userFatherName"]; ?>
                        </p>
                    </div>
                    <div class="col d-flex">
                        <p class="fw-medium p-1">Mother's Name:</p>
                        <p class="p-1">
                            <?= $_SESSION["userMotherName"]; ?>
                        </p>
                    </div>
                    <div class="col d-flex">
                        <p class="fw-medium p-1">Contact Number:</p>
                        <p class="p-1">
                            <?= $_SESSION["userContactNumber"]; ?>
                        </p>
                    </div>
                    <div class="col d-flex">
                        <p class="fw-medium p-1">Date of Birth:</p>
                        <p class="p-1">
                            <?= $_SESSION["userDateOfBirth"]; ?>
                        </p>
                    </div>
                    <div class="col d-flex">
                        <p class="fw-medium p-1">Address:</p>
                        <p class="p-1">
                            <?= $_SESSION["userAddress"]; ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
            <!----------------------- Rules Container -------------------------->

            <div class="responsive p-1 ps-1 pt-1  col rounded d-flex flex-column justify-content-between">
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

    </div>
    </div>
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
