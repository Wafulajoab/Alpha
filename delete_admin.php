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

// Check if the admin ID is set in the URL parameters
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // Sanitize the admin ID to prevent SQL injection
    $admin_id = $_GET['id'];

    // Prepare a SQL statement to delete the admin with the given ID
    $sql = "DELETE FROM admins WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $admin_id);

    // Execute the SQL statement
    if ($stmt->execute()) {
        // Redirect back to the admin list page after successful deletion
        header("Location: displayadmins.php");
        exit();
    } else {
        echo "Error deleting admin: " . $conn->error;
    }
} else {
    // If admin ID is not provided in the URL parameters, redirect back to the admin list page
    header("Location: admin_list.php");
    exit();
}

// Close the database connection
$conn->close();
?>
