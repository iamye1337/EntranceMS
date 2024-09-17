<?php
include "../session_handler.php";
include "../database/connectdb.php";

//query that fetches datas from table
$symbol = $_SESSION['symbolNo'];
$sql = "SELECT * FROM stuInfo WHERE Symbol_No = '$symbol'";

//execute query
$result = $conn->query(query: $sql);

//fetch data
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Store user data in variables
    $name = $row["Name"];
    $fName = $row["Fathers_Name"];
    $contactNo = $row["Contact_No"];
    $date = $row["examDate"];
    $address = $row["Address"];
    $obtMarks = $row["result"];
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
        <img src="../images/adarshaLogo.png" style="height: 70px;" alt="">
        <form action="logout.php" method="POST" class="d-inline">
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>

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

            <!-- Dynamic Progress Bar -->
            <div class="row-auto g-1 rounded-5 mt-5">
                <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="<?php echo $obtMarks; ?>"
                        aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $obtMarks; ?>%;">
                        <?php echo $obtMarks; ?> marks
                    </div>
                </div>
            </div>

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
                        <p class="fs-2"><?php echo $obtMarks ?> out of 100</p>
                    </div>
                    <div class="col">
                        <p>Result:</p>
                        <p class="fs-2 w-30 d-inline-flex ps-3 pe-3 rounded-3"
                            style="background-color: green; color: white;">Passed</p>
                    </div>
                </div>
            </div>


            <!--------------------------- Middle Boxes (Credentials) (*maybe make boxes around them)----------------------------->



        </div>
    </div>
    <!-- <script>
        function updateProgressBar(progress) {
            const progressBar = document.querySelector('.progress-Bar');
            progressBar.style.width = progress
                + '%';
        }

        // Fetch the initial progress value
        fetch('progressbar.php')
            .then(response => response.json())
            .then(data => {
                updateProgressBar(data.progress);
            })
        // .catch(error => console.error('Error:', error));


    </script> -->
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>