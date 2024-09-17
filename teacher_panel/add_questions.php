<?php
include("../database/connectdb.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST)) {
  $grade = $_POST["grade"];
  $subject = $_POST["subject"];
  $question = $_POST["question"];
  $option1 = $_POST["option1"];
  $option2 = $_POST["option2"];
  $option3 = $_POST["option3"];
  $option4 = $_POST["option4"];
  $correctOption = $_POST["correctOption"];
  $sqlQuery = <<<Query
  INSERT INTO `grade_$grade`.`$subject`(`Question_ID`, `Question_Title`, `Option_1`, `Option_2`, `Option_3`, `Option_4`, `Correct_Option`) VALUES (NULL,'$question','$option1','$option2','$option3','$option4', $correctOption);
  Query;


  $queryResult = $mysqlConnection->query($sqlQuery);
  // Success alert
  if ($queryResult) {

    echo <<<Alert
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success!</strong> Question has been added to $subject grade $grade
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    Alert;
  }
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Add Questions</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="../style.css">

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
            <a class="nav-link fs-6" aria-current="page" href="teach_home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fs-6" href="add_students.php">Add Students</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active fs-6" href="add_questions.php">Add Questions</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fs-6" href="QnView.php">View Questions</a>
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

  <main class="m-4">

    <?php
    // if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //   // Get the selected grade
    //   $grade = $_POST['grade'];

    //   // Validate if a grade is selected
    //   if (!in_array($grade, ['6', '7', '8', '9'])) {
    //     echo '<div class="alert alert-danger" role="alert">Invalid grade selected.</div>';
    //     exit;
    //   }

    //   $subject = ucfirst($_POST['subject']);
    //   $que = ucfirst($_POST['que']);
    //   $option1 = $_POST['option1'];
    //   $option2 = $_POST['option2'];
    //   $option3 = $_POST['option3'];
    //   $option4 = $_POST['option4'];
    //   $correctOption = $_POST['correctOption'];

    //   // Define table name dynamically
    //   $table = "grade" . $grade;

    //   // Prepare and execute SQL query for the dynamic table
    //   $sql = "INSERT INTO `$table`( `subject`, `queTitle`, `option1`, `option2`, `option3`, `option4`, `correctOption`) VALUES (?,?,?,?,?,?,?)";
    //   $stmt = $con->prepare($sql);
    //   $stmt->execute([$subject, $que, $option1, $option2, $option3, $option4, $correctOption]);


    ?>

    <div>
      <h1>Question Submission Form</h1>
    </div>

    <!-- Button trigger modal -->
    <div class="d-flex justify-content-center">
      <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" style="fill:white; width:20px;">
          <path
            d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 144L48 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l144 0 0 144c0 17.7 14.3 32 32 32s32-14.3 32-32l0-144 144 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-144 0 0-144z" />
        </svg>
        ADD QUESTIONS
      </button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Questions</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">


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
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>


          </div>
        </div>
      </div>
    </div>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>