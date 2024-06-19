<?php
session_start();

// Check if the admin is logged in
if (!isset($_SESSION['admin_username'])) {
    header("Location: admin_login.php");
    exit();
}

// Include the database connection file
include 'db_connection.php';

// Fetch dashboard data
$admin_username = $_SESSION['admin_username'];
// Include the database connection file
include 'db_connection.php';

// Fetch total number of users
$queryTotalUsers = "SELECT COUNT(*) AS total_users FROM users";
$resultTotalUsers = mysqli_query($conn, $queryTotalUsers);

if ($resultTotalUsers) {
    $rowTotalUsers = mysqli_fetch_assoc($resultTotalUsers);
    $totalUsers = $rowTotalUsers['total_users'];
} else {
    $totalUsers = 0; // Default value if the query fails
}
// Fetch total deposits (You need to implement the query and logic for total deposits)
$queryTotalDeposits = "SELECT SUM(amount) AS total_deposits FROM deposits WHERE status = 'completed'";
$resultTotalDeposits = mysqli_query($conn, $queryTotalDeposits);

if ($resultTotalDeposits) {
    $rowTotalDeposits = mysqli_fetch_assoc($resultTotalDeposits);
    $totalDeposits = $rowTotalDeposits['total_deposits'];
} else {
    $totalDeposits = 0.00; // Default value if the query fails
}

// Fetch total withdrawals (You need to implement the query and logic for total withdrawals)
$queryTotalWithdrawals = "SELECT SUM(amount) AS total_withdrawals FROM withdrawals WHERE status = 'completed'";
$resultTotalWithdrawals = mysqli_query($conn, $queryTotalWithdrawals);

if ($resultTotalWithdrawals) {
    $rowTotalWithdrawals = mysqli_fetch_assoc($resultTotalWithdrawals);
    $totalWithdrawals = $rowTotalWithdrawals['total_withdrawals'];
} else {
    $totalWithdrawals = 0.00; // Default value if the query fails
}

// Fetch total investments (You need to implement the query and logic for total investments)
$queryTotalInvestments = "SELECT SUM(amount) AS total_investments FROM investments WHERE status = 'active'";
$resultTotalInvestments = mysqli_query($conn, $queryTotalInvestments);

if ($resultTotalInvestments) {
    $rowTotalInvestments = mysqli_fetch_assoc($resultTotalInvestments);
    $totalInvestments = $rowTotalInvestments['total_investments'];
} else {
    $totalInvestments = 0.00; // Default value if the query fails
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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
            overflow-x: hidden;
        }
        .menu-icon {
            color: white;
            font-size: 40px;
            margin-right: 10px;
            cursor: pointer;
            position: absolute;
            top: 10px;
            left: 10px;
            z-index: 1000;
            transition: left 0.3s ease;
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
            margin-left: 0;
            padding: 20px;
            max-width: 1000px;
            width: 100%;
            transition: margin-left 0.3s ease;
        }
        .container.shifted {
            margin-left: 200px;
        }
        .section {
            width: 60%;
            margin: 20px 0;
            padding: 20px;
            text-align: center;
            border-radius: 100%;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .total-users {
            background-color: #ffcccb;
            color: #333;
        }
        .total-deposits {
            background-color: #ff9999;
            color: #333;
        }
        .total-withdrawals {
            background-color: #99ff99;
            color: #333;
        }
        .total-investments {
            background-color: #99ccff;
            color: #333;
        }
        .admin-name {
    position: absolute;
    top: 20px;
    left: 220px; /* Initial position */
    color: black;
    font-weight: bold;
    font-size: 25px;
    font-family: Arial, sans-serif;
    transition: left 0.3s ease; /* Transition property added */
}
.admin-name.slide-in {
    left: 20px; /* New position when sliding in */
}

        footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background: #444;
            text-align: center;
            padding: 0.01rem;
            z-index: 999;
        }
        footer p {
            justify-content: center;
            margin: 0;
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

        <h2>ADMIN PANEL</h2>
        <ul>
            <li><a href="admin_dashboard.php"><i class="fas fa-home icon"></i>Dashboard</a></li>
            <li><a href="admin_activation.php"><i class="fas fa-users icon"></i>Accounts Activation</a></li>
            <li><a href="admin_users.php"><i class="fas fa-users icon"></i>Manage Users</a></li>
            <li><a href="admin_deposits.php"><i class="fas fa-money-bill-alt icon"></i>Manage Deposits</a></li>
            <li><a href="admin_withdrawals.php"><i class="fas fa-credit-card icon"></i>Manage Withdrawals</a></li>
            <li><a href="admin_investments.php"><i class="fas fa-chart-line icon"></i>Manage Investments</a></li>
            <li><a href="admin_messages.php"><i class="fas fa-envelope icon"></i>Messages</a></li>
            <li><a href="admin_logout.php"><i class="fas fa-sign-out-alt icon"></i>Logout</a></li>
        </ul>
    </nav>
    <!-- Main Content -->
    <div class="container" id="container">
        
        <div class="admin-name">Welcome, Admin <?php echo htmlspecialchars($admin_username); ?>!</div>
        <div class="section total-users">
            <h2>Total Active Users</h2>
            <p><?php echo number_format($totalUsers); ?></p>
        </div>
        <div class="section total-deposits">
            <h2>Total Deposits</h2>
            <p>Ksh <?php echo number_format($totalDeposits, 2); ?></p>
        </div>
        <div class="section total-withdrawals">
            <h2>Total Withdrawals</h2>
            <p>Ksh <?php echo number_format($totalWithdrawals, 2); ?></p>
        </div>
        <div class="section total-investments">
            <h2>Total Investments</h2>
            <p>Ksh <?php echo number_format($totalInvestments, 2); ?></p>
        </div>
    </div>
    <footer>
        <p>Company. <strong>All Rights Reserved.</strong> Designed By <a href="jmtech.php">JMTech</a></p>
    </footer>

    <script>
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
