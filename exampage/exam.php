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
    <!-- title bar -->
    <div class="d-flex p-2 justify-content-center align-items-center" style="background-color: #002561;">
        <p class="fs-1 fw-medium text-light">Adarsha Saula Yubak Secondary School</p>
    </div>

    <!-- action bar -->
    <div class="d-flex justify-content-between p-2" style="background-color: white; margin-bottom: calc(10vh);">
        <!-- logo -->
        <img src="images/asarshaLogo.png" style="height: 70px;" alt="">
        <!-- question number -->
        <p class="align-self-center fs-5" id="qnIndicator"></p>
        <!-- timer -->
        <p class="align-self-center fs-5" id="timer">Timer:
            <small id="hours">

            </small>:
            <small id="minutes">

            </small>:
            <small id="seconds">

            </small>
        </p>
        <!-- buttons -->
        <div class="align-self-center">
            <button class="btn btn-primary m-3 fs-6" id="prev" style="width: 200px;">Previous</button>
            <button class="btn btn-primary m-3 fs-6" id="next" style="width: 200px;">Next</button>
        </div>
    </div>

    <!-- add correct option -->
    <div class="container d-none" id="question container">
        {
        "Question 1":{
        "Qn": "How many seconds are present in a day?",
        "options":{
        "option1": "86400#$",
        "option2": "83239",
        "option3": "64000",
        "option4": "55555"
        }
        },
        "Question 2":{
        "Qn": "which planet is closest to the sun?",
        "options":{
        "option1": "Mercury#$",
        "option2": "Venus",
        "option3": "Mars",
        "option4": "Uranus"
        }
        },
        "Question 3":{
        "Qn": "which planet is c to the earth?",
        "options":{
        "option1": "Mercury#$",
        "option2": "Ves",
        "option3": "Mars",
        "option4": "Uranus"
        }
        },
        "Question 4":{
        "Qn": "which planet is closest to t",
        "options":{
        "option1": "Mercury#$",
        "option2": "Venus",
        "option3": "Mars",
        "option4": "Uranus"
        }
        },
        "Question 5":{
        "Qn": "which planet ishe earth?",
        "options":{
        "option1": "Mercury#$",
        "option2": "Vnus",
        "option3": "Mars",
        "option4": "Uranus"
        }
        },
        "Question 6":{
        "Qn": "w is closest to the earth?",
        "options":{
        "option1": "Mercury#$",
        "option2": "Veus",
        "option3": "Ms",
        "option4": "Uranus"
        }
        },
        "Question 7":{
        "Qn": "which planeto the earth?",
        "options":{
        "option1": "Mercury#$",
        "option2": "Venus",
        "option3": "Mars",
        "option4": "Uranus"
        }
        },
        "Question 8":{
        "Qn": "which planet is closest trth?",
        "options":{
        "option1": "Mercury#$",
        "option2": "Vnus",
        "option3": "Mars",
        "option4": "Uanus"
        }
        },
        "Question 9":{
        "Qn": "which plosest to the earth?",
        "options":{
        "option1": "Mercury#$",
        "option2": "Vnus",
        "option3": "Mrs",
        "option4": "Uranus"
        }
        },
        "Question 10":{
        "Qn": "which planet is  earth?",
        "options":{
        "option1": "Mercury#$",
        "option2": "Venus",
        "option3": "Mars",
        "option4": "Uranus"
        }
        }
        }
        <!-- php code to fetch the -->
        <!-- json format must be used! -->
        <!--          
         Note that right option must be labelled with #$ at the end. This process must be done when storing answers in database which is done using the code "not manually"
        
          -->
    </div>

    <!----------------------- Main Container -------------------------->
    <div class="container d-flex justify-content-center align-items-center h-50">
        <!----------------------- Question Container -------------------------->
        <div class="row border rounded-5 p-2 bg-white shadow box-area">
            <!--------------------------- Left Box (question) ----------------------------->
            <div class="col right-box">
                <div class="row align-items-center">
                    <div class="header-text" id="questionBox">
                        <h2 id="qn number" value="5">Question (number)</h2>
                        <p id="question">sdfsdfsdfsd</p>
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
                <div class="ps-3 pb-5">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="option" id="Option1" value="1">
                        <label class="form-check-label options" for="Option1"></label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="option" id="Option2" value="2">
                        <label class="form-check-label options" for="Option2"></label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="option" id="Option3" value="3">
                        <label class="form-check-label options" for="Option3"></label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="option" id="Option4" value="4">
                        <label class="form-check-label options" for="Option4"></label>
                    </div>

                </div>
                <!-- </form> -->
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