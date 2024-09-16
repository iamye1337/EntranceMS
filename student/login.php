<?php
include "/database/connectdb.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $symbolNumber = $_POST['symbolNo'];
    $sql1 = "SELECT * FROM stuInfo WHERE Symbol_No = '$symbolNumber'";
    $result = $conn->query($sql1);


    if ($result->num_rows > 0) {
        $_SESSION['symbolNo'] = $symbol;
        header(header: "Location: profile.php");
        exit();
    } else {
        echo '<script>
            window.location.href = "login.html";
            alert("Login Failed. Symbol Number not registered")
        </script>';
    }
}

$conn->close();
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

    <!----------------------- Main Container -------------------------->

    <div class="container d-flex justify-content-center align-items-center min-vh-100">

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