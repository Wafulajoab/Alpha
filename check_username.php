<?php
// check_username.php

// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "alpha";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get username from AJAX request
$username = $_POST['username'];

// Check if username exists
$sql = "SELECT id FROM users WHERE username = ?";
if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo 'exists'; // Username exists
    } else {
        echo 'success'; // Username available
    }
    $stmt->close();
}

// Close connection
$conn->close();
?>
