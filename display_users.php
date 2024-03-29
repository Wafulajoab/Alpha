<?php
// Database connection parameters
$servername = "localhost"; // Change this if your MySQL server is hosted elsewhere
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "alpha"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to retrieve user information (excluding 'registration_time' column)
$sql = "SELECT id, username, phone_number FROM users";
$result = $conn->query($sql);

// Display user information in a table with serial numbers
echo "<div class='navbar' style='position: fixed; top: 0; left: 0; width: 100%; background-color: green; padding: 30px; text-align: center;'>";
echo "<a href='displayadmins.php' style='color: white; text-decoration: none; padding: 10px; font-weight: bold; background-color: transparent; border-radius: 25px; margin: 25px; border: 2px solid white;'>Admins</a>";
echo "<a href='display_users.php' style='color: white; text-decoration: none; padding: 10px; font-weight: bold; background-color: transparent; border-radius: 25px; margin: 25px; border: 2px solid white;'>User Management</a>";
echo "<a href='display_investments.php' style='color: white; text-decoration: none; padding: 10px; font-weight: bold; background-color: transparent; border-radius: 25px; margin: 25px; border: 2px solid white;'>Investments Records</a>";
    echo "<a href='admin_announcements.php' style='color: white; text-decoration: none; padding: 10px; font-weight: bold; background-color: transparent; border-radius: 25px; margin: 25px; border: 2px solid white;'>Post Announcements</a>";
    echo "<a href='cashouts_records.php' style='color: white; text-decoration: none; padding: 10px; font-weight: bold; background-color: transparent; border-radius: 25px; margin: 25px; border: 2px solid white;'>Cashouts</a>";
echo "</div>";

echo "<div style='width: 80%; margin: 0 auto; padding-top: 80px;'>"; // Adjust padding-top to accommodate navbar height
echo "<table border='1' style='border-collapse: collapse; margin: 0 auto; width: 80%;'>";
echo "<tr><th style='border: 1px solid black;'>Serial No.</th><th style='border: 1px solid black;'>Username</th><th style='border: 1px solid black;'>Phone Number</th><th style='border: 1px solid black;'>Actions</th></tr>";

if ($result->num_rows > 0) {
    $serial = 1; // Initialize serial number
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td style='border: 1px solid black;'>" . $serial . "</td>";
        echo "<td style='border: 1px solid black;'>" . $row["username"] . "</td>";
        echo "<td style='border: 1px solid black;'>" . $row["phone_number"] . "</td>";
        echo "<td style='border: 1px solid black;'>";
        echo "<a href='add_user.php' style='color: blue;'>Add User</a> | ";
        echo "<a href='delete_user.php?id=" . $row["id"] . "' style='color: red;' onclick='return confirm(\"Are you sure you want to delete this user?\")'>Delete User</a>";
        echo "</td>";
        echo "</tr>";
        $serial++; // Increment serial number
    }
} else {
    echo "<tr><td colspan='4'>No users found</td></tr>";
}

echo "</table>";
echo "</div>";

// Footer
echo "<footer id='footer' style='position: fixed; bottom: 0; left: 0; width: 100%; background-color: lavender; text-align: center; padding: 0.5rem;'>";
echo "<p><span>Company. <strong>All Rights Reserved.</strong> Designed By <a href='jmtech.php'>JMTech</a></span></p>";
echo "</footer>";

// Close connection
$conn->close();
?>
