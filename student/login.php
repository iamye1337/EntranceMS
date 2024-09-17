<?php
include "../database/connectdb.php";
include "../session_handler.php";

if (isLoggedIn()) {
    header("Location:profile.php");
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["symbolNumber"])) {
    $sqlQuery = "SELECT * FROM `examinee_info` WHERE `Symbol_Number` = '{$_POST["symbolNumber"]}'";
    $queryResult = $mysqlConnection->query($sqlQuery);

    if ($queryResult->num_rows > 0) {
        //store user data into session
        $queryData = $queryResult->fetch_assoc();
        $_SESSION["userName"] = $queryData["Name"];
        $_SESSION["symbolNumber"] = $queryData["Symbol_Number"];
        $_SESSION["grade"] = $queryData["Grade"];
        $_SESSION["userFatherName"]   = $queryData["Fathers_Name"];
        $_SESSION["userMotherName"] = $queryData["Mothers_Name"];
        $_SESSION["userDateOfBirth"] = $queryData["Date_of_Birth"];
        $_SESSION["userAddress"] = $queryData["Address"];
        $_SESSION["userContactNumber"] = $queryData["Contact_Number"];
        $_SESSION["userExamCompletionStatus"] = $queryData["Exam_Completion_Status"];
        $_SESSION["testTakenDate"] = $queryData["Examination_Date"];
        $_SESSION["marksObtained"] = $queryData["Result"];
        $_SESSION["isLoggedIn"] = true;

        //close database session
        $mysqlConnection->close();

        header("Location: profile.php");
    } else {
        echo <<<Javascript
        <script>
            alert("Login Failed. Symbol Number not registered")
        </script>';
        Javascript;
    }
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
    <title>Login</title>
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
    </div>

    <!----------------------- Main Container -------------------------->
    <div class="container d-flex justify-content-center align-items-center pt-5">

        <!----------------------- Login Container -------------------------->
        <div class="row border rounded-5 p-3 bg-white shadow box-area">
            <!--------------------------- Left Box (image) ----------------------------->
            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box"
                style="background: #103cbe;">
                <div class="featured-image mb-3">
                    <img src="../images/1.png" class="img-fluid" style="width: 250px" alt="">
                </div>
                <p class="text-white fs-2" style="font-weight: 500;">Entrance Examination</p>
            </div>

            <!-------------------- ------ Right Box (form) ---------------------------->
            <div class="col-md-6 right-box">
                <div class="row align-items-center">
                    <div class="header-text mb-2">
                        <h2>Welcome</h2>
                        <p>Adarsha Saula Yubak Secondary School</p>
                    </div>
                    <form action="<?= htmlentities($_SERVER['PHP_SELF']); ?>" onsubmit="return isvalid()" method="post">
                        <div class="input-group mb-3">
                            <input id="symbolNo" name="symbolNumber" autofocus type="text"
                                class="form-control form-control-lg bg-light fs-6" placeholder="Symbol Number">
                        </div>
                        <div class="input-group mb-3">
                            <button type="submit" name="submit" class="btn btn-lg btn-primary w-100 fs-6">Login</button>
                        </div>
                    </form>
                    <script>
                        function isvalid() {
                            var symbol = document.getElementById(symbolNo).value;
                            if (symbol.length == "") {
                                alert("Symbol number cannot be empty!");
                                return false;
                            }

                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>