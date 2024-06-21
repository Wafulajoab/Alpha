<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Investments</title>
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
            transition: margin-left 0.3s ease; /* Add transition for body sliding */
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
        
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 60px; /* Adjusted margin-top for content below the fixed navbar */
            transition: margin-left 0.3s ease; /* Add transition for sliding effect */
        }
        .container.shifted {
            margin-left: 200px; /* Adjust margin when navbar is shown */
        }
        
        .section {
            width: 100%;
            margin: 10px 0; /* Adjusted margin */
            padding: 20px;
            text-align: center;
            border-radius: 10px;
        }
        .investment-options-section {
            background-color: #ffcccb; /* Light salmon background */
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
        <li><a href="home_page.php"><i class="fas fa-home icon"></i>Dashboard</a></li>
        <li><a href="deposits.php"><i class="fas fa-money-bill-alt icon"></i>Deposit</a></li>
        <li><a href="summary.php"><i class="fas fa-file-alt icon"></i>Summary</a></li>
        <li><a href="investments.php"><i class="fas fa-chart-line icon"></i>Invest</a></li>
        <li><a href="active_investments.php"><i class="fas fa-chart-line icon"></i>Active Investments</a></li>
        <li><a href="withdraw.php"><i class="fas fa-credit-card icon"></i>Withdrawals</a></li>
        <li><a href="messages.php"><i class="fas fa-envelope icon"></i>Messages</a></li>
        <li><a href="logout.php"><i class="fas fa-sign-out-alt icon"></i>Logout</a></li>
   </ul>
</nav>
    <div class="container" id="container">
        <!-- Silver Package form -->
                 <!-- silver Package form -->
<div class="section investment-options-section bronze-package">
<img src="images/silver.jpg" alt="silver Package Image" style="width: 100px; height: 100px; border-radius: 50%;">

            <form action="process_investment.php" method="POST">
                <h3>Silver Package</h3>
                <p>Earn 15% after 3 days</p>
                <p>Minimum capital - Ksh 500 </p>
                <p>Maximum capital - Ksh 150,000 </p>
                <input type="hidden" name="package_name" value="Silver Package">
                <input type="number" name="amount" placeholder="Enter investment amount (Ksh)" style="width: 200px; height: 30px;" required>
                <input type="hidden" name="duration" value="3">
                <button type="submit">Invest Now</button>
            </form>
        </div>
    </div>

    <footer>
        <p>Company. <strong>All Rights Reserved.</strong> Designed By <a href="jmtech.php">JMTech</a></p>
    </footer>


    <script>
        // Function to toggle the navbar
        function toggleNavbar() {
            var navbar = document.getElementById('navbar');
            var container = document.getElementById('container');
            var body = document.body;
            navbar.classList.toggle('show');
            container.classList.toggle('shifted');
            body.classList.toggle('shifted'); // Slide the body content along with the navbar
        }
    </script>
</body>
</html>
