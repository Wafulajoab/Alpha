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
            position: fixed;
            top: 0;
            left: 0;
            width: 200px;
            height: 100vh;
            background-color: #444;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 10px;
        }
        .navbar a {
            color: #fff;
            text-decoration: none;
            margin: 10px 0;
            border-radius: 25px;
        }
        .navbar .icon {
            font-size: 20px;
            margin-right: 15px;
        }
        .navbar ul {
            display: flex;
            flex-direction: column;
            list-style-type: none;
            padding: 0;
        }

        .navbar ul li {
            padding: .5rem;
            margin: .5rem 0;
        }

        .navbar ul li a {
            text-decoration: none;
            color: rgb(250, 246, 246);
            font-size: 1rem;
            font-weight: bold;
            display: flex;
            align-items: center;
        }

        .navbar h2 {
            font-size: 1.5rem;
            padding: 0.5px;
            margin: 1.5rem 0;
            font-family: Arial, sans-serif;
            color: rgb(250, 245, 245);
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
    <nav class="navbar">
        <h2>ALPHA FINANCE</h2>
        <ul>
            <li><a href="home_page.php"><i class="fas fa-home icon"></i>Home</a></li>
            <li><a href="deposits.php"><i class="fas fa-money-bill-alt icon"></i>Deposit</a></li>
            <li><a href="summary.php"><i class="fas fa-file-alt icon"></i>Summary</a></li>
            <li><a href="investments.php"><i class="fas fa-chart-line icon"></i>Invest</a></li>
            <li><a href="updates.php"><i class="fas fa-bullhorn icon"></i>Updates</a></li>
            <li><a href="withdraw.php"><i class="fas fa-money-check-alt icon"></i>Cashout</a></li>
            <li><a href="profile.php"><i class="fas fa-user icon"></i>Profile</a></li>
        </ul>
    </nav>

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
