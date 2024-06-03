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
            background-color: #f5f5f5;
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
            margin-left: 220px; /* Adjust margin-left for content to be next to the sidebar */
            padding: 20px;
            text-align: center; /* Center the content */
        }
        h1 {
            color: #333;
            text-align: center;
        }
        .investment-package {
            width: 40%; /* Set the width to 40% */
            margin: 20px auto; /* Center the divs and add margin for spacing */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
    <div class="navbar">
        <a href="home_page.php"><i class="fas fa-home icon"></i>Home</a>
        <a href="deposits.php"><i class="fas fa-money-bill-alt icon"></i>Deposit</a>
        <a href="summary.php"><i class="fas fa-file-alt icon"></i>Summary</a>
        <a href="investments.php"><i class="fas fa-chart-line icon"></i>Invest</a>
        <a href="updates.php"><i class="fas fa-bullhorn icon"></i>Updates</a>
        <a href="withdraw.php"><i class="fas fa-money-check-alt icon"></i>Cashout</a>
        <a href="profile.php"><i class="fas fa-user icon"></i>Profile</a>
    </div>
    
    <!-- Main Content -->
    <div class="container">
        <h1>Alpha Investments Launching Soon 💥💥</h1>
        <p><strong>Investment Packages</strong></p>

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
                            <td colspan="2"><button class="invest-btn" onclick="window.location.href='investments.php'">Invest Now</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="investment-package bronze-package">
            <h3>BRONZE PACKAGE 🥉</h3>
            <p>Earn 30% profits of your investments in 4 days</p>
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
                            <td>Ksh 195,500</td>
                        </tr>
                        <tr>
                            <td colspan="2"><button class="invest-btn" onclick="window.location.href='investments.php'">Invest Now</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="investment-package gold-package">
            <h3>GOLD PACKAGE 🥇</h3>
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
                            <td>Ksh 750</td>
                        </tr>
                        <tr>
                            <td>Ksh 1,000</td>
                            <td>Ksh 1,500</td>
                        </tr>
                        <tr>
                            <td>Ksh 2,000</td>
                            <td>Ksh 3,000</td>
                        </tr>
                        <tr>
                            <td>Ksh 150,000</td>
                            <td>Ksh 225,000</td>
                        </tr>
                        <tr>
                            <td colspan="2"><button class="invest-btn" onclick="window.location.href='investments.php'">Invest Now</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="investment-package executive-package">
            <h3>EXECUTIVE PACKAGE 💼</h3>
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
                            <td>Ksh 1,000</td>
                        </tr>
                        <tr>
                            <td>Ksh 1,000</td>
                            <td>Ksh 2,000</td>
                        </tr>
                        <tr>
                            <td>Ksh 2,000</td>
                            <td>Ksh 4,000</td>
                        </tr>
                        <tr>
                            <td>Ksh 150,000</td>
                            <td>Ksh 300,000</td>
                        </tr>
                        <tr>
                            <td colspan="2"><button class="invest-btn" onclick="window.location.href='investments.php'">Invest Now</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
<footer>
    <p>Company. <strong>All Rights Reserved.</strong> Designed By <a href="jmtech.php">JMTech</a></p>
</footer>
</html>
