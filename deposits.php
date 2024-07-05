<?php
session_start();
include 'db_connection.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];

// Fetch deposit history
$query = "SELECT transaction_code, deposit_amount, created_at, status FROM deposits WHERE username = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

// Fetch total deposits balance
$query_balance = "SELECT totalDepositsBalance FROM accounts WHERE username = ?";
$stmt_balance = $conn->prepare($query_balance);
$stmt_balance->bind_param("s", $username);
$stmt_balance->execute();
$result_balance = $stmt_balance->get_result();

$totalDepositsBalance = 0; // Default value
if ($balance_row = $result_balance->fetch_assoc()) {
    if (isset($balance_row['totalDepositsBalance'])) {
        $totalDepositsBalance = $balance_row['totalDepositsBalance'];
    } else {
        echo "<div style='color: red; font-weight: bold;'>Error: totalDepositsBalance column not found in the query result.</div>";
    }
} else {
    echo "<div style='color: green; font-weight: bold;'>No result returned for the total deposits balance query.</div>";
}

// Output the total deposit balance for debugging
echo "<div style='position: fixed; top: 10px; right: 10px; width: 200px; padding: 10px; background-color: #f9f9f9; border: 1px solid #ddd; border-radius: 5px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);'>
        <strong>Total Deposits Balance:</strong><br> KSH " . htmlspecialchars($totalDepositsBalance) . "
      </div>";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deposits</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: darkgrey;
            transition: margin-left 0.3s ease;
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
        .deposit-list-section {
            margin-top: 20px;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .deposit-list-section h3 {
            margin-bottom: 10px;
        }
        .deposit-list-section table {
            width: 100%;
            border-collapse: collapse;
        }
        .deposit-list-section th, .deposit-list-section td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }
        .deposit-list-section th {
            background-color: #f2f2f2;
        }
        .deposit-list-section td.status-pending {
            color: orange;
        }
        .deposit-list-section td.status-approved {
            color: green;
        }
        .deposit-list-section td.status-rejected {
            color: red;
        }
        .payment-procedure-section {
            margin-top: 20px;
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .payment-procedure-section h3 {
            margin-bottom: 10px;
        }
        .payment-procedure-section ol {
            margin-left: 20px;
        }
        .transaction-input-section {
            margin-top: 20px;
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .transaction-input-section h3 {
            margin-bottom: 10px;
        }
        .transaction-input-section label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }
        .transaction-input-section input[type="text"] {
            width: 40%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .transaction-input-section button {
            background-color: #008080;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 10px;
        }
        .transaction-input-section button:hover {
            background-color: #006666;
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
        .container {
    width: 40%;
    height: 90%; /* Adjust height as needed */
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: white; /* Optional: Add background color */
    padding: 20px; /* Optional: Add padding */
    border-radius: 10px; /* Optional: Add border radius */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Optional: Add box shadow */
    overflow: auto; /* Allow scrolling if content overflows */
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
        <li><a href="messages.php"><i class="fas fa-envelope icon"></i>Messages</a></li>
        <li><a href="referral.php"><i class="fas fa-user-friends icon"></i>Referral</a></li>
        <li><a href="logout.php"><i class="fas fa-sign-out-alt icon"></i>Logout</a></li>

     </ul>
</nav>

    <div class="container" id="container">
        <!-- Payment Procedure Section -->
        <div class="section payment-procedure-section">
            <img src="images/mpesa.jpg" alt="M-Pesa Payment" style="display: block; margin: 0 auto 20px; max-width: 40%; height: auto;">
            <h3>How to Make M-Pesa Payment to Till Number</h3>
            <ol>
                <li>Go to M-Pesa menu on your phone.</li>
                <li>Select Lipa Na M-Pesa.</li>
                <li>Choose Paybill.</li>
                <li>Enter Paybill Number: <strong>123456</strong>.</li>
                <li>Enter Account Number: <strong>YourAccountNumber</strong>.</li>
                <li>Enter Amount.</li>
                <li>Enter your M-Pesa PIN and confirm the transaction.</li>
            </ol>
        </div>
        
        <!-- Transaction Input Section -->
        <div class="section transaction-input-section">
            <h3>Enter M-Pesa Transaction Details</h3>
            <form action="process_transaction.php" method="post">
                <label for="deposit_amount">Deposited Amount:</label>
                <input type="text" id="deposit_amount" name="deposit_amount" placeholder="Enter Deposited Amount">

                <label for="transaction_code">Transaction Code:</label>
                <input type="text" id="transaction_code" name="transaction_code" placeholder="Enter M-Pesa transaction code (e.g., OJM3RT593P)" required pattern="[A-Z0-9]{10}" title="10 characters, alphanumeric (e.g., OJM3RT593P)">

                    
                <button type="submit" name="submit">Submit</button>
            </form>
        </div>

        <!-- Deposit History Section -->
        <div class="section deposit-list-section">
            <h3>Deposit History</h3>
            <table>
                <thead>
                    <tr>
                        <th>Transaction Code</th>
                        <th>Deposit Amount</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['transaction_code']); ?></td>
                            <td><?php echo htmlspecialchars($row['deposit_amount']); ?></td>
                            <td><?php echo htmlspecialchars($row['created_at']); ?></td>
                            <td class="status-<?php echo strtolower($row['status']); ?>">
                                <?php echo htmlspecialchars($row['status']); ?>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Alpha Finance. All rights reserved. | Design by <a href="https://github.com/YourProfile">YourName</a></p>
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

        document.getElementById('transaction_code').addEventListener('input', function(event) {
            const input = event.target;
            const value = input.value.toUpperCase().replace(/[^0-9A-Z]/g, '');
            input.value = value.slice(0, 10);
        });
    </script>
</body>
</html>
<?php
$conn->close();
?>
