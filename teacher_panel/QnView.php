<?php
include "../database/connectdb.php";
include "../session_handler.php";

if (!isAdminLoggedIn()) {
    return;
    // redirect to admin login page
}

$sqlQuery = <<<SQl
SELECT * FROM `grade_6`.`english` UNION ALL
SELECT * FROM `grade_6`.`health`UNION ALL
SELECT * FROM `grade_6`.`math`UNION ALL
SELECT * FROM `grade_6`.`science` LIMIT 200;
SQl;
$queryResult = $mysqlConnection->query($sqlQuery);
$queryData = $queryResult->fetch_all();
// echo "<pre>";
// var_dump($queryData);
// echo "</pre>";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.6/css/dataTables.dataTables.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="../style.css">
    <title>Questions View Page</title>
</head>

<body>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body ">
                    <form action="<?= htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                        <!-- Grade selection -->
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
                        </div>

                        <!-- Subject selection -->
                        <div class="mb-3 row">
                            <label for="subject" class="col-sm-2 col-form-label">Subject<sup><b>*</b></sup>:</label>
                            <div class="col-sm-10">
                                <div class="col-md-3">
                                    <select class="form-select" name="subject" required>
                                        <option selected disabled value="">Choose subject...</option>
                                        <option value="Science">Science</option>
                                        <option value="Math">Math</option>
                                        <option value="Health">Health</option>
                                        <option value="English">English</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Question input -->
                        <div class="mb-3 row">
                            <label for="que" class="col-sm-2 col-form-label">Question<sup><b>*</b></sup>:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="question" required>
                            </div>
                        </div>

                        <!-- Options input -->
                        <div class="mb-3 row">
                            <label for="option1" class="col-sm-2 col-form-label">Option 1<sup><b>*</b></sup>:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="option1" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="option2" class="col-sm-2 col-form-label">Option 2<sup><b>*</b></sup>:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="option2" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="option3" class="col-sm-2 col-form-label">Option 3<sup><b>*</b></sup>:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="option3" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="option4" class="col-sm-2 col-form-label">Option 4<sup><b>*</b></sup>:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="option4" required>
                            </div>
                        </div>

                        <!-- Correct option selection -->
                        <div class="mb-3 row">
                            <label for="correctOption" class="col-sm-2 col-form-label">Correct Option<sup><b>*</b></sup>:</label>
                            <div class="col-sm-10">
                                <div class="col-md-3">
                                    <select class="form-select" name="correctOption" required>
                                        <option selected disabled value="">Choose correct option...</option>
                                        <option value="1">Option 1</option>
                                        <option value="2">Option 2</option>
                                        <option value="3">Option 3</option>
                                        <option value="4">Option 4</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Form submission -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>

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
                        <a class="nav-link fs-6" aria-current="page" href="teach_home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-6" href="add_students.php">Add Students</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-6" href="add_questions.php">Add Questions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active fs-6" href="QnView.php">View Questions</a>
                    </li>
                </ul>

                <!-- Right-aligned Login Button -->
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="teach_login.php" type="button" class="btn btn-light">
                            <img src="../images/profpic.png" alt="" width="20"> Log Out
                        </a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>




    <!----------------------- Main Container -------------------------->
    <div class="container d-flex justify-content-center align-items-center min-vh-100">

        <!----------------------- Container -------------------------->
        <div class="row box-container box-area">

            <!-------------------------- (form) ---------------------------->
            <!-- <div class="table-responsive"> -->
            <table id="questions" class="display table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Que.ID</th>
                        <!-- <th>Subject</th> -->
                        <!-- <th>Class</th> -->
                        <th>Questions</th>
                        <th>Option 1</th>
                        <th>Option 2</th>
                        <th>Option 3</th>
                        <th>Option 4</th>
                        <th>Correct_Option</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    for ($i = 0; $i < $queryResult->num_rows; $i++) {
                        // <td>Subject Name</td>
                        echo <<<TableRows
                        <tr>
                            <td>{$queryData[$i][0]}</td>
                            <td>{$queryData[$i][1]}</td>
                            <td>{$queryData[$i][2]}</td>
                            <td>{$queryData[$i][3]}</td>
                            <td>{$queryData[$i][4]}</td>
                            <td>{$queryData[$i][5]}</td>
                            <td style="text-align:center;">{$queryData[$i][6]}</td>
                            <td>
                            <div class="row p-2">
                                <div class="p-0 col-6">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</button>
                                </div>
                                <div class="p-0 col-2">
                                   <button type="button" class="btn btn-danger">Delete</button>
                                </div>
                            </div>


                            </td>
                        </tr>
                        TableRows;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>
    <script defer src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script defer src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script defer src="https://cdn.datatables.net/2.1.6/js/dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script defer src="../js/script.js"></script>
</body>

<script>
    function editHandler(questionID) {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
            }
        };
        xhr.open('POST', '/EntranceMS/teacher_panel/handlers/_editHandler.php');
        xhr.setRequestHeader("Content-Type", "application/json")
        xhr.send();

    }
    editHandler("ok");
</script>

</html>