<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alpha Investments</title>
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

        .navbar {
            position: fixed;
            top: 0;
            left: -200px;
            width: 200px;
            height: 100vh;
            background-color: #444;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 0;
            transition: left 0.3s ease;
            overflow-y: auto; /* Added for scrollbar */
        }
        .navbar.show {
            left: 0;
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
            padding: .2rem;
            margin: .2rem 0;
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

       /* Main Content */
.container {
    padding: 20px;
    text-align: center; /* Center the content */
    transition: margin-left 0.3s ease; /* Add transition for sliding effect */
}

/* Grid Container for Investment Packages */
.investment-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr); /* 2 columns */
    gap: 20px; /* Space between grid items */
    margin-top: 20px;
}

/* Individual Investment Package */
.investment-package {
    margin: 0; /* Remove margin since grid-gap handles spacing */
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s, box-shadow 0.3s; /* Add hover effect transition */
}


        .container.shifted {
            margin-left: 200px; /* Shift content to the right when navbar is shown */
        }

        h1 {
            color: #333;
            text-align: center;
        }


        .silver-package {
            background-color: #e6f2ff; /* Light blue */
        }

        .bronze-package {
            background-color: #ffebcc; /* Light orange */
        }

        .gold-package {
            background-color: #fff0b3; /* Light yellow */
        }

        .executive-package {
            background-color: #e6ffe6; /* Light green */
        }

        .investment-package h3 {
            color: #007bff;
        }

        .investment-package p {
            margin: 10px 0;
        }

        .investment-calculator {
            margin-top: 20px;
        }

        .investment-calculator table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .investment-calculator th, .investment-calculator td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        .invest-btn {
            background-color: green;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .invest-btn:hover {
            background-color: #4CAF50; /* Dark green on hover */
        }

        footer {
        position: fixed;
        bottom: 0;
        left: 0; /* Start from the left edge of the screen */
        width: 100%; /* Full width */
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
       

        <div class="image" style="text-align: center; margin-top: 20px;">
         <img src="images/alpha.webp" class="image2" alt="avatar" style="width: 60px; height: 60px; border-radius: 50%; border: 2px solid #444;">
            </div>

        <h2>ALPHA FINANCE</h2>
        <ul>
   <li><a href="home_page.php"><i class="fas fa-home icon"></i>Dashboard</a></li>
   <li><a href="deposits.php"><i class="fas fa-money-bill-alt icon"></i>Deposit</a></li>
   <li><a href="summary.php"><i class="fas fa-file-alt icon"></i>Summary</a></li>
   <li><a href="investments.php"><i class="fas fa-chart-line icon"></i>Invest</a></li>
   <li><a href="active_investments.php"><i class="fas fa-chart-line icon"></i>Active Investments</a></li>
   <li><a href="withdraw.php"><i class="fas fa-credit-card icon"></i>Withdrawals</a></li>
   <li><a href="referral.php"><i class="fas fa-user-friends icon"></i>Referral</a></li>
   <li><a href="customer_care.php"><i class="fas fa-headset icon"></i>Customer Care</a></li> <!-- Customer Care Module -->
   <li><a href="logout.php"><i class="fas fa-sign-out-alt icon"></i>Logout</a></li>
</ul>


    </nav>

    <div class="container" id="mainContent">
    <div class="image" style="text-align: center; margin-top: 20px;">
        <img src="images/alpha.webp" class="image2" alt="avatar" style="width: 60px; height: 60px; border-radius: 50%; border: 2px solid #444;">
    </div>
    <h1>Alpha Investments Launching Soon 💥💥</h1>

    <p><strong>Investment Packages</strong></p>

    <div class="investment-grid">
        <div class="investment-package silver-package">
            <h3>SILVER PACKAGE 🥈</h3>
            <p>Earn 15% profits of your investments in 3 days</p>
            <div class="investment-calculator">
                <p>Investment calculator for Silver Package</p>
                <table>
                    <thead>
                        <tr>
                            <th>Investment</th>
                            <th>Reward</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Ksh 500</td>
                            <td>Ksh 575</td>
                        </tr>
                        <tr>
                            <td>Ksh 1,000</td>
                            <td>Ksh 1,150</td>
                        </tr>
                        <tr>
                            <td>Ksh 2,000</td>
                            <td>Ksh 2,300</td>
                        </tr>
                        <tr>
                            <td>Ksh 150,000</td>
                            <td>Ksh 172,500</td>
                        </tr>
                        <tr>
                            <td colspan="2"><button class="invest-btn" onclick="window.location.href='silver_package.php'">Invest Now</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="investment-package bronze-package">
            <h3>BRONZE PACKAGE 🥉</h3>
            <p>Earn 25% profits of your investments in 4 days</p>
            <div class="investment-calculator">
                <p>Investment calculator for Bronze Package</p>
                <table>
                    <thead>
                        <tr>
                            <th>Investment</th>
                            <th>Reward</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Ksh 500</td>
                            <td>Ksh 650</td>
                        </tr>
                        <tr>
                            <td>Ksh 1,000</td>
                            <td>Ksh 1,300</td>
                        </tr>
                        <tr>
                            <td>Ksh 2,000</td>
                            <td>Ksh 2,600</td>
                        </tr>
                        <tr>
                            <td>Ksh 150,000</td>
                            <td>Ksh 195,000</td>
                        </tr>
                        <tr>
                            <td colspan="2"><button class="invest-btn" onclick="window.location.href='bronze_package.php'">Invest Now</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="investment-package gold-package">
            <h3>GOLD PACKAGE 🏆</h3>
            <p>Earn 50% profits of your investments in 6 days</p>
            <div class="investment-calculator">
                <p>Investment calculator for Gold Package</p>
                <table>
                    <thead>
                        <tr>
                            <th>Investment</th>
                            <th>Reward</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Ksh 500</td>
                            <td>Ksh 725</td>
                        </tr>
                        <tr>
                            <td>Ksh 1,000</td>
                            <td>Ksh 1,450</td>
                        </tr>
                        <tr>
                            <td>Ksh 2,000</td>
                            <td>Ksh 2,900</td>
                        </tr>
                        <tr>
                            <td>Ksh 150,000</td>
                            <td>Ksh 217,500</td>
                        </tr>
                        <tr>
                            <td colspan="2"><button class="invest-btn" onclick="window.location.href='gold_package.php'">Invest Now</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="investment-package executive-package">
            <h3>EXECUTIVE PACKAGE 💎</h3>
            <p>Earn 100% profits of your investments in 10 days</p>
            <div class="investment-calculator">
                <p>Investment calculator for Executive Package</p>
                <table>
                    <thead>
                        <tr>
                            <th>Investment</th>
                            <th>Reward</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Ksh 500</td>
                            <td>Ksh 800</td>
                        </tr>
                        <tr>
                            <td>Ksh 1,000</td>
                            <td>Ksh 1,600</td>
                        </tr>
                        <tr>
                            <td>Ksh 2,000</td>
                            <td>Ksh 3,200</td>
                        </tr>
                        <tr>
                            <td>Ksh 150,000</td>
                            <td>Ksh 240,000</td>
                        </tr>
                        <tr>
                            <td colspan="2"><button class="invest-btn" onclick="window.location.href='executive_package.php'">Invest Now</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<br><br><br>
    
    <footer>
        <p>Company. <strong>All Rights Reserved.</strong> Designed By <a href="jmtech.php">JMTech</a></p>
    </footer>


    <script>
        // JavaScript to handle menu icon click and toggle the navbar
        function toggleNavbar() {
        const navbar = document.getElementById('navbar');
        const container = document.querySelector('.container');
        const menuIcon = document.querySelector('.menu-icon');
        const isOpen = navbar.classList.contains('show');
        
        if (isOpen) {
            navbar.classList.remove('show');
            container.style.marginLeft = '0';
            menuIcon.style.left = '10px';
        } else {
            navbar.classList.add('show');
            container.style.marginLeft = '200px';
            menuIcon.style.left = '210px';
        }
    }
    </script>
</body>
</html>
