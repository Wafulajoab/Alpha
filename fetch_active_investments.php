<?php
// Include your database connection file
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

// Get active investments from the active_investments table
$sql = "SELECT * FROM active_investments";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Display active investments
    while ($row = $result->fetch_assoc()) {
        echo "<div>";
        echo "<p>Username: " . $row['username'] . "</p>";
        echo "<p>Package Name: " . $row['package_name'] . "</p>";
        echo "<p>Amount: Ksh " . $row['amount'] . "</p>";
        echo "<p>Duration: " . $row['duration'] . " days</p>";
        echo "<p>Maturity Date: " . $row['maturity_date'] . "</p>";
        echo "</div>";
    }
} else {
    echo "No active investments.";
}

// Close the database connection
$conn->close();
?>
