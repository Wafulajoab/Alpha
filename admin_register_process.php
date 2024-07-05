<?php
// Start the session
session_start();

// Include the database connection file
include 'db_connection.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Set the default username
    $username = 'ADMIN';
    // Get the form data
    $password = $_POST['psw'];
    $password_confirm = $_POST['psw-confirm'];

    // Validate the form data
    if (empty($password) || empty($password_confirm)) {
        header("Location: admin_register.php?error=emptyfields");
        exit();
    }

    // Check password strength
    $password_pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/';
    if (!preg_match($password_pattern, $password)) {
        header("Location: admin_register.php?error=weakpassword");
        exit();
    }

    if ($password !== $password_confirm) {
        header("Location: admin_register.php?error=passwordcheck");
        exit();
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO admins (username, password) VALUES (?, ?)");
    if ($stmt === false) {
        // Error handling if the statement preparation failed
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }

    $stmt->bind_param("ss", $username, $hashed_password);

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect to the admin login page with success message
        header("Location: admin_login.php?register=success");
        exit();
    } else {
        // Redirect to the admin register page with error message
        header("Location: admin_register.php?error=sqlerror");
        exit();
    }

} else {
    header("Location: admin_register.php");
    exit();
}
?>
