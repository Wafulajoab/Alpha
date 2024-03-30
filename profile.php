<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Font Awesome CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .edit-profile-link, .logout {
            display: inline-block;
            padding: 10px 20px;
            background-color: #8a2be2;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .edit-profile-link:hover, .logout:hover {
            background-color: #5f04b4;
        }
         .navbar {
            background-color: #444;
            padding: 20px 0;
            text-align: center;
            position: fixed; /* Fixed positioning */
            top: 0; /* Fixed to the top */
            width: 100%; /* Full width */
        }
        .navbar a {
            color: #fff;
            text-decoration: none;
            margin: 0 20px;
            border-radius: 25px;
        }
        .navbar .icon {
            font-size: 20px;
            margin-right: 5px;
        }
        .footer {
            background: lavender;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
        }
        .footer a {
            color: green;
            text-decoration: underline;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <div class="navbar">
        <a href="home_page.php"><i class="fas fa-home icon"></i>Home</a>
        <a href="deposits.php"><i class="fas fa-money-bill-alt icon"></i>Deposit</a>
        <a href="summary.php"><i class="fas fa-file-alt"></i>Summary</a>
        <a href="investments.php"><i class="fas fa-chart-line icon"></i>Invest</a>
        <a href="updates.php"><i class="fas fa-bullhorn"></i>Updates</a>
        <a href="withdraw.php"><i class="fas fa-money-check-alt icon"></i>Cashout</a>
        <a href="profile.php"><i class="fas fa-user icon"></i>Profile</a>
</div>
<br><br><br><br>
    <div class="container">
        
            <?php
session_start(); // Start or resume the session

// Check if the 'username' session variable is set
if (!isset($_SESSION['username'])) {
    // Redirect the user to the login page or display an error message
    header("Location: login.php");
    exit(); // Stop further execution
}

// Assuming you have established a database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "alpha";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve user information based on their login details
$username = $_SESSION['username']; // Assuming 'username' is set in the session after login
$sql = "SELECT username, phone_number, balance FROM users WHERE username = '$username'"; // Update query to fetch existing columns
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Display user information in a table
    echo "<table>";
    echo "<tr><th>Attribute</th><th>Value</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>Username</td><td>" . $row["username"] . "</td></tr>";
        echo "<tr><td>Phone Number</td><td>" . $row["phone_number"] . "</td></tr>";
        echo "<tr><td>Balance</td><td>Ksh " . $row["balance"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>

        </table>


        <a href="logout.php" class="logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>

    <div class="footer">
        <p>Company. All Rights Reserved. Designed By <a href="jmtech.php">JMTech</a></p>
    </div>
</body>
</html>
