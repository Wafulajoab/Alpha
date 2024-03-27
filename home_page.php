<?php
include "get_account_info.php"; // Include the PHP file with account info functions
?>

<?php
session_start(); // Start the session

// Check if the username is set in the session
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username']; // Get the username from the session
} else {
    $username = 'Guest'; // Default to 'Guest' if username is not set in the session
}
?>

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
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 60px; /* Adjusted margin-top for content below the fixed navbar */
        }
        .section {
            width: 40%;
            margin: 2px 0;
            padding: 2px;
            text-align: center;
            border-radius: 10px;
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
            left: 20px;
            color: yellow;
            font-weight: bold;
            font-size: 25px;
            font-family: Arial, sans-serif;
        
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
    </div>


<br><br><br>
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
        <!-- <div class="section total-withdrawals">
            <h3>Total Matured Investments (Ksh.)</h3>
            <p><?php echo $totalMaturedInvestments; ?></p>
        </div> -->
    </div>

<!-- Display username -->
<div class="username"><?php echo $username; ?></div>

<br><br><br><br>
     <!-- Footer -->
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

</body>
</html>
