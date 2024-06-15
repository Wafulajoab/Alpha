<?php
session_start();

// Include the database connection file
include 'db_connection.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['psw'];

    // Validate credentials
    $sql = "SELECT * FROM admins WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Verify password
        if (password_verify($password, $row['password'])) {
            // Password is correct, start the session
            $_SESSION['admin_username'] = $row['username'];
            header("Location: admin_dashboard.php");
            exit();
        } else {
            // Invalid password
            header("Location: admin_login.php?error=invalid");
            exit();
        }
    } else {
        // Invalid username
        header("Location: admin_login.php?error=invalid");
        exit();
    }
} else {
    // If not a POST request, redirect to the login page
    header("Location: admin_login.php");
    exit();
}
?>
