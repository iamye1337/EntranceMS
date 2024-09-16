<?php
if(isset($_POST)){
    $data=file_get_contents("php://input"); // json string
    $resultData=json_decode($data,true); // return a php array
    $marks= $resultData['marks'];
    echo $resultData['marks'];

    // use $marks to write on database 
    // echo $resultData['marks'];

}
?>
