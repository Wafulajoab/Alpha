<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database credentials
    $servername = "localhost"; // Change this if your database is hosted on a different server
    $username = "root"; // Change this to your database username
    $password = ""; // Change this to your database password
    $dbname = "alpha"; // Change this to your database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Define variables and initialize with empty values
    $username = $phone_number = $password = $confirm_password = "";

    // Processing form data when form is submitted
    $username = $_POST["username"];
    $phone_number = $_POST["phone_number"];
    $password = $_POST["psw"];
    $confirm_password = $_POST["psw-confirm"];

    // Validate username, phone number, and password
    if (empty($username) || empty($phone_number) || empty($password)) {
        echo "<script>alert('All fields are required');</script>";
        header("Location: user_register.php");
        exit();
    } elseif (strlen($username) < 4) {
        echo "<script>alert('Username must have at least 4 characters');</script>";
        header("Location: user_register.php");
        exit();
    } elseif (!preg_match('/^\d{10}$/', $phone_number)) {
        echo "<script>alert('Phone number must have at least 10 digits');</script>";
        header("Location: user_register.php");
        exit();
    } elseif (strlen($password) < 6) {
        echo "<script>alert('Password must have at least 6 characters');</script>";
        header("Location: user_register.php");
        exit();
    } elseif ($password != $confirm_password) {
        echo "<script>alert('Passwords do not match');</script>";
        header("Location: user_register.php");
        exit();
    }

    // Prepare an INSERT statement
    $sql = "INSERT INTO users (username, phone_number, password) VALUES (?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("sss", $param_username, $param_phone_number, $param_password);

        // Set parameters
        $param_username = $username;
        $param_phone_number = $phone_number;
        $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            // Redirect to login page after successful registration
            $_SESSION['success'] = "Registration successful. Please login.";
            header("Location: user_registrationsuccess.php");
            exit();
        } else {
            $_SESSION['error'] = "Oops! Something went wrong. Please try again later.";
            header("Location: user_register.php");
            exit();
        }
    }

    // Close statement
    $stmt->close();

    // Close connection
    $conn->close();
}
?>
