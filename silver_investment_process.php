<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    
    $amount = $_POST["amount"];
    $duration = $_POST["duration"];

    // Validate form data
    if (!empty($username) && !empty($amount) && is_numeric($amount)) {
        // Connect to MySQL database (change these values with your database credentials)
        $servername = "localhost";
        $db_username = "root";
        $db_password = "";
        $dbname = "alpha";

        // Create connection
        $conn = new mysqli($servername, $db_username, $db_password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare SQL statement to insert investment details into the database
        $sql = "INSERT INTO investments (username, amount, duration) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sdi", $username, $amount, $duration);

        // Execute SQL statement
        if ($stmt->execute() === TRUE) {
            echo "Investment recorded successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close statement and connection
        $stmt->close();
        $conn->close();
    } else {
        echo "Invalid input.";
    }
}
?>
