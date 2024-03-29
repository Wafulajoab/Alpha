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
$database = "alpha";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the logged-in user's user_id from the session
$user_id = $_SESSION['user_id'];

// Fetch the username from the users table based on user_id
$sql_username = "SELECT username FROM users WHERE id = ?";
$stmt_username = $conn->prepare($sql_username);
$stmt_username->bind_param("i", $user_id);
$stmt_username->execute();
$result_username = $stmt_username->get_result();

if ($result_username->num_rows > 0) {
    // Fetch the username from the result set
    $row_username = $result_username->fetch_assoc();
    $username = $row_username['username'];

    // Get the form data
    $phone_number = $_POST['phone_number'];
    $deposit_amount = $_POST['deposit_amount'];

    // Prepare and execute the SQL statement to insert data into the deposits table
    $sql = "INSERT INTO deposits (user_id, username, phone_number, deposit_amount) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isds", $user_id, $username, $phone_number, $deposit_amount);

    // Check if the statement executed successfully
    if ($stmt->execute()) {
        // Redirect to a success page or display a success message
        header("Location: deposit_success.php");
        exit();
    } else {
        // Handle the error, such as displaying an error message or redirecting to an error page
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the statement
    $stmt->close();
} else {
    // Handle the case where the user does not exist
    echo "User not found.";
}

// Close the database connection
$conn->close();
?>
