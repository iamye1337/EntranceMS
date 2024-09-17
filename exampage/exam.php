<?php
include "../session_handler.php";
include "../database/connectdb.php";

if (!isLoggedIn()) {
    header("Location:../student/login.php");
}

$questionAmount = [
    "6" => [
        ["English", 40],
        ["Math", 20],
        ["Science", 20],
        ["Health", 20]
    ],
    "7" => [
        ["English", 40],
        ["Math", 20],
        ["Science", 20],
        ["Health", 20]
    ],
    "8" => [
        ["English", 40],
        ["Math", 20],
        ["Science", 20],
        ["Health", 20]
    ],
    "9" => [
        ["English", 40],
        ["Math", 20],
        ["Science", 20],
        ["Health", 20]
    ]
];
$examineeGrade = $_SESSION["grade"];
$questionBank = [];
for ($i = 0; $i < count($questionAmount[$examineeGrade]); $i++) {
    $sqlQuery = <<<Query
    SELECT * FROM `grade_$examineeGrade`.`{$questionAmount[$examineeGrade][$i][0]}` ORDER BY RAND() LIMIT {$questionAmount[$examineeGrade][$i][1]};
    Query;
    $queryResult = $mysqlConnection->query($sqlQuery);
    $queryData = $queryResult->fetch_all();
    $questionBank = array_merge($questionBank, $queryData);
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
    <title>Examination</title>
</head>

<body>
    <!-- Modal -->
    <div class="modal fade" id="submissionModal" tabindex="-1" aria-labelledby="submissionModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="submissionModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="modal-submit-btn">Submit</button>
                </div>
            </div>
        </div>
    </div>




    <!-- title bar -->
    <div class="d-flex p-2 justify-content-center align-items-center" style="background-color: #002561;">
        <p class="fs-1 fw-medium text-light">Adarsha Saula Yubak Secondary School</p>
    </div>

    <!-- action bar -->
    <div class="navbar navbar-expand-lg mb-5 fs-5">
        <div class="container-fluid">
            <!-- logo -->
            <div class="navbar-brand" href="#">
                <img src="../images/adarshaLogo.png" height="70" alt="">
            </div>
            <!-- question number -->
            <p class="nav-item" id="qnIndicator"></p>
            <!-- timer -->
            <p class="nav-item" id="timer">
                Timer:
                <small id="hours"></small>:
                <small id="minutes"></small>:
                <small id="seconds"></small>
            </p>

            <!-- this is new design -->
            <div class="qst_status d-flex">
                <div class="student-attempt">Attempted : <span id="attempted-qn">0/ 100</span></div>/
                <div class="student-unattempt">Unanswered : <span id="unattempted-qn">0</span></div>

            </div>
            <!-- buttons -->
            <div class="d-flex">
                <button class="btn btn-primary px-5 me-3" id="prev"
                    >Previous</button>
                <button class="btn btn-primary px-5" id="next">Next</button>
            </div>
        </div>
    </div>

    <!-- add correct option -->
    <div class="container d-none" id="question-container">
        <?php
        echo "{" . PHP_EOL;

        for ($i = 0; $i < (count($questionBank) - 1); $i++) {
            $questionNumber = $i + 1;
            $questionTitle = $questionBank[$i][1];
            $option1 = $questionBank[$i][2];
            $option2 = $questionBank[$i][3];
            $option3 = $questionBank[$i][4];
            $option4 = $questionBank[$i][5];
            $correctAnswer = $questionBank[$i][6];

            echo <<<Question
                "Question $questionNumber": {
                    "Qn": "$questionTitle",
                    "options": {
                        "option1": "$option1",
                        "option2": "$option2",
                        "option3": "$option3",
                        "option4": "$option4",
                        "correctOption": "$correctAnswer"
                    }
                },
            Question;
        }
        $lastQuestionIndex = count($questionBank) - 1;
        $questionNumber = $lastQuestionIndex + 1;
        $questionTitle = $questionBank[$lastQuestionIndex][1];
        $option1 = $questionBank[$lastQuestionIndex][2];
        $option2 = $questionBank[$lastQuestionIndex][3];
        $option3 = $questionBank[$lastQuestionIndex][4];
        $option4 = $questionBank[$lastQuestionIndex][5];
        $correctAnswer = $questionBank[$i][6];
        echo <<<LastQuestion
           "Question $questionNumber": {
                    "Qn": "$questionTitle",
                    "options": {
                        "option1": "$option1",
                        "option2": "$option2",
                        "option3": "$option3",
                        "option4": "$option4",
                        "correctOption": "$correctAnswer"
                    }
            }
        LastQuestion;
        echo "}";
        ?>
    </div>

    <!----------------------- Main Container -------------------------->
    <div class="container d-flex justify-content-center align-items-center">
        <!----------------------- Question Container -------------------------->
        <div class="row border rounded-5 p-5 bg-white shadow box-area w-100" id="question-form">
            <!--------------------------- Left Box (question) ----------------------------->
            <div class="col right-box">
                <div class="row align-items-center">
                    <div class="header-text" id="questionBox">
                        <h2 id="qn number" value="5">Question (number)</h2>
                        <p class="fs-4" id="question">Actual Question</p>
                    </div>
                </div>
            </div>
            <div class="col-auto g-1 rounded-5" style="background-color: green;"></div>
            <!-------------------- ------ Right Box (Options) ---------------------------->
            <div class="col right-box">
                <div class="header-text mb-2">
                    <h2>Answer</h2>
                </div>
                <div class="ps-3 pb-5 fs-4" id="examForm">
                    <div class="form-check">
                        <input class="form-check-input shadow" type="radio" name="option" id="Option1" value="1">
                        <label class="form-check-label options" for="Option1"></label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input shadow" type="radio" name="option" id="Option2" value="2">
                        <label class="form-check-label options" for="Option2"></label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input shadow" type="radio" name="option" id="Option3" value="3">
                        <label class="form-check-label options" for="Option3"></label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input shadow" type="radio" name="option" id="Option4" value="4">
                        <label class="form-check-label options" for="Option4"></label>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <script>
        window.onbeforeunload = function () {
            return "Data will be lost if you leave the page, are you sure?";
        };
    </script>
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../js/exam.js"></script>
</body>

</html>