<?php
// Database connection
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ensure the connection is established
    if (!$conn) {
        die("Database connection failed. Please try again later.");
    }

    // Collect and sanitize user input
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $phone_number = mysqli_real_escape_string($conn, $_POST['phone_number']);
    $password = mysqli_real_escape_string($conn, $_POST['psw']);
    $password_confirm = mysqli_real_escape_string($conn, $_POST['psw-confirm']);
    $upline_username = mysqli_real_escape_string($conn, $_POST['upline_username']);

    // Check if passwords match
    if ($password !== $password_confirm) {
        die("Passwords do not match. Please go back and try again.");
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Check if upline username exists in the database
    $upline_check_query = "SELECT username FROM users WHERE username = '$upline_username' LIMIT 1";
    $upline_check_result = mysqli_query($conn, $upline_check_query);

    if (mysqli_num_rows($upline_check_result) == 0) {
        die("Upline username does not exist. Please go back and try again.");
    }

    // Insert user into database
    $query = "INSERT INTO users (username, phone_number, password, upline_username) VALUES ('$username', '$phone_number', '$hashed_password', '$upline_username')";

    if (mysqli_query($conn, $query)) {
        // Redirect to account activation page
        header("Location: account_activation.php");
        exit(); // Ensure no further code is executed
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
mysqli_close($conn);
?>
