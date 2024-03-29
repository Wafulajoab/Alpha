<?php
// Database connection parameters
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

// Retrieve form data
$work_id = $_POST['work_id'];
$rank = $_POST['rank'];
$username = $_POST['username'];
$password = $_POST['password'];

// Hash the password for security
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Prepare and execute SQL statement to insert admin data into the database
$stmt = $conn->prepare("INSERT INTO admins (work_id, rank, username, password) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $work_id, $rank, $username, $hashed_password);

if ($stmt->execute()) {
    // Redirect back to the admin list page after successful addition
    header("Location: displayadmins.php");
    exit;
} else {
    echo "Error: " . $stmt->error;
}

// Close statement and database connection
$stmt->close();
$conn->close();
?>
