<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Withdrawal</title>
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
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 60px; /* Adjusted margin-top for content below the fixed navbar */
        }
        .section {
            width: 30%;
            margin: 10px 0; /* Adjusted margin */
            padding: 20px;
            text-align: center;
            border-radius: 10px;
            background-color: #f0f0f0; /* Light gray background */
            color: #333; /* Dark text color */
        }
        button {
            background-color: green;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #8a2be2; /* Dark purple on hover */
        }
        .btn-back {
            background-color: #333;
        }
        .btn-logout {
            background-color: #f00; /* Red for logout button */
        }


        /* Add these styles to your existing CSS */

.logout {
    background-color: #8a2be2; /* Dark purple */
    color: white;
    padding: 10px 20px;
    border-radius: 5px;
    margin: 0 10px;
    text-decoration: none;
    transition: background-color 0.3s ease;
}

.logout:hover {
    background-color: #5f04b4; /* Dark purple on hover */
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
    </div>
<br><br><br><br>
    <div class="container">
        <div class="section">
        <form action="withdraw_process.php" method="POST">
    <h3>Withdrawal Section</h3>
    <div>
    <div>
    <h4>Account Balance</h4>
    <?php
    if (isset($total_balance)) {
        echo "<p>Ksh " . $total_balance . "</p>";
    } else {
        echo "<p>Account balance not available</p>";
    }
    ?>
</div>

</div>

    <div>
        <h4>Phone Number</h4>
        <input type="text" name="phone_number" placeholder="Enter your phone number" style="width: 200px; height: 30px;">
    </div>
    <div>
        <h4>Enter Amount</h4>
        <input type="number" name="withdraw_amount" placeholder="Enter withdrawal amount (Ksh)" style="width: 200px; height: 30px;">
    </div>
    <br>
    <button type="submit">Withdraw</button>
</form>

    </div>

    <a href="logout.php" class="logout"><i class="fas fa-sign-out-alt"></i> Logout</a>

    <!-- Footer -->
    <footer id="footer">
        <style>
            #footer {
                position: fixed;
                bottom: 0;
                left: 0;
                width: 100%;
                background: #444;
                text-align: center;
                padding: 0.01rem;
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
