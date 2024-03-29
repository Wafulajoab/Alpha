<?php
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

// Query to fetch all data from the withdrawals table
$sql = "SELECT * FROM withdrawals";
$result = $conn->query($sql);

// Start HTML output
echo "<!DOCTYPE html>";
echo "<html lang='en'>";
echo "<head>";
echo "<meta charset='UTF-8'>";
echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
echo "<title>Withdrawals Records</title>";
echo "<style>";
echo "body { background-color: darkgrey; }"; // Styling for body background color
echo ".container { width: 80%; margin: 0 auto; padding-top: 80px; }"; // Styling for container div
echo "table { border-collapse: collapse; width: 100%; }"; // Styling for table
echo "th, td { border: 1px solid black; padding: 8px; }"; // Styling for table cells
echo "</style>";
echo "</head>";
echo "<body>";

// Navigation bar
echo "<div class='navbar' style='position: fixed; top: 0; left: 0; width: 100%; background-color: green; padding: 30px; text-align: center;'>";
echo "<a href='displayadmins.php' style='color: white; text-decoration: none; padding: 10px; font-weight: bold; background-color: transparent; border-radius: 25px; margin: 25px; border: 2px solid white;'>Admins</a>";
echo "<a href='display_users.php' style='color: white; text-decoration: none; padding: 10px; font-weight: bold; background-color: transparent; border-radius: 25px; margin: 25px; border: 2px solid white;'>User Management</a>";
echo "<a href='display_investments.php' style='color: white; text-decoration: none; padding: 10px; font-weight: bold; background-color: transparent; border-radius: 25px; margin: 25px; border: 2px solid white;'>Investments Records</a>";
echo "<a href='admin_announcements.php' style='color: white; text-decoration: none; padding: 10px; font-weight: bold; background-color: transparent; border-radius: 25px; margin: 25px; border: 2px solid white;'>Post Announcements</a>";
echo "<a href='cashouts_records.php' style='color: white; text-decoration: none; padding: 10px; font-weight: bold; background-color: transparent; border-radius: 25px; margin: 25px; border: 2px solid white;'>Cashouts</a>";
echo "</div>";

// Container div for the table
echo "<div class='container'>";

// Table for withdrawals records
echo "<h2 style='text-align: center;'>Withdrawals Records</h2>";
echo "<table border='1'>";
echo "<tr><th>Serial No.</th><th>User ID</th><th>Username</th><th>Amount</th><th>Date</th><th>Status</th></tr>";

if ($result->num_rows > 0) {
    $serial = 1; // Initialize serial number
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $serial . "</td>";
        echo "<td>" . $row["user_id"] . "</td>";
        echo "<td>" . $row["username"] . "</td>";
        echo "<td>" . $row["amount"] . "</td>";
        echo "<td>" . $row["date"] . "</td>";
        echo "<td>" . $row["status"] . "</td>";
        echo "</tr>";
        $serial++; // Increment serial number
    }
} else {
    echo "<tr><td colspan='6'>No withdrawals found</td></tr>";
}

echo "</table>";


echo "<div>";
echo "<a href='javascript:history.go(-1);' id='go-back-link' style='background-color: blue; border-color: darkblue; margin: 10px; padding: 10px; border-radius: 25px; color: white; font-weight: bold; text-decoration: none; display: inline-block; cursor: pointer; transition: background-color 0.3s, border-color 0.3s;'>Go Back</a>";
echo "<a href='logout.php' class='button logout-btn' style='background-color: red; border-color: darkred; margin: 10px; padding: 10px; border-radius: 25px; color: white; font-weight: bold; cursor: pointer; transition: background-color 0.3s, border-color 0.3s;'>Logout</a>";
echo "</div>";
// Close container div
echo "</div>";

// Footer
echo "<footer id='footer' style='position: fixed; bottom: 0; left: 0; width: 100%; background-color: lavender; text-align: center; padding: 0.5rem;'>";
echo "<p><span>Company. <strong>All Rights Reserved.</strong> Designed By <a href='jmtech.php'>JMTech</a></span></p>";
echo "</footer>";

// End HTML output
echo "</body>";
echo "</html>";

// Close the database connection
$conn->close();
?>
