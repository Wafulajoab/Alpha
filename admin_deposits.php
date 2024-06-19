<?php
session_start();

// Check if the admin is logged in
if (!isset($_SESSION['admin_username'])) {
    header("Location: admin_login.php");
    exit();
}

$admin_username = $_SESSION['admin_username'];

// Include the database connection file
include 'db_connection.php';

// Handle approve/reject actions
if (isset($_POST['action']) && isset($_POST['deposit_id'])) {
    $action = $_POST['action'];
    $deposit_id = $_POST['deposit_id'];
    $status = $action === 'approve' ? 'Approved' : 'Rejected';
    $admin_reaction = $action === 'approve' ? '✔️' : '❌';

    $updateQuery = "UPDATE deposits SET status='$status', admin_reaction='$admin_reaction' WHERE id=$deposit_id";
    mysqli_query($conn, $updateQuery);

    // Refresh the page to see the updated status
    header("Location: admin_deposits.php");
    exit();
}

// Fetch deposits data
$queryDeposits = "SELECT * FROM deposits";
$resultDeposits = mysqli_query($conn, $queryDeposits);

// Calculate the total available deposits
$queryTotalDeposits = "SELECT SUM(deposit_amount) AS total_deposits FROM deposits WHERE status = 'Approved'";
$resultTotalDeposits = mysqli_query($conn, $queryTotalDeposits);
$totalDepositsRow = mysqli_fetch_assoc($resultTotalDeposits);
$totalDeposits = $totalDepositsRow['total_deposits'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Deposits</title>
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
        .admin-name {
            position: absolute;
            top: 20px;
            left: 220px;
            color: black;
            font-weight: bold;
            font-size: 25px;
            font-family: Arial, sans-serif;
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
        .section.deposits {
            background-color: #eaeaea;
            color: #333;
            width: 100%;
            
        }
        .section.deposits table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .section.deposits th, .section.deposits td {
            padding: 8px;
            border: 1px solid #ccc;
            text-align: left;
        }
        .action-buttons {
            display: flex;
            justify-content: center;
        }
        .action-buttons form {
            display: inline-block;
            margin: 0 5px;
        }
        .action-buttons button {
            padding: 5px 10px;
            margin: 0 5px;
            border: none;
            cursor: pointer;
            font-weight: bold;
            border-radius: 5px; /* Add border radius */
            transition: background-color 0.3s, color 0.3s, transform 0.3s; /* Add transition for hover effect */
        }
        .action-buttons button:hover {
            background-color: rgba(0, 0, 0, 0.1); /* Change background color on hover */
            color: black; /* Change text color on hover */
            transform: scale(1.1); /* Add a slight scale effect on hover */
        }
        .approve-button {
            background-color: #4CAF50;
            color: white;
        }
        .reject-button {
            background-color: #f44336;
            color: white;
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
        <!-- Existing admin name display -->
        <div class="admin-name">Welcome, Admin <?php echo htmlspecialchars($admin_username); ?>!</div>

        <!-- Section for displaying deposits -->
        <div class="section deposits">
            
        <div class="image" style="text-align: center; margin-top: 20px;">
    <img src="images/alpha.webp" class="image2" alt="avatar" style="width: 60px; height: 60px; border-radius: 50%; border: 2px solid #444;">
</div>
        <h2 style="color: darkblue; font-family: 'Georgia', serif; font-size: 52px;">All Deposits</h2>

            <?php
           // Display the total deposits
echo '<p style="font-size: 24px; font-weight: bold; color: green;"><strong>Total Approved Deposits<br></strong> KSH. ' . htmlspecialchars(number_format($totalDeposits, 2)) . '</p>';
            if (mysqli_num_rows($resultDeposits) > 0) {
                // Table header
                echo '<table>';
                echo '<tr><th>ID</th><th>Username</th><th>Deposit Amount</th><th>Deposit Date</th><th>Status</th><th>Admin Reaction</th><th>Actions</th></tr>';

                // Table rows
                while ($row = mysqli_fetch_assoc($resultDeposits)) {
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($row['id']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['username']) . '</td>';
                    echo '<td>KSH ' . htmlspecialchars(number_format($row['deposit_amount'], 2)) . '</td>';
                    echo '<td>' . htmlspecialchars($row['created_at']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['status']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['admin_reaction']) . '</td>';
                    echo '<td class="action-buttons">';
                    if ($row['status'] === 'Pending') {
                        echo '<form method="post" action="">
                                <input type="hidden" name="deposit_id" value="' . htmlspecialchars($row['id']) . '">
                                <input type="hidden" name="action" value="approve">
                                <button type="submit" class="approve-button">Approve</button>
                            </form>';
                        echo '<form method="post" action="">
                                <input type="hidden" name="deposit_id" value="' . htmlspecialchars($row['id']) . '">
                                <input type="hidden" name="action" value="reject">
                                <button type="submit" class="reject-button">Reject</button>
                            </form>';
                    }
                    echo '</td>';
                    echo '</tr>';
                }

                echo '</table>';
            } else {
                echo '<p>No deposits found.</p>';
            }

            // Close the database connection
            mysqli_close($conn);
            ?>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Alpha Financial Systems</p>
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
