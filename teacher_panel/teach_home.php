<?php
// Database connection
include("../database/connectdb.php");
include "../session_handler.php";

if(!isAdminLoggedIn()) {
    header("Location:teach_login.php");
}


$sqlQuery = "SELECT * FROM `examinee_info`";
$queryResult = $mysqlConnection->query($sqlQuery);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.6/css/dataTables.dataTables.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <title>HomePage</title>
</head>

<body>
    <!-- title bar -->
    <div class="d-flex p-2 justify-content-center align-items-center" style="background-color: #002561;">
        <h1 class="fs-3 fw-normal text-light">Adarsha Saula Yubak Secondary School</h1>
    </div>
    <nav class="navbar navbar-expand-lg bg-body-tertiary mb-5">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="../images/adarshaLogo.png" alt="Logo" width="auto" height="40px"
                    class="d-inline-block align-text-top"></a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active fs-6" aria-current="page" href="teach_home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-6" href="add_students.php">Add Students</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-6" href="add_questions.php">Add Questions</a>
                    </li>
                    <li class="nav-item">
<<<<<<< HEAD
                        <a class="nav-link fs-6" href="QnView.php">View Questions</a>
                    </li>
                </ul>

                <!-- Right-aligned Login Button -->
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="teach_login.php" type="button" class="btn btn-light">
                            <img src="../images/profpic.png" alt="" width="20"> Log Out
                        </a>
=======
                        <a class="nav-link fs-4" aria-disabled="true" href="questionView.php">View Questions</a>
>>>>>>> 65462271d78763c7745bdfc86f89b46ed0ec86ff
                    </li>
                </ul>
            </div>

        </div>
    </nav>

    <!----------------------- Main Container -------------------------->
    <div class="container d-flex justify-content-center align-items-center">

        <!----------------------- Container -------------------------->

        <div class="row box-container box-area ">

            <!-------------------------- (form) ---------------------------->
            <table id="questions" class="display table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Name</th>
                        <th>Symbol_No</th>
                        <th>Father's Name</th>
                        <th>Mother's Name</th>
                        <th>Date of Birth</th>
                        <th>Address</th>
                        <th>Contact No</th>
                        <th>Completion Status</th>
                        <th>Exam Date</th>
                        <th>Grade</th>
                        <th>Result</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    // Check if there are any results
                    if ($queryResult->num_rows > 0) {
                        // Output data for each row
                        while ($row = $queryResult->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["SN"] . "</td>";
                            echo "<td>" . $row["Name"] . "</td>";
                            echo "<td>" . $row["Symbol_Number"] . "</td>";
                            echo "<td>" . $row["Fathers_Name"] . "</td>";
                            echo "<td>" . $row["Mothers_Name"] . "</td>";
                            echo "<td>" . $row["Date_of_Birth"] . "</td>";
                            echo "<td>" . $row["Address"] . "</td>";
                            echo "<td>" . $row["Contact_Number"] . "</td>";
                            echo "<td>" . $row["Exam_Completion_Status"] . "</td>";
                            echo "<td>" . $row["Examination_Date"] . "</td>";
                            echo "<td>" . $row["Grade"] . "</td>";
                            echo "<td>" . $row["Result"] . "</td>";

                            echo "</tr>";
                        }
                    } else {
                        // If no records are found
                        echo "<tr><td colspan='4'>No records found</td></tr>";
                    }
                    // Close the database connection
                    $mysqlConnection->close();
                    ?>

                </tbody>

            </table>
        </div>

    </div>
    </div>
</body>
<script defer src="../bootstrap/js/bootstrap.bundle.min.js"></script>
<script defer src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script defer src="https://cdn.datatables.net/2.1.6/js/dataTables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
<script defer src="../js/script.js"></script>



</html>