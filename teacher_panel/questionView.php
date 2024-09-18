<?php
include "../database/connectdb.php";
include "../session_handler.php";

if(!isAdminLoggedIn()) {
    header("Location:teach_login.php");
}

$sqlQuery = <<<SQl
SELECT * FROM `entrance_ms`.`question_bank`;
SQl;
$queryResult = $mysqlConnection->query($sqlQuery);
$queryData = $queryResult->fetch_all();
if (isset($_GET)) {
    if (isset($_GET["editSuccess"]) && $_GET["editSuccess"] == "true") {
        echo <<<Alert
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> Question has been edited successfully
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        Alert;
    } else if (isset($_GET["editSuccess"]) && $_GET["editSuccess"] == "false") {
        echo <<<Alert
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Failure!</strong> Question was not able to be edited.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        Alert;
    } else if (isset($_GET["deleteSuccess"]) && $_GET["deleteSuccess"] == "true") {
        echo <<<Alert
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> Question has been deleted successfully
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        Alert;
    } else if (isset($_GET["deleteSuccess"]) && $_GET["deleteSuccess"] == "false") {
        echo <<<Alert
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Failure!</strong> Question was not able to be deleted.
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
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.6/css/dataTables.dataTables.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Questions View Page</title>
</head>

<body>
    <!-- title bar -->
  <div class="d-flex p-2 justify-content-center align-items-center" style="background-color: #002561;">
    <p class="fs-1 fw-medium text-light">Adarsha Saula Yubak Secondary School</p>
  </div>
  <nav class="navbar navbar-expand-lg bg-body-tertiary mb-5">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="../images/adarshaLogo.png" alt="Logo" width="auto" height="70px"
          class="d-inline-block align-text-top"></a>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link fs-4" aria-current="page" href="teach_home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active fs-4" href="add_questions.php">Add Questions</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fs-4" href="add_students.php">Add Students</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fs-4" aria-disabled="true" href="questionView.php">View Questions</a>
          </li>
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success fs-4" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>




    <!----------------------- Main Container -------------------------->
    <div class="container d-flex justify-content-center align-items-center min-vh-100">

        <!----------------------- Container -------------------------->
        <div class="row box-container box-area">

            <!-------------------------- (form) ---------------------------->
            <table id="questions" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Question ID</th>
                        <th>Subject</th>
                        <th>Class</th>
                        <th>Question</th>
                        <th>Option_1</th>
                        <th>Option_2</th>
                        <th>Option_3</th>
                        <th>Option_4</th>
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
                            <td>{$queryData[$i][6]}</td>
                            <td>{$queryData[$i][7]}</td>
                            <td>{$queryData[$i][8]}</td>

                            <td>
                                <a href="handlers/_editHandler.php?questionID={$queryData["$i"][0]}">
                                    <button type="button" class="btn btn-primary" >Edit</button>
                                </a>
                                <a href="handlers/_deleteHandler.php?questionID={$queryData["$i"][0]}">
                                <button type="button" class="btn btn-danger">Delete</button>
                                </a>
                            </td>
                        </tr>
                        TableRows;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <a href="handlers/_editHandler.php?"></a>
    <script defer src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script defer src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script defer src="https://cdn.datatables.net/2.1.6/js/dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script defer src="../js/script.js"></script>
</body>

<script>
</script>

</html>