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
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        /* Menu icon styles */
        .menu-icon {
            color: white; /* Icon color */
            font-size: 40px; /* Icon size */
            margin-right: 10px; /* Right margin for spacing */
            cursor: pointer; /* Change cursor to pointer on hover */
            position: absolute; /* Position the icon */
            top: 10px; /* Adjust top position */
            left: 10px; /* Adjust left position */
            z-index: 1000; /* Ensure icon appears above other content */
            transition: left 0.3s ease; /* Add transition for sliding effect */
        }

        /* Navbar styles */
        .navbar {
            position: fixed;
            top: 0;
            left: -200px; /* Initially hide the navbar */
            width: 200px;
            height: 100vh;
            background-color: #444;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 0;
            transition: left 0.3s ease; /* Add transition for sliding effect */
        }

        .navbar.show {
            left: 0; /* Show the navbar */
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
            margin: 20px auto;
            padding: 20px;
            text-align: center;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
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
            width: 60%; /* Adjust width as needed */
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
        footer {
            position: fixed;
            bottom: 0;
            left: 0; /* Adjust to be aligned with the container */
            width: 100%; /* Adjust width based on the navbar width */
            background: #444;
            text-align: center;
            padding: 0.01rem;
            z-index: 999; /* Ensure it stays above other content */
        }
        footer p {
            justify-content: center;
            margin: 0; /* Remove default margin */
        }
        footer a {
            color: green;
            text-decoration: underline;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <!-- Menu Icon -->
    <i class="fas fa-bars menu-icon" onclick="toggleNavbar()"></i>
    
    <!-- Navigation Bar -->
    <nav class="navbar" id="navbar">
        <br><br><br>
        <h2>ALPHA FINANCE</h2>
        <ul>
            <li><a href="home_page.php"><i class="fas fa-home icon"></i>Home</a></li>
            <li><a href="deposits.php"><i class="fas fa-money-bill-alt icon"></i>Deposit</a></li>
            <li><a href="summary.php"><i class="fas fa-file-alt icon"></i>Summary</a></li>
            <li><a href="investments.php"><i class="fas fa-chart-line icon"></i>Invest</a></li>
            <li><a href="active_investments.php"><i class="fas fa-chart-line icon"></i>Active Investments</a></li>
            <li><a href="withdraw.php"><i class="fas fa-money-check-alt icon"></i>Cashout</a></li>
            <li><a href="profile.php"><i class="fas fa-user icon"></i>Profile</a></li>
        </ul>
    </nav>

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
            <input type="number" placeholder="Phone Number" style="width: 200px; height: 30px;">
        </div>
        <div class="section withdrawal-section">
            <h3>Enter Deposit Amount</h3>
            <input type="number" placeholder="Deposit Amount (Ksh)" style="width: 200px; height: 30px;">
        </div>
        <div class="section stk-push-section">
            <h3>STK PUSH</h3>
            <button>STK PUSH</button>
        </div>
        <br><br><br>
    </div>
   <!-- Footer -->
   <footer>
        <p>Company. <strong>All Rights Reserved.</strong> Designed By <a href="jmtech.php">JMTech</a></p>
    </footer>

    <!-- JavaScript -->
    <script>
        function toggleNavbar() {
            const navbar = document.getElementById('navbar');
            navbar.classList.toggle('show');
        }
    </script>
</body>
</html>


