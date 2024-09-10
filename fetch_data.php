<?php
include 'database/connect.php';

// SQL query to fetch data from the users table
$sql = "SELECT * FROM student";

//Execute Query
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Table</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .table-wrapper {
            overflow-x: auto;
            margin: 20px 0;
        }
    </style>
</head>
<body>

    <h2>Registered Students Lists</h2>

    <div class="table-wrapper">
        <table>
            <tr>
                <th>SN</th>
                <th>Name</th>
                <th>Symbol_No</th>
                <th>Father's Name</th>
                <th>Mother's Name</th>
                <th>Date of Birth</th>
                <th>Address</th>
                <th>Contact No.</th>
            </tr>

            <?php
            // Check if there are any results
            if ($result->num_rows > 0) {
                // Output data for each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["SN"] . "</td>";
                    echo "<td>" . $row["Name"] . "</td>";
                    echo "<td>" . $row["Symbol_No"] . "</td>";
                    echo "<td>" . $row["Father's_Name"] . "</td>";
                    echo "<td>" . $row["Mother's_Name"] . "</td>";
                    echo "<td>" . $row["Date_of_Birth"] . "</td>";
                    echo "<td>" . $row["Address"] . "</td>";
                    echo "<td>" . $row["Contact_No"] . "</td>";
                    echo "</tr>";
                }
            } else {
                // If no records are found
                echo "<tr><td colspan='4'>No records found</td></tr>";
            }

            // Close the database connection
            $conn->close();
            ?>

        </table>
    </div>

</body>
</html>
