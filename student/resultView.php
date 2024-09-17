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
    <title><?= $_SESSION["userName"] ?>'s Result </title>
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
            <form action="logout.php" method="POST" class="pe-3 align-self-center">
                <button type="submit" class="ps-5 pe-5 btn btn-lg btn-danger fs-6">Logout</button>
            </form>
        </div>
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
                    <img src="../images/profpic.png" class="img-fluid" style="max-height: 140px;">
                </div>
                <div class="col row">
                    <div class="col pt-3 ps-5 pe-5 big-text">
                        <p><?= $_SESSION["userName"] ?></p>
                    </div>
                    <div class="col ps-5">
                        <p>
                            Father's Name: <?= $_SESSION["userFatherName"] ?> &emsp;
                            Contact Number: <?= $_SESSION["userContactNumber"] ?> &emsp;
                            Address: <?= $_SESSION["userAddress"] ?>
                        </p>
                    </div>
                </div>
            </div>
            <!-- Top Name section end -->

            <!-- Dynamic Progress Bar -->
            <div class="row-auto g-1 rounded-5 mt-5">
                <div class="progress">
                    <div class="progress-bar" id="dynaProgressBar" role="progressbar" aria-valuenow="<?= $_SESSION["marksObtained"] ?>"
                        aria-valuemin="0" aria-valuemax="100" style="width: <?= $_SESSION["marksObtained"] ?>%;">
                        <?= $_SESSION["marksObtained"] ?> marks
                    </div>
                </div>
            </div>

            <!-- test date bar -->
            <div class="row pt-5">
                <p>Test Taken Date: <?= $_SESSION["testTakenDate"] ?></p>
            </div>
            <!-- test date bar end -->

            <!-- Score bar -->
            <div class="border rounded-5 p-4 bg-white shadow box-area text-nowrap">
                <div class="row">
                    <div class="col">
                        <p>Total Score:</p>
                        <p class="fs-2"><?= $_SESSION["marksObtained"] ?> out of 100</p>
                    </div>
                    <div class="col">
                        <p>Result:</p>
                        <p id="resultPill" class="fs-2 w-30 d-inline-flex ps-3 pe-3 rounded-3 text-white">Passed</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        let resultPill = document.getElementById('resultPill');
        let dynaProgressBar = document.getElementById('dynaProgressBar');
        let marks = Number(<?php echo $_SESSION["marksObtained"]; ?>);
        if (marks <= 50 && marks >= 0){
            resultPill.textContent = "Failed";
            resultPill.classList.add("bg-danger");
            dynaProgressBar.classList.add("bg-danger");
        }
        else if (marks >= 50 && marks <= 100){ 
            resultPill.classList.add("bg-success")
            dynaProgressBar.classList.add("bg-success");
        }

        // THIS ELSE FUNCTION IS NOT WORKING!!!
        else
            window.onbeforeunload = function () {
            return "Error! Please contact the administrator";
    };
    </script>
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>