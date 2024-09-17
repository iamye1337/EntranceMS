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

    <!-- <style>
        .right__block {
            background-color: #dbe6e6 !important;
            width: 330px;
            margin: 20px 30px 0;

        }

        .options__items {
            height: 15px;
            width: 15px background-color: blue;
        }

        .ans__number {
            list-style: none;
            background-color: #eee;
            color: teal;
            margin: 3px;
            padding: 2px;
            /* height: 20px; */
            border: none;
            text-align: center;
        }

        /* .containerlist {
            display: grid;
            grid-template-columns: repeat(10, 1fr);
            grid-template-rows: repeat(10, 1fr);
            border: 1px solid black;
        } */
    </style> -->

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
    <div class="row text-center d-flex justify-content-between w-100" style="background-color: white; margin-bottom: calc(10vh);">
        <!-- logo -->
        <img class="col pt-2 ps-4 pb-2" src="../images/adarshaLogo.png" style="max-width: 6%;" alt="">
        <!-- question number -->
        <p class="align-self-center fs-5 col" id="qnIndicator"></p>
        <!-- timer -->
        <p class="align-self-center fs-5 col" id="timer">
            Timer:
            <small id="hours"></small>:
            <small id="minutes"></small>:
            <small id="seconds"></small>
        </p>
<!-- this is previous design -->
        <!-- <div class="qst_status col" style="background-color: green;">
            <div class="student-progress col">
                <div class="student-attempt col">Attempted :<span id="attempted-qn">0/ 100</span></div>
                <div class="student-unattempt col">Unanswered :<span id="unattempted-qn">0</span></div>
            </div>
        </div> -->
      
