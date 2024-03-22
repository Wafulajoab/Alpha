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
    <div class="navbar">
    <div class="navbar">
    <a href="home_page.php"><i class="fas fa-home icon"></i>Home</a>
    <a href="deposits.php"><i class="fas fa-money-bill-alt icon"></i>Deposit</a>
    <a href="investments.php"><i class="fas fa-chart-line icon"></i>Invest</a>
    <a href="withdraw.php"><i class="fas fa-money-check-alt icon"></i>Cashouts</a>
    <a href="profile.php"><i class="fas fa-user icon"></i>Profile</a>
 

    
</div>

    </div>
<br><br><br><br>
    <div class="container">
        <div class="section">
            <h3>Withdrawal Section</h3>
            <div>
                <h4>Account Balance</h4>
                <p>Ksh 1000</p> <!-- Example account balance, replace with actual balance -->
            </div>
            
            <div>
                <h4>Phone Number</h4>
                <input text="number" placeholder="Enter your phone number" style="width: 200px; height: 30px;">
            </div>
            <div>
                <h4>Enter Amount</h4>
                <input text="number" placeholder="Enter withdrawal amount (Ksh)" style="width: 200px; height: 30px;">
              
            </div>
            <br>
            <button>Withdraw</button>
        </div>
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
