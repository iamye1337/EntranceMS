<?php
include "../session_handler.php";

if (isAdminLoggedIn()) {
    header("Location:teach_home.php");
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
    <title>Teacher Login</title>
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
                        <p>Adarsha Saula Yubak Secondary School <br> This is Teacher's Login Portal</p>
                    </div>
                    <div class="input-group mb-3">
                        <input id="teach_pass" name="teach_pass" autofocus type="text" class="form-control form-control-lg bg-light fs-6"
                            placeholder="Enter Password">
                    </div>
                    <div class="input-group mb-3">
                        <button id="submit" type="submit" name="submit" class="btn btn-lg w-100 fs-6" style="background-color: rgb(192, 47, 47); color: white;">Login</button>
                    </div>

                    <!-- TEACHER LOGIN CHECK LOGIC -->

                    <div class="forgot">
                        <small><a href="#">Problem Logging in?</a></small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
<script>
    const button = document.getElementById("submit");
    let teach_pass = document.getElementById("teach_pass");
    button.addEventListener('click', function() {
        // let data = new FormData();
        // data.append("password", "ok");
        // let xhttp = new XMLHttpRequest();
        // xhttp.onreadystatechange = function() {
        //     if (this.readyState == 4 && this.status == 200) {
        //         console.log(xhttp);

        //     }
        // };
        // xhttp.open("POST", "handlers/_loginHandler.php", true);
        // xhttp.setRequestHeader("Content-type", "application/json");
        // xhttp.send(data);
        let data = new FormData();
        data.append("password", teach_pass.value);
        fetch("handlers/_loginHandler.php", {
                method: 'POST',
                body: data
            })
            .then(function(response) {
                return response.text();
            })
            .then(function(data) {
                data = JSON.parse(data);
                if (data.status == "success") {
                    window.location.reload();
                }
            });
    });
</script>

</html>