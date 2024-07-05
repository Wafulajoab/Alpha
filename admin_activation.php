<?php
// Database connection parameters
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'alpha';

// Attempt database connection
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error: Could not connect. " . $e->getMessage());
}

// Fetch pending transactions
$sql = "SELECT * FROM transactions WHERE activation_status = 'pending'";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$pending_transactions = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Handle activation
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['transaction_id'])) {
    $transaction_id = $_POST['transaction_id'];
    $sql = "UPDATE transactions SET activation_status = 'activated' WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$transaction_id]);
    header("Location: admin_activation.php"); // Refresh the page to see updated list
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Activation</title>
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
            transition: margin-left 0.3s ease; /* Ensure transition for navbar */
        }

        .container {
            padding: 20px;
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

        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }

        button[name="action"][value="Rejected"] {
            background-color: #f44336;
        }

        button[name="action"][value="Rejected"]:hover {
            background-color: #e53935;
        }

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
        <div class="image" style="text-align: center; margin-top: 20px;">
            <img src="images/alpha.webp" class="image2" alt="avatar" style="width: 60px; height: 60px; border-radius: 50%; border: 2px solid #444;">
        </div>
        <h2>ALPHA FINANCE</h2>
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

    <!-- Container -->
    <div class="container">
        <h2>Pending Accounts Activation</h2>
        <table>
            <thead>
                <tr>
                    <th>Transaction ID</th>
                    <th>Username</th>
                    <th>Amount</th>
                    <th>Transaction Code</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pending_transactions as $transaction): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($transaction['id']); ?></td>
                        <td><?php echo htmlspecialchars($transaction['username']); ?></td>
                        <td><?php echo htmlspecialchars($transaction['amount']); ?></td>
                        <td><?php echo htmlspecialchars($transaction['transaction_code']); ?></td>
                        <td>
                            <form method="post" action="admin_activation.php" style="display:inline;">
                                <input type="hidden" name="transaction_id" value="<?php echo htmlspecialchars($transaction['id']); ?>">
                                <button type="submit" class="btn-activate">Activate</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; <?php echo date('Y'); ?> Company. <strong>All Rights Reserved.</strong> Designed By <a href="jmtech.php">JMTech</a></p>
    </footer>

    <!-- JavaScript -->
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
