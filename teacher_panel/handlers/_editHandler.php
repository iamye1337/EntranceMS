<?php
include "../../database/connectdb.php";
include "../../session_handler.php";
if (!isAdminLoggedIn()) {
    header("Location:../teach_login.php");
}
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["questionID"])) {
    $sqlQuery = <<<sqlQuery
    SELECT * FROM `question_bank` WHERE `Question_ID` = {$_GET["questionID"]};
    sqlQuery;
    $queryResult = $mysqlConnection->query($sqlQuery);
    $queryData = $queryResult->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../..//bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../style.css">
    <style>
        #form-container {
            position: fixed;
            /* or absolute */
            top: 50%;
            left: 50%;
            /* bring your own prefixes */
            transform: translate(-50%, -50%);
            min-height: 500px;
            min-width: 600px;
        }
    </style>
    <title>Login</title>
</head>

<body>
    <div id="form-container">
        <form action="_pushEditChanges.php?questionID=<?= $_GET["questionID"] ?>" method="POST">
            <!-- Grade selection -->
            <div class="mb-3 row">
                <label for="grade" class="col-sm-2 col-form-label">Grade<sup><b>*</b></sup>:</label>
                <div class="col-sm-10">
                    <div class="col-md-3">
                        <select class="form-select" name="grade" required>
                            <?php
                            $requiredOptions = ["6", "7", "8", "9"];
                            for ($i = 0; $i < count($requiredOptions); $i++) {
                                if ($requiredOptions[$i] == $queryData["Grade"]) {

                                    echo <<<Options
                                    <option selected value="$requiredOptions[$i]">Grade $requiredOptions[$i]</option>
                                    Options;
                                } else {
                                    echo <<<Options
                                    <option value="$requiredOptions[$i]">Grade $requiredOptions[$i]</option>
                                    Options;
                                }
                            }
                            ?>
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
                            <?php
                            $requiredOptions = ["Science", "Math", "Health", "English"];
                            for ($i = 0; $i < count($requiredOptions); $i++) {
                                if ($requiredOptions[$i] == $queryData["Subject_Name"]) {

                                    echo <<<Options
                                    <option selected value="$requiredOptions[$i]">$requiredOptions[$i]</option>
                                    Options;
                                } else {
                                    echo <<<Options
                                    <option value="$requiredOptions[$i]"> $requiredOptions[$i]</option>
                                    Options;
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Question input -->
            <div class="mb-3 row">
                <label for="que" class="col-sm-2 col-form-label">Question<sup><b>*</b></sup>:</label>
                <div class="col-sm-10">
                    <?=
                    <<<Input
                    <input type="text" class="form-control" name="question" value="{$queryData["Question_Title"]}" required>
                    Input;
                    ?>
                </div>
            </div>

            <!-- Options input -->
            <div class="mb-3 row">
                <label for="option1" class="col-sm-2 col-form-label">Option 1<sup><b>*</b></sup>:</label>
                <div class="col-sm-10">
                    <?=
                    <<<Input
                    <input type="text" class="form-control" name="option1" value="{$queryData["Option_1"]}" required>
                    Input;
                    ?>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="option2" class="col-sm-2 col-form-label">Option 2<sup><b>*</b></sup>:</label>
                <div class="col-sm-10">
                    <?=
                    <<<Input
                    <input type="text" class="form-control" name="option2" value="{$queryData["Option_2"]}" required>
                    Input;
                    ?>
                    <!-- <input type="text" class="form-control" name="option2" required> -->
                </div>
            </div>
            <div class="mb-3 row">
                <label for="option3" class="col-sm-2 col-form-label">Option 3<sup><b>*</b></sup>:</label>
                <div class="col-sm-10">
                    <?=
                    <<<Input
                    <input type="text" class="form-control" name="option3" value="{$queryData["Option_1"]}" required>
                    Input;
                    ?>
                    <!-- <input type="text" class="form-control" name="option3" required> -->
                </div>
            </div>
            <div class="mb-3 row">
                <label for="option4" class="col-sm-2 col-form-label">Option 4<sup><b>*</b></sup>:</label>
                <div class="col-sm-10">
                    <?=
                    <<<Input
                    <input type="text" class="form-control" name="option4" value="{$queryData["Option_4"]}" required>
                    Input;
                    ?>
                    <!-- <input type="text" class="form-control" name="option4" required> -->
                </div>
            </div>

            <!-- Correct option selection -->
            <div class="mb-3 row">
                <label for="correctOption" class="col-sm-2 col-form-label">Correct Option<sup><b>*</b></sup>:</label>
                <div class="col-sm-10">
                    <div class="col-md-3">
                        <select class="form-select" name="correctOption" required>
                            <?php
                            $numberOfOptions = 4;
                            // $requiredOptions = [
                            //     $queryData[],
                            //     $queryData[],
                            //     $queryData[],
                            //     $queryData[]
                            // ];
                            for ($i = 1; $i <= $numberOfOptions; $i++) {
                                if ($i == $queryData["Correct_Option"]) {
                                    echo <<<Options
                                    <option selected value="$i">Option $i</option>
                                    Options;
                                } else {
                                    echo <<<Options
                                    <option value="$i">Option $i</option>
                                    Options;
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Form submission -->
            <div class="form-footer">
                <a href="../questionView.php"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button></a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>





    <!-- Modal -->
    <form action=""></form>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
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
    </form>
    <script src="../../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>