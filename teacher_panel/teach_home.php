<?php
// Database connection
include("../database/connectdb.php");


// SQL query to fetch data from the users table
$sqlQuery = "SELECT * FROM `examinee_info`";

//Execute Query
$queryResult = $mysqlConnection->query($sqlQuery);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.6/css/dataTables.dataTables.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>HomePage</title>
</head>


<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="../images/adarshaLogo.png" alt="Logo" width="30" height="auto"
                    class="d-inline-block align-text-top">
                Adarsha Saula Yubak Secondary School
            </a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active " aria-current="page" href="teach_home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="add_questions.php">Add Questions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-disabled="true" href="QnView.php">View Questions</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <h2>Registered Students :</h2>

    <!----------------------- Main Container -------------------------->

    <div class="container d-flex justify-content-center align-items-center min-vh-100">

        <!----------------------- Container -------------------------->

        <div class="row box-container box-area">

            <!-------------------------- (form) ---------------------------->
            <table id="questions" class="display" style="width:100%">
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
                        <th>Result</t>
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
    <script defer src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script defer src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script defer src="https://cdn.datatables.net/2.1.6/js/dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script defer src="../js/script.js"></script>


</body>

</html>