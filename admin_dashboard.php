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
$queryTotalApprovedDeposits = "SELECT SUM(deposit_amount) AS total_approved_deposits FROM deposits WHERE status = 'Approved'";
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

.menu-icon.shifted {
    left: 210px; /* Adjust this value based on the width of the navbar */
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
    overflow-y: auto;
}

.navbar.show {
    left: 0;
}

.container {
    margin-left: 0;
    padding: 20px;
    max-width: 600px;
    width: 100%;
    transition: margin-left 0.3s ease;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    background-color: #f4f4f4;
    border-radius: 25px;
    z-index: 1; /* Set lower z-index for container */
    position: relative; /* Ensure container positioning is controlled */
}

.container.shifted {
    margin-left: 200px; /* Adjust this value based on the width of the navbar */
    z-index: -1; /* Send container behind navbar when navbar is open */
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

       
        .section {
    background-color: #fff;
    border-radius: 25px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin: 10px;
    padding: 20px;
    text-align: center;
    width: 30%;
    position: relative;
    animation: rotateAndFade 2s ease-in-out forwards;
    opacity: 0; /* Initially hidden */
    transform-origin: center center;
}

@keyframes rotateAndFade {
    0% {
        opacity: 0;
        transform: rotate(0deg); /* Start with no rotation */
        background-color: #fff; /* Initial background color */
    }
    50% {
        opacity: 1;
        transform: rotate(360deg); /* Rotate fully */
        background-color: #f0f0f0; /* Change background color halfway */
    }
    100% {
        opacity: 1;
        transform: rotate(0deg); /* Rotate back to no rotation */
        background-color: #fff; /* Back to original background color */
    }
}


        .section h2 {
            margin-bottom: 15px;
            font-size: 1.5rem;
            color: #444;
        }
        .section p {
            font-size: 1.2rem;
            font-weight: bold;
            color: #333;
        }
        .section.total-users {
            background: linear-gradient(135deg, #f6d365 0%, #fda085 100%);

        }
        .section.total-deposits {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        }
        .section.total-withdrawals {
            background: linear-gradient(135deg, #5ee7df 0%, #b490ca 100%);
        }
        .section.total-investments {
            background: linear-gradient(135deg, #a1c4fd 0%, #c2e9fb 100%);
        }
        .section.total-matured-investments {
            background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);
        }
        .section.total-approved-withdrawals {
            background: linear-gradient(135deg, #ff9a9e 0%, #fecfef 100%);
        }
        .admin-name {
            width: 100%;
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: bold;
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
        .approved-withdrawals {
    background-color: #fff;
    border-radius: 15px;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
    margin: 20px auto;
    padding: 25px;
    text-align: center;
    transition: margin-left 0.3s ease;
    width: 90%;
    max-width: 1200px;
    position: flex;
}


.approved-withdrawals h2 {
            margin-bottom: 20px;
            font-size: 1.75rem;
            color: #444;
        }

.approved-withdrawals table {
            width: 100%;
            border-collapse: flex;
            padding: 20px;
            transition: margin-left 0.3s ease;
            animation: flipInY 1.5s ease forwards;
            opacity: 0;
        }
                



@keyframes flipInY {
    0% {
        opacity: 0;
        transform: perspective(400px) rotateY(90deg);
    }
    100% {
        opacity: 1;
        transform: perspective(400px) rotateY(0deg);
    }
}

.approved-withdrawals th, .approved-withdrawals td {
    padding: 14px 18px;
    text-align: left;
    border-bottom: 1px solid #e0e0e0;
    
}

.approved-withdrawals th {
    background-color: #007BFF;
    color: white;
    font-size: 1rem;
}

.approved-withdrawals td {
    font-size: 0.95rem;
    color: black;
}

.approved-withdrawals tr:nth-child(even) {
    background-color: #f4f4f4;
}

.approved-withdrawals tr:hover {
    background-color: #fecfef;
    cursor: pointer;
}

.approved-withdrawals tr td:last-child {
    font-weight: bold;
    color: #007BFF;
}

.approved-withdrawals tr th:first-child, 
.approved-withdrawals tr td:first-child {
    border-top-left-radius: 50px;
    border-bottom-left-radius: 10px;
}

.approved-withdrawals tr th:last-child, 
.approved-withdrawals tr td:last-child {
    border-top-right-radius: 50px;
    border-bottom-right-radius: 10px;
}

    </style>
</head>
<body>
    <div class="menu-icon" id="menu-icon">
        <i class="fas fa-bars"></i>
    </div>
    <div class="navbar" id="navbar">
       
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
            <li><a href="admin_logout.php"><i class="fas fa-sign-out-alt icon"></i>Logout</a></li>
        </ul>
    </nav>
    </div>
 <d>
   <div>
 <div class="container" id="container">
 <div class="image" style="text-align: center; margin-top: 20px;">
    <img src="images/alpha.webp" class="image2" alt="avatar" style="width: 60px; height: 60px; border-radius: 50%; border: 2px solid #444;">
</div>
        <div class="admin-name">Welcome, <?php echo $admin_username; ?></div>
        <div class="section total-users">
            <h2>Total Users</h2>
            <p><?php echo $totalUsers; ?></p>
        </div>
        <div class="section total-deposits">
            <h2>Total Approved Deposits</h2>
            <p>KES <?php echo $totalApprovedDeposits; ?></p>
        </div>
        <div class="section total-withdrawals">
            <h2>Total Withdrawals</h2>
            <p>KES <?php echo $totalWithdrawals; ?></p>
        </div>
        <div class="section total-approved-withdrawals">
            <h2>Total Approved Withdrawals</h2>
            <p>KES <?php echo $totalApprovedWithdrawals; ?></p>
        </div>
        <div class="section total-investments">
            <h2>Total Investments</h2>
            <p>KES <?php echo $totalInvestments; ?></p>
        </div>
        <div class="section total-matured-investments">
            <h2>Total Matured Investments</h2>
            <p>KES <?php echo $totalMaturedInvestments; ?></p>
        </div>
        </div>
    </div>

    <div class="approved-withdrawals">
            <h2>Approved Withdrawals</h2>
            <table>
    <tr>
        <th>Serial Number</th>
        <th>Username</th>
        <th>Phone Number</th>
        <th>Amount</th>
    </tr>
    <?php 
    $serialNumber = 1;
    foreach ($approvedWithdrawals as $withdrawal) : ?>
        <tr>
            <td><?php echo $serialNumber++; ?></td>
            <td><?php echo $withdrawal['username']; ?></td>
            <td><?php echo $withdrawal['phone_number']; ?></td>
            <td><?php echo $withdrawal['amount']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>

        </div>

                </div>
    <footer>
        <p>&copy; 2023 Admin Dashboard. All rights reserved.</p>
    </footer>
    <script>
 document.addEventListener("DOMContentLoaded", function() {
    var menuIcon = document.getElementById("menu-icon");
    var navbar = document.getElementById("navbar");
    var container = document.getElementById("container");
    var approvedWithdrawalsTable = document.querySelector(".approved-withdrawals table");

    menuIcon.addEventListener("click", function() {
        navbar.classList.toggle("show");
        container.classList.toggle("shifted");
        menuIcon.classList.toggle("shifted");
        approvedWithdrawalsTable.classList.toggle("shifted");
    });
});



        function toggleNavbar() {
    const navbar = document.getElementById('navbar');
    const container = document.querySelector('.container');
    const menuIcon = document.querySelector('.menu-icon');
    const isOpen = navbar.classList.contains('show');
    
    if (isOpen) {
        navbar.classList.remove('show');
        container.style.marginLeft = '0';
        menuIcon.style.left = '10px';
        container.style.zIndex = '1'; // Reset container z-index when navbar is closed
    } else {
        navbar.classList.add('show');
        container.style.marginLeft = '200px';
        menuIcon.style.left = '210px';
        container.style.zIndex = '-1'; // Send container behind navbar when navbar is open
    }
}


    </script>
</body>
</html>
