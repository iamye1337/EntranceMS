<?php
// Database connection parameters (adjust as needed)
$host = "localhost";
$dbname = "entrancems";
$username = "root";
$password = "";

try {
    // Establish database connection
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if a radio button was selected
    if (isset($_POST['option'])) {
        // Get the selected radio button value
        $selectedOption = $_POST['option'];
        $userId = 1; // Assuming the user's ID is 1, you can change this dynamically

        // Check if the user has already selected an option
        $stmt = $pdo->prepare("SELECT * FROM user_selections WHERE user_id = :userId");
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();
        $existingSelection = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($existingSelection) {
            // Update the selection if it exists
            $stmt = $pdo->prepare("UPDATE user_selections SET selected_option = :selectedOption WHERE user_id = :userId");
            $stmt->bindParam(':selectedOption', $selectedOption);
            $stmt->bindParam(':userId', $userId);
            $stmt->execute();
            header("Location: exam.php");
            // echo "Your selection has been updated!";
        } else {
            // Insert a new selection if none exists
            $stmt = $pdo->prepare("INSERT INTO user_selections (user_id, selected_option) VALUES (:userId, :selectedOption)");
            $stmt->bindParam(':userId', $userId);
            $stmt->bindParam(':selectedOption', $selectedOption);
            $stmt->execute();
            echo "Your selection has been saved!";
        }
    } else {
        echo "No option selected.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
