<?php
// Database connection details
$servername = "localhost";
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "alpha";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch active investments
$sql = "SELECT investment_id, package_name, amount, duration, maturity_date, status FROM investments WHERE status = 'active'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>Investment ID</th><th>Package Name</th><th>Amount</th><th>Duration</th><th>Maturity Date</th><th>Status</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['investment_id'] . "</td>";
        echo "<td>" . $row['package_name'] . "</td>";
        echo "<td>" . $row['amount'] . "</td>";
        echo "<td>" . $row['duration'] . "</td>";
        echo "<td>" . $row['maturity_date'] . "</td>";
        echo "<td>" . $row['status'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No active investments found.";
}

// Close the connection
$conn->close();
?>
