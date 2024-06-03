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
        .navbar {
            background-color: #444;
            padding: 20px 0;
            text-align: center;
            position: fixed;
            top: 0;
            left: 0;
            width: 200px; /* Set a fixed width for the sidebar */
            height: 100%; /* Full height */
        }
        .navbar a {
            display: block;
            color: #fff;
            text-decoration: none;
            margin: 10px 0;
            padding: 10px;
            border-radius: 25px;
            text-align: left;
            padding-left: 20px;
        }
        .navbar .icon {
            font-size: 20px;
            margin-right: 10px;
        }
        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            margin-left: 220px; /* To adjust for the sidebar */
        }
        .profile-info {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .profile-info h2 {
            margin-top: 0;
        }
        .profile-info p {
            margin: 10px 0;
            font-size: 16px;
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
        .footer {
            background: #444;
            text-align: center;
            padding: 0.01rem;
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
        <a href="summary.php"><i class="fas fa-file-alt icon"></i>Summary</a>
        <a href="investments.php"><i class="fas fa-chart-line icon"></i>Invest</a>
        <a href="updates.php"><i class="fas fa-bullhorn icon"></i>Updates</a>
        <a href="withdraw.php"><i class="fas fa-money-check-alt icon"></i>Cashout</a>
        <a href="profile.php"><i class="fas fa-user icon"></i>Profile</a>
    </div>

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
            // Display user information in a div
            echo "<div class='profile-info'>";
            echo "<h2>Profile Information</h2>";
            while ($row = $result->fetch_assoc()) {
                echo "<p><strong>Username:</strong> " . $row["username"] . "</p>";
                echo "<p><strong>Phone Number:</strong> " . $row["phone_number"] . "</p>";
                echo "<p><strong>Balance:</strong> Ksh " . $row["balance"] . "</p>";
            }
            echo "</div>";
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
        <a href="logout.php" class="logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>

    <div class="footer">
        <p>Company. All Rights Reserved. Designed By <a href="jmtech.php">JMTech</a></p>
    </div>
</body>
</html>
