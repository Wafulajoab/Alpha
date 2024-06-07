<?php
// Start or resume the session
session_start();

// Check if the user is logged in (you may need to modify this based on your authentication system)
if (!isset($_SESSION['user_id'])) {
    // Redirect the user to the login page or handle the case where the user is not logged in
    header("Location: login.php");
    exit();
}

// Database connection details for "alpha" database
$servername = "localhost";
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "alpha";

// Create a new MySQLi connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the user's phone number and deposit amount from the form
    $phone_number = $_POST['phone_number'];
    $deposit_amount = $_POST['deposit_amount'];

    // Retrieve the user's ID from the session (you may need to adjust this based on your session structure)
    $user_id = $_SESSION['user_id'];

    // Update the user's wallet balance in the database
    $sql = "UPDATE users SET wallet = wallet + ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("di", $deposit_amount, $user_id); // "di" stands for double (amount) and integer (user ID)

    if ($stmt->execute()) {
        echo "Deposit successful. Your wallet has been updated.";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and the connection
    $stmt->close();
    $conn->close();
}
?>
