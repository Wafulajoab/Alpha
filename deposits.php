<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deposits</title>
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
            margin: 2px 0; /* Adjusted margin */
            padding: 20px;
            text-align: center;
            border-radius: 10px;
        }
        .phone-number-section {
            background-color: #ffcccb; /* Light salmon background */
            color: #333; /* Dark text color */
            
        }
        .withdrawal-section {
            background-color: #99ff99; /* Light green background */
            color: #333; /* Dark text color */
        }
        .account-balance-section {
            background-color: #ff9999; /* Light coral background */
            color: #333; /* Dark text color */
        }
        .stk-push-section {
            background-color: #ffcccb; /* Light salmon background */
            color: #333; /* Dark text color */
        }
        button {
            background-color: black;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #8a2be2;
        }

        .payment-details-section {
        background-color: #ccffff; /* Light blue background */
        color: #333; /* Dark text color */
        border-radius: 10px;
        margin: 20px 0; /* Adjusted margin */
        padding: 10px;
        text-align: center;
        margin: 0 auto; /* Center align horizontally */
        width: 41%; /* Adjust width as needed */
    }

    .payment-details-section h3 {
        margin-bottom: 10px; /* Adjusted margin */
    }

    .payment-details-section p {
        margin-bottom: 5px; /* Adjusted margin */
    }


    
   
    .upload-section h3 {
        margin-bottom: 10px; /* Adjusted margin */
    }

    .upload-section input[type="file"] {
        margin-bottom: 15px; /* Adjusted margin */
    }

    .upload-section button {
        background-color: #008080; /* Teal background */
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .upload-section button:hover {
        background-color: #006666; /* Darker teal on hover */
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
        <a href="withdraw.php"><i class="fas fa-money-check-alt icon"></i>Cashout</a>
        <a href="profile.php"><i class="fas fa-user icon"></i>Profile</a>
</div>
<br>

    <div class="container">
    <div class="section payment-details-section">
        <h3>Payment Details</h3>
        <p>Paybill Number: 123456</p>
        <p>Account Number: 7890123456</p>
        <p>Bank Name: IM BANK</p>

        <h3>Upload Deposit Receipt</h3>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <input type="file" accept="image/*" id="deposit-receipt" name="deposit-receipt">
            <button type="submit">Submit</button>
        </form>
    </div>

        <div class="section account-balance-section">
            <h3>Total Account Balance (Ksh)</h3>
            <p>50,000</p> <!-- Example balance, replace with actual balance -->
        </div>

        <div class="section phone-number-section">
            <h3>Enter Your Phone Number</h3>
            <input text="number" placeholder="Phone Number"style="width: 200px; height: 30px;">
        </div>
        <div class="section withdrawal-section">
            <h3>Enter Deposit Amount</h3>
            <input text="number" placeholder="Deposit Amount (Ksh)"style="width: 200px; height: 30px;">
        </div>
     
        <div class="section stk-push-section">
            <h3>STK PUSH</h3>
            <button>STK PUSH</button>
        </div>
    </div>
    <br><br><br>
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
