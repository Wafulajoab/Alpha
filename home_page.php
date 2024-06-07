<?php
include "get_account_info.php"; // Include the PHP file with account info functions

// Check if a session is not already active before starting one
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Start the session
}

// Check if the username is set in the session
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username']; // Get the username from the session
} else {
    $username = 'Guest'; // Default to 'Guest' if username is not set in the session
}
?>
<br>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Font Awesome CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: darkgrey;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
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
            margin-left: 220px; /* Adjust margin-left for content to be next to the sidebar */
            padding: 20px;
            max-width: 1000px;
            width: 100%;
        }
        .section {
            width: 60%;
            margin: 20px 0;
            padding: 20px;
            text-align: center;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .total-deposits {
            background-color: #ffcccb; /* Light salmon background */
            color: #333; /* Dark text color */
        }
        .account-balance {
            background-color: #ff9999; /* Light coral background */
            color: #333; /* Dark text color */
        }
        .total-withdrawn {
            background-color: #99ff99; /* Light green background */
            color: #333; /* Dark text color */
        }
        .referral-earnings {
            background-color: #99ccff; /* Light sky blue background */
            color: #333; /* Dark text color */
        }
        .active-investments {
            background-color: #ff9999; /* Light coral background */
            color: #333; /* Dark text color */
        }
        .total-withdrawals {
            background-color: #ffcccb; /* Light salmon background */
            color: #333; /* Dark text color */
        }
        .username {
            position: absolute;
            top: 20px;
            left: 220px; /* Adjust position to the right of the navbar */
            color: black;
            font-weight: bold;
            font-size: 25px;
            font-family: Arial, sans-serif;
        }
        footer {
            position: fixed;
            bottom: 0;
            left: 200px; /* Adjust to be aligned with the container */
            width: calc(100% - 200px); /* Adjust width based on the navbar width */
            background: #444;
            text-align: center;
            padding: 0.01rem;
        }
        footer p {
            justify-content: center;
        }
        footer a {
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
    <!-- Main Content -->
    <div class="container">
        <div class="section total-deposits">
            <h3>Total Deposits Balance (Ksh.)</h3>
            <p><?php echo $totalDepositsBalance; ?></p>
        </div>
        <div class="section account-balance">
            <h3>Account Balance (Ksh.)</h3>
            <p><?php echo $accountBalance; ?></p>
        </div>
        <div class="section total-withdrawn">
            <h3>Total Withdrawn (Ksh.)</h3>
            <p><?php echo $totalWithdrawn; ?></p>
        </div>
        <div class="section referral-earnings">
            <h3>Referrals Earnings (Ksh.)</h3>
            <p><?php echo $referralsEarnings; ?></p>
        </div>
        <div class="section active-investments">
            <h3>Active Investments (Ksh.)</h3>
            <p><?php echo $activeInvestments; ?></p>
        </div>
    </div>

    <!-- Display Username -->
    <div class="username"><?php echo $username; ?></div>

    <!-- Footer -->
    <footer>
        <p>Company. <strong>All Rights Reserved.</strong> Designed By <a href="jmtech.php">JMTech</a></p>
    </footer>
</body>
</html>
