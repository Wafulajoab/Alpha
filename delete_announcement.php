<?php
// Check if an announcement ID is provided
if (isset($_GET['id'])) {
    $announcement_id = $_GET['id'];

    // Database connection settings
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "alpha"; // Database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute SQL statement to delete the announcement
    $sql = "DELETE FROM announcements WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $announcement_id);

    if ($stmt->execute()) {
        // Redirect to the admin announcements page after successful deletion
        header("Location: admin_announcements.php");
        exit();
    } else {
        echo "Error deleting announcement: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
} else {
    // If no announcement ID is provided, redirect to the admin announcements page
    header("Location: admin_announcements.php");
    exit();
}
?>
