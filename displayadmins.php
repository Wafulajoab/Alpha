<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "alpha";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve admins data from the database
$sql = "SELECT * FROM admins";
$result = $conn->query($sql);

// Check if there are admins in the database
if ($result->num_rows > 0) {
    echo "<div class='navbar' style='position: fixed; top: 0; left: 0; width: 100%; background-color: green; padding: 30px; text-align: center;'>";
    echo "<a href='displayadmins.php' style='color: white; text-decoration: none; padding: 10px; font-weight: bold; background-color: transparent; border-radius: 25px; margin: 25px; border: 2px solid white;'>Admins</a>";
    echo "<a href='display_users.php' style='color: white; text-decoration: none; padding: 10px; font-weight: bold; background-color: transparent; border-radius: 25px; margin: 25px; border: 2px solid white;'>User Management</a>";
    echo "<a href='display_investments.php' style='color: white; text-decoration: none; padding: 10px; font-weight: bold; background-color: transparent; border-radius: 25px; margin: 25px; border: 2px solid white;'>Investments Records</a>";
    echo "<a href='admin_announcements.php' style='color: white; text-decoration: none; padding: 10px; font-weight: bold; background-color: transparent; border-radius: 25px; margin: 25px; border: 2px solid white;'>Post Announcements</a>";
    echo "<a href='cashouts_records.php' style='color: white; text-decoration: none; padding: 10px; font-weight: bold; background-color: transparent; border-radius: 25px; margin: 25px; border: 2px solid white;'>Cashouts</a>";
    echo "<style>";
    echo ".navbar a:active {";
        echo "body { background-color: darkgrey; }"; // Styling for body background color
    echo "}";
    echo "</style>";
    echo "</div>";

    echo "<div style='width: 80%; margin: 0 auto; padding-top: 70px;'>"; // Adjust padding-top to accommodate navbar height
    echo "<div class='image' style='text-align: center; margin-top: 60px;'>";
    // echo "<img src='images/aplha.webp' class='image2' alt='avatar' style='max-width: 5%; height:auto;'>";
    echo "</div>";
    echo "<h2 style='text-align: center;'>Admins List</h2>";
    echo "<table style='border-collapse: collapse; width: 80%; margin: 0 auto;'>";
    echo "<tr style='border-bottom: 1px solid black;'><th style='border-right: 1px solid black; padding: 8px;'>Serial No.</th><th style='border-right: 1px solid black; padding: 8px;'>Work ID</th><th style='border-right: 1px solid black; padding: 8px;'>Rank</th><th style='border-right: 1px solid black; padding: 8px;'>Username</th><th style='padding: 8px;'>Actions</th></tr>";

    // Initialize serial number
    $serial = 1;

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr style='border-bottom: 1px solid black;'>";
        echo "<td style='border-right: 1px solid black; padding: 8px;'>" . $serial . "</td>";
        echo "<td style='border-right: 1px solid black; padding: 8px;'>" . $row["work_id"] . "</td>";
        echo "<td style='border-right: 1px solid black; padding: 8px;'>" . $row["rank"] . "</td>";
        echo "<td style='border-right: 1px solid black; padding: 8px;'>" . $row["username"] . "</td>";

        // Check if the admin is the Chief Security Officer (CSO)
        if ($row["rank"] == "Chief Executive Officer") {
            echo "<td style='padding: 8px;'>Super User (CEO)</td>"; // Display as super user for CSO
        } else {
            // Display regular actions for other admins
            echo "<td style='padding: 8px;'><a href='add_admin.php'>Add Admin</a> | <a href='delete_admin.php?id=" . $row["id"] . "' onclick='return confirm(\"Are you sure you want to delete this admin?\");'>Delete Admin</a></td>";
        }

        echo "</tr>";
        $serial++;
    }

    echo "</table>";

    // Add button link for super user (CSO) to add another admin
    echo "<div style='text-align: center; margin-top: 20px;'>";
    echo "<a href='add_admin.php' style='color: white; text-decoration: none; padding: 10px; font-weight: bold; background-color: green; border-radius: 25px; margin: 25px; border: 2px solid white;'>Add Another Admin</a>";
    echo "</div>";

    echo "</div>";
} else {
    echo "No admins found.";
}

// Close connection
$conn->close();
?>
<br><br><br><br>
<footer id="footer">
    <style>
        #footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background: lavender;
            text-align: center;
            padding: 0.1rem;
        }

        .footer p {
            justify-content: center;
        }

        .footer a {
            color: green;
            text-decoration: underline;
            font-weight: bold;
        }
    </style>
    <div class="footer">
        <p><span>Company.<strong>All Rights Reserved.</strong>Designed By <a href="jmtech.php">JMTech</a></span></p>
    </div>
</footer>
