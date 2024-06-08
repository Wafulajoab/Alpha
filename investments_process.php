<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "alpha";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $package_name = $_POST['package_name'];
    $amount = $_POST['amount'];
    $duration = $_POST['duration'];
    $username = 'some_user'; // Replace with actual username logic

    // Calculate maturity date
    $maturity_date = date('Y-m-d H:i:s', strtotime("+$duration days"));

    // Insert investment details into the database
    $sql = "INSERT INTO investments (username, package_name, duration, maturity_date, status, amount) VALUES ('$username', '$package_name', '$duration', '$maturity_date', 'Active', '$amount')";

    if ($conn->query($sql) === TRUE) {
        echo "New investment created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    header("Location: active_investments.php"); // Redirect to active investments page
    exit();
}
?>
