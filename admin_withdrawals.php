<?php
session_start();
include 'db_connection.php';

if (!isset($_SESSION['admin_username'])) {
    header("Location: login.php");
    exit();
}

// Fetch all withdrawal records
$sql = "SELECT id, username, phone_number, amount, status, date_requested FROM withdrawals";
if ($stmt = $conn->prepare($sql)) {
    $stmt->execute();
    $result = $stmt->get_result();
    $withdrawals = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
} else {
    echo "Error preparing statement: " . $conn->error;
}

// Process withdrawal approval/rejection
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['withdrawal_id']) && isset($_POST['action'])) {
        $withdrawalId = $_POST['withdrawal_id'];
        $action = $_POST['action'];

        // Update withdrawal status based on action
        $updateSql = "UPDATE withdrawals SET status = ? WHERE id = ?";
        if ($updateStmt = $conn->prepare($updateSql)) {
            $updateStmt->bind_param("si", $action, $withdrawalId);
            $updateStmt->execute();
            $updateStmt->close();
            header("Location: admin_withdrawals.php");
            exit();
        } else {
            echo "Error updating withdrawal status: " . $conn->error;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manage Investments</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: darkgrey;
            transition: margin-left 0.3s ease;
        }
        .container {
            padding: 20px;
            transition: margin-left 0.3s ease;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #444;
            color: #fff;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        .status-active {
            color: green;
        }
        .status-matured {
            color: red;
        }
        .status-pending {
            color: orange;
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

        /* Styles for action buttons */
        button[type="submit"] {
            background-color: #4CAF50; /* Default background color */
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #45a049; /* Hover background color */
        }

        /* Specific styles for reject button */
        button[name="action"][value="Rejected"] {
            background-color: #f44336; /* Default background color for reject button */
        }

        button[name="action"][value="Rejected"]:hover {
            background-color: #e53935; /* Hover background color for reject button */
        }

        /* Adjust margin for body section */
        .container {
            padding: 20px;
            transition: margin-left 0.3s ease;
            margin-left: 0;
        }

        /* Slide content when navbar is shown */
        .navbar.show + .container {
            margin-left: 200px;
        }

           /* Styles for action buttons */
    button[type="submit"] {
        background-color: #4CAF50; /* Default background color */
        color: white;
        border: none;
        padding: 8px 16px;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button[type="submit"]:hover {
        background-color: #45a049; /* Hover background color */
    }


    /* Adjust margin for body section */
    .container {
        padding: 20px;
        transition: margin-left 0.3s ease;
        margin-left: 0;
    }

    /* Slide content when navbar is shown */
    .navbar.show + .container {
        margin-left: 200px;
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

  <div class="container">
  <div class="image" style="text-align: center; margin-top: 20px;">
    <img src="images/alpha.webp" class="image2" alt="avatar" style="width: 60px; height: 60px; border-radius: 50%; border: 2px solid #444;">
</div>

        <div class="section">
            <h3>Manage Withdrawals</h3>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Phone Number</th>
                        <th>Amount (Ksh)</th>
                        <th>Status</th>
                        <th>Date Requested</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($withdrawals as $withdrawal) : ?>
                    <tr>
                        <td><?php echo $withdrawal['id']; ?></td>
                        <td><?php echo $withdrawal['username']; ?></td>
                        <td><?php echo $withdrawal['phone_number']; ?></td>
                        <td><?php echo $withdrawal['amount']; ?></td>
                        <td><?php echo $withdrawal['status']; ?></td>
                        <td><?php echo $withdrawal['date_requested']; ?></td>
                        <td>
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                                <input type="hidden" name="withdrawal_id" value="<?php echo $withdrawal['id']; ?>">
                                <button type="submit" name="action" value="Approved">Approve</button>
                                <button type="submit" name="action" value="Rejected">Reject</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
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