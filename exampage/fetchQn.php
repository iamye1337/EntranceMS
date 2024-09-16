<?php
// Database connection parameters
// include 'database/connectdb.php';

$HOST = "localhost";
$USERNAME = "root";
$PASSWORD = "";
$DB_NAME = "entrancems"; // Database name-> entrancems

try {
    $con = new PDO("mysql:host=$HOST;dbname=$DB_NAME", $USERNAME, $PASSWORD);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch data from the database
    // $row = $result->fetch_assoc();
    // $grade = $row["grade"];
    // $grade = '6';
    $f = "grade6";
    $stmt = $con->prepare("SELECT * FROM $f");
    // $stmt->bindValue('$f', "grade6");
    $stmt->execute();

    // Fetch all results as an associative array
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Encode the data into JSON format
    $jsonData = json_encode($data, JSON_PRETTY_PRINT);

    // Write the JSON data to a file
    $jsonFilePath = 'questions.json';
    if (file_put_contents($jsonFilePath, $jsonData)) {
        echo "Data has been successfully written to $jsonFilePath";
    } else {
        echo "Error writing data to file.";
    }

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
