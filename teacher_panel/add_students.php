<?php
include("../database/connectdb.php");
include "../session_handler.php";

if (!isAdminLoggedIn()) {
    header("Location:teach_login.php");
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST)) {
    $name = htmlspecialchars($_POST["name"]);
    $symbolNumber = htmlspecialchars($_POST["symbolNo"]);
    $fatherName = htmlspecialchars($_POST["fname"]);
    $motherName = htmlspecialchars($_POST["mname"]);
    $dateOfBirth = htmlspecialchars($_POST["dob"]);
    $address = htmlspecialchars($_POST["address"]);
    $contactNumber = htmlspecialchars($_POST["contactNo"]);
    $examDate = htmlspecialchars($_POST["examDate"]);
    $grade = htmlspecialchars($_POST["grade"]);

    $sqlQuery = <<<sqlQuery
    INSERT INTO `examinee_info`(
    `SN`,
    `Name`,
    `Symbol_Number`, 
    `Grade`, 
    `Fathers_Name`, 
    `Mothers_Name`, 
    `Date_of_Birth`, 
    `Address`, 
    `Contact_Number`, 
    `Exam_Completion_Status`, 
    `Examination_Date`, 
    `Result`) 
    VALUES (NULL,'$name','$symbolNumber','$grade','$fatherName','$motherName','$dateOfBirth','$address','$contactNumber',0,'$examDate',0);
    sqlQuery;
    $queryResult = $mysqlConnection->query($sqlQuery);

    if ($queryResult) {
        echo <<<Alert
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> $name has been added to the database.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        Alert;
    } else {
        echo <<<Alert
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Failure!</strong> $name was not added to the database
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        Alert;
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <title>HomePage</title>
</head>

<body>
    <!-- Title Bar -->
    <div class="d-flex p-2 justify-content-center align-items-center" style="background-color: #002561;">
        <p class="fs-1 fw-medium text-light">Adarsha Saula Yubak Secondary School</p>
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary mb-5">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="../images/adarshaLogo.png" alt="Logo" height="70px" class="d-inline-block align-text-top">
            </a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link fs-4" aria-current="page" href="teach_home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-4" href="add_questions.php">Add Questions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active fs-4" href="add_students.php">Add Students</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-4" href="questionView.php">View Questions</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success fs-4" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <main class="m-4">
        <div class="mb-4">
            <a href="teach_home.php" class="btn btn-success">Back to Home</a>
            <div class="d-flex float-end">
                <a href="teach_login.php" type="button" class="btn btn-secondary">
                    <img src="../images/profpic.png" alt="" width="20"> Log out
                </a>
            </div>
        </div>

        <div>
            <h1>Add Students Here</h1>
        </div>

        <!-- Button trigger modal -->
        <div class="d-flex justify-content-center">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" style="fill:white; width:20px;">
                    <path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 144L48 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l144 0 0 144c0 17.7 14.3 32 32 32s32-14.3 32-32l0-144 144 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-144 0 0-144z" />
                </svg>
                ADD STUDENTS
            </button>

            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Students</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <!-- Form for adding students -->
                            <form action="<?= htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">

                                <!-- Name -->
                                <div class="mb-3 row">
                                    <label for="name" class="col-sm-2 col-form-label">Name<sup>*</sup>:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="name" id="name" required>
                                    </div>
                                </div>

                                <!-- Symbol No -->
                                <div class="mb-3 row">
                                    <label for="symbolNo" class="col-sm-2 col-form-label">Symbol No<sup>*</sup>:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="symbolNo" id="symbolNo" required>
                                    </div>
                                </div>

                                <!-- Father's Name -->
                                <div class="mb-3 row">
                                    <label for="fname" class="col-sm-2 col-form-label">Father's Name<sup>*</sup>:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="fname" id="fname" required>
                                    </div>
                                </div>

                                <!-- Mother's Name -->
                                <div class="mb-3 row">
                                    <label for="mname" class="col-sm-2 col-form-label">Mother's Name<sup>*</sup>:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="mname" id="mname" required>
                                    </div>
                                </div>

                                <!-- Date of Birth -->
                                <div class="mb-3 row">
                                    <label for="dob" class="col-sm-2 col-form-label">Date of Birth<sup>*</sup>:</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="dob" id="dob" required>
                                    </div>
                                </div>

                                <!-- Address -->
                                <div class="mb-3 row">
                                    <label for="address" class="col-sm-2 col-form-label">Address<sup>*</sup>:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="address" id="address" required>
                                    </div>
                                </div>

                                <!-- Contact Number -->
                                <div class="mb-3 row">
                                    <label for="contactNo" class="col-sm-2 col-form-label">Contact No<sup>*</sup>:</label>
                                    <div class="col-sm-10">
                                        <input type="tel" class="form-control" name="contactNo" id="contactNo" required>
                                    </div>
                                </div>

                                <!-- Exam Date -->
                                <div class="mb-3 row">
                                    <label for="examDate" class="col-sm-2 col-form-label">Exam Date<sup>*</sup>:</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="examDate" id="examDate" required>
                                    </div>
                                </div>

                                <!-- Grade -->
                                <div class="mb-3 row">
                                    <label for="grade" class="col-sm-2 col-form-label">Grade<sup><b>*</b></sup>:</label>
                                    <div class="col-sm-10">
                                        <div class="col-md-3">
                                            <select class="form-select" name="grade" required>
                                                <option selected disabled value="">Choose grade...</option>
                                                <option value="6">Grade 6</option>
                                                <option value="7">Grade 7</option>
                                                <option value="8">Grade 8</option>
                                                <option value="9">Grade 9</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- <label for="grade" class="col-sm-2 col-form-label">Grade<sup>*</sup>:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="grade" id="grade" required>
                                    </div> -->
                                </div>

                                <!-- Form submission -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
    </main>
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