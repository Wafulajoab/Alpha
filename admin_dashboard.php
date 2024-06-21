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

// Fetch total number of users
$queryTotalUsers = "SELECT COUNT(*) AS total_users FROM users";
$resultTotalUsers = mysqli_query($conn, $queryTotalUsers);

if ($resultTotalUsers) {
    $rowTotalUsers = mysqli_fetch_assoc($resultTotalUsers);
    $totalUsers = $rowTotalUsers['total_users'];
} else {
    $totalUsers = 0; // Default value if the query fails
}

// Fetch total approved deposits
$queryTotalApprovedDeposits = "SELECT SUM(amount) AS total_approved_deposits FROM deposits WHERE status = 'approved'";
$resultTotalApprovedDeposits = mysqli_query($conn, $queryTotalApprovedDeposits);

if ($resultTotalApprovedDeposits) {
    $rowTotalApprovedDeposits = mysqli_fetch_assoc($resultTotalApprovedDeposits);
    $totalApprovedDeposits = $rowTotalApprovedDeposits['total_approved_deposits'];
} else {
    $totalApprovedDeposits = 0.00; // Default value if the query fails
}

// Fetch total withdrawals (both approved and rejected)
$queryTotalApprovedWithdrawals = "SELECT SUM(amount) AS total_approved_withdrawals FROM withdrawals WHERE status = 'approved'";
$resultTotalApprovedWithdrawals = mysqli_query($conn, $queryTotalApprovedWithdrawals);

if ($resultTotalApprovedWithdrawals) {
    $rowTotalApprovedWithdrawals = mysqli_fetch_assoc($resultTotalApprovedWithdrawals);
    $totalApprovedWithdrawals = $rowTotalApprovedWithdrawals['total_approved_withdrawals'];
} else {
    $totalApprovedWithdrawals = 0.00; // Default value if the query fails
}

// Fetch total rejected withdrawals
$queryTotalRejectedWithdrawals = "SELECT SUM(amount) AS total_rejected_withdrawals FROM withdrawals WHERE status = 'rejected'";
$resultTotalRejectedWithdrawals = mysqli_query($conn, $queryTotalRejectedWithdrawals);

if ($resultTotalRejectedWithdrawals) {
    $rowTotalRejectedWithdrawals = mysqli_fetch_assoc($resultTotalRejectedWithdrawals);
    $totalRejectedWithdrawals = $rowTotalRejectedWithdrawals['total_rejected_withdrawals'];
} else {
    $totalRejectedWithdrawals = 0.00; // Default value if the query fails
}

// Calculate total withdrawals (sum of approved and rejected)
$totalWithdrawals = $totalApprovedWithdrawals + $totalRejectedWithdrawals;

// Fetch total investments
$queryTotalInvestments = "SELECT SUM(amount) AS total_investments FROM investments WHERE status = 'active'";
$resultTotalInvestments = mysqli_query($conn, $queryTotalInvestments);

if ($resultTotalInvestments) {
    $rowTotalInvestments = mysqli_fetch_assoc($resultTotalInvestments);
    $totalInvestments = $rowTotalInvestments['total_investments'];
} else {
    $totalInvestments = 0.00; // Default value if the query fails
}

// Fetch total matured investments
$queryTotalMaturedInvestments = "SELECT SUM(amount) AS total_matured_investments FROM investments WHERE status = 'matured'";
$resultTotalMaturedInvestments = mysqli_query($conn, $queryTotalMaturedInvestments);

if ($resultTotalMaturedInvestments) {
    $rowTotalMaturedInvestments = mysqli_fetch_assoc($resultTotalMaturedInvestments);
    $totalMaturedInvestments = $rowTotalMaturedInvestments['total_matured_investments'];
} else {
    $totalMaturedInvestments = 0.00; // Default value if the query fails
}

// Fetch detailed approved withdrawals
$queryApprovedWithdrawals = "SELECT * FROM withdrawals WHERE status = 'approved'";
$resultApprovedWithdrawals = mysqli_query($conn, $queryApprovedWithdrawals);

$approvedWithdrawals = [];
if ($resultApprovedWithdrawals) {
    while ($row = mysqli_fetch_assoc($resultApprovedWithdrawals)) {
        $approvedWithdrawals[] = $row;
    }
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
        .container {
            margin-left: 0;
            padding: 20px;
            max-width: 1000px;
            width: 100%;
            transition: margin-left 0.3s ease;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-gap: 20px;
        }
        .container.shifted {
            margin-left: 200px;
        }
        .section {
            padding: 20px;
            text-align: center;
            border-radius: 10px;
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
        .total-matured-investments {
            background-color: #ccccff;
            color: #333;
        }
        .admin-name {
            grid-column: span 2;
            color: black;
            font-weight: bold;
            font-size: 25px;
            font-family: Arial, sans-serif;
            text-align: center;
        }
        footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background: #444;
            text-align: center;
            padding: 0.5rem;
            z-index: 999;
        }
        footer p {
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
            <h2>Total Approved Deposits</h2>
              <p style="font-size: 24px; font-weight: bold;">Ksh<?php echo number_format($totalApprovedDeposits, 2); ?></p>
        </div>
        <div class="section total-withdrawals">
            <h2>Total Withdrawals</h2>
              <p style="font-size: 24px; font-weight: bold;">Ksh<?php echo number_format($totalWithdrawals, 2); ?></p>
        </div>
        <div class="section total-investments">
            <h2>Total Investments</h2>
              <p style="font-size: 24px; font-weight: bold;">Ksh<?php echo number_format($totalInvestments, 2); ?></p>
        </div>
        <div class="section total-matured-investments">
            <h2>Total Matured Investments</h2>
              <p style="font-size: 24px; font-weight: bold;">Ksh<?php echo number_format($totalMaturedInvestments, 2); ?></p>
        </div>
        <div class="section total-approved-withdrawals">
    <h2>Total Approved Withdrawals</h2>
      <p style="font-size: 24px; font-weight: bold;">Ksh<?php echo number_format($totalApprovedWithdrawals, 2); ?></p>
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
                container.classList.remove('shifted');
                menuIcon.style.left = '10px';
            } else {
                navbar.classList.add('show');
                container.classList.add('shifted');
                menuIcon.style.left = '210px';
            }
        }
    </script>
    
</body>
</html>
