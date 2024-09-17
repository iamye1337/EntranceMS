
<?php
// $servername = "localhost";
// $username = "username";
// $password = "password";

// // Create connection
// $conn = new mysqli($servername, $username, $password);

// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// } 

// $array_values = array();
// // output data of each row
// while($row = $result->fetch_assoc()) {
//    $array_values[] = $row;
// };
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $array_values = [
        ["ok" => "ok"]
    ];
    echo json_encode($array_values);
}
// $conn->close();
?>