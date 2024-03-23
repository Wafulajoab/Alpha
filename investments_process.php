<?php
// Start or resume the session
session_start();

// Check if the user is logged in (you may need to modify this based on your authentication system)
if (!isset($_SESSION['username'])) {
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

// Get the logged-in user's username from the session
$username = $_SESSION['username'];

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $package_name = $_POST['package_name'];
    $amount = $_POST['amount'];
    $duration = $_POST['duration'];

    // Calculate the maturity date based on the current date and investment duration
    $maturity_date = date('Y-m-d', strtotime("+$duration days"));

    // Prepare and execute the SQL statement to insert data into the investments table
    $sql = "INSERT INTO investments (package_name, amount, duration, username, maturity_date) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sdis", $package_name, $amount, $duration, $username, $maturity_date);

    // Check if the statement executed successfully
    if ($stmt->execute()) {
        // Redirect to a success page or display a success message
        header("Location: success.php");
        exit();
    } else {
        // Handle the error, such as displaying an error message or redirecting to an error page
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