<!-- this is new design -->
        <div class="qst_status text-center col fs-5">
            <div class="row  align-items-center justify-content-center pt-4">
                <div class="student-attempt col col">Attempted : <span id="attempted-qn">0/ 100</span></div>/
                <div class="student-unattempt col col">Unanswered : <span id="unattempted-qn">0</span></div>
            </div>

        </div>
        <!-- buttons -->
        <div class="align-self-center col">
            <div class="row fs-4">
                <button class="btn btn-primary m-3 fs-6 col col pt-2 pb-2" id="prev" style="width: 200px;">Previous</button>
                <button class="btn btn-primary m-3 fs-6 col col pt-2 pb-2" id="next" style="width: 200px;">Next</button>
            </div>
        </div>
    </div>

    <!-- add correct option -->
    <div class="container d-none" id="question-container">
        <?php
        echo "{".PHP_EOL;

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
                        <p class="fs-4" id="question">sdfsdfsdfsd</p>
                    </div>
                </div>
            </div>
            <div class="col-auto g-1 rounded-5" style="background-color: green;"></div>
            <!-------------------- ------ Right Box (Options) ---------------------------->
            <div class="col right-box">
                <div class="header-text mb-2">
                    <h2>Answer</h2>
                    <!-- <input type="checkbox" class="btn-check" id="btn-check-2" autocomplete="off"> -->
                    <!-- < (not planned) label class="btn btn-outline-secondary" for="btn-check-2">Mark for Review</label> -->

                </div>
                <!-- options -->
                <!-- <form action="processRadio.php" method="POST"> -->
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
                <!-- </form> -->
            </div>
        </div>
        <!-- <button class="btn btn-primary m-3 fs-18" id="next" style="width: 200px;">Submit</button> -->
    </div>
    <!-- index page -->
    <!-- <div class="right__block">
        <div class="right__wrapper">
            <div class="font-20 mt-4 mb-5 text-center">Index</div>
            <div class="">
                <div class="row">
                    <div class="col-sm-12 col-md-6 d-flex align-items-center">
                        <div class="square mr-2" style="background-color: green; width: 20px; height: 20px;"></div>
                        Answered
                    </div>
                    <div class="col-sm-12 col-md-6 d-flex align-items-center">
                        <div class="square mr-2" style="background-color: grey; width: 20px; height: 20px;"></div>
                        Unanswered
                    </div>
                    <div _ngcontent-fak-c68="" class="ans__number">
                        <div _ngcontent-fak-c68="" class="div-answer-sheet">
                            <div class="containerlist">
                                <div class="row">
                                    <div class="col-1">1</div>
                                    <div class="col-1">2</div>
                                    <div class="col-1">3</div>
                                    <div class="col-1">4</div>
                                    <div class="col-1">5</div>
                                    <div class="col-1">6</div>
                                    <div class="col-1">7</div>
                                    <div class="col-1">8</div>
                                    <div class="col-1">9</div>
                                    <div class="col-1">10</div>
                                </div>
                                <div class="row">
                                    <div class="col-1">11</div>
                                    <div class="col-1">12</div>
                                    <div class="col-1">13</div>
                                    <div class="col-1">14</div>
                                    <div class="col-1">15</div>
                                    <div class="col-1">16</div>
                                    <div class="col-1">17</div>
                                    <div class="col-1">18</div>
                                    <div class="col-1">19</div>
                                    <div class="col-1">20</div>
                                </div>
                                <div class="row">
                                    <div class="col-1">21</div>
                                    <div class="col-1">22</div>
                                    <div class="col-1">23</div>
                                    <div class="col-1">24</div>
                                    <div class="col-1">25</div>
                                    <div class="col-1">26</div>
                                    <div class="col-1">27</div>
                                    <div class="col-1">28</div>
                                    <div class="col-1">29</div>
                                    <div class="col-1">30</div>
                                </div>
                                <div class="row">
                                    <div class="col-1">41</div>
                                    <div class="col-1">42</div>
                                    <div class="col-1">43</div>
                                    <div class="col-1">44</div>
                                    <div class="col-1">45</div>
                                    <div class="col-1">46</div>
                                    <div class="col-1">47</div>
                                    <div class="col-1">48</div>
                                    <div class="col-1">49</div>
                                    <div class="col-1">50</div>
                                </div>
                                <div class="row">
                                    <div class="col-1">51</div>
                                    <div class="col-1">52</div>
                                    <div class="col-1">53</div>
                                    <div class="col-1">54</div>
                                    <div class="col-1">55</div>
                                    <div class="col-1">56</div>
                                    <div class="col-1">57</div>
                                    <div class="col-1">58</div>
                                    <div class="col-1">59</div>
                                    <div class="col-1">60</div>
                                </div>
                                <div class="row">
                                    <div class="col-1">61</div>
                                    <div class="col-1">62</div>
                                    <div class="col-1">63</div>
                                    <div class="col-1">64</div>
                                    <div class="col-1">65</div>
                                    <div class="col-1">66</div>
                                    <div class="col-1">67</div>
                                    <div class="col-1">68</div>
                                    <div class="col-1">69</div>
                                    <div class="col-1">70</div>
                                </div>
                                <div class="row">
                                    <div class="col-1">71</div>
                                    <div class="col-1">27</div>
                                    <div class="col-1">73</div>
                                    <div class="col-1">74</div>
                                    <div class="col-1">75</div>
                                    <div class="col-1">76</div>
                                    <div class="col-1">77</div>
                                    <div class="col-1">78</div>
                                    <div class="col-1">79</div>
                                    <div class="col-1">80</div>
                                </div>
                                <div class="row">
                                    <div class="col-1">81</div>
                                    <div class="col-1">82</div>
                                    <div class="col-1">83</div>
                                    <div class="col-1">84</div>
                                    <div class="col-1">85</div>
                                    <div class="col-1">86</div>
                                    <div class="col-1">87</div>
                                    <div class="col-1">88</div>
                                    <div class="col-1">89</div>
                                    <div class="col-1">90</div>
                                </div>
                                <div class="row">
                                    <div class="col-1">91</div>
                                    <div class="col-1">92</div>
                                    <div class="col-1">93</div>
                                    <div class="col-1">94</div>
                                    <div class="col-1">95</div>
                                    <div class="col-1">96</div>
                                    <div class="col-1">97</div>
                                    <div class="col-1">98</div>
                                    <div class="col-1">99</div>
                                    <div class="col-1">100</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div> -->
    </div>
    </div>
    <script>
        window.onbeforeunload = function() {
            return "Data will be lost if you leave the page, are you sure?";
        };
    </script>
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../js/exam.js"></script>
</body>

</html>