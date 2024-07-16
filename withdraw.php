<?php
session_start();
include 'db_connection.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];

// Fetch account balance
$sql = "SELECT accountBalance FROM accounts WHERE username = ?";
if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($accountBalance);
    $stmt->fetch();
    $stmt->close();
} else {
    echo "Error preparing statement: " . $conn->error;
}

$sql = "SELECT id, amount, phone_number, status, date_requested FROM withdrawals WHERE username = ?";
if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $withdrawals = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
} else {
    echo "Error preparing statement: " . $conn->error;
}

// Check for success message
$success_message = '';
if (isset($_SESSION['success_message'])) {
    $success_message = $_SESSION['success_message'];
    unset($_SESSION['success_message']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Withdrawal Management</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: darkgrey;
            display: flex;
            flex-direction: column;
            align-items: center;
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
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
            margin-top: 100px;
            transition: margin-left 0.3s ease;
        }
        .container.shifted {
            margin-left: 200px;
        }
        .section {
            width: 50vh;
            text-align: center;
            border-radius: 10px;
            background-color: #f0f0f0;
            color: #333;
            padding: 20px;
            margin-bottom: 20px;
        }
        .logout {
            position: fixed;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 1000;
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
            background-color: #8a2be2;
        }
        .btn-back {
            background-color: #333;
        }
        .btn-logout {
            background-color: #f00;
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
        .withdrawals-section {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
            transition: margin-left 0.3s ease;
        }
        .withdrawals-section.shifted {
            margin-left: 200px;
        }
        table {
            width: 50%;
            border-collapse: collapse;
            background-color: #fff;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #333;
            color: #fff;
        }
        td {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
    <i class="fas fa-bars menu-icon" onclick="toggleNavbar()"></i>
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
        <li><a href="logout.php"><i class="fas fa-sign-out-alt icon"></i>Logout</a></li>

        </ul>
    </nav>
    <div class="container" id="container">
        <div class="section">
        <form action="withdraw_process.php" method="POST" onsubmit="return validateWithdrawal()">
                <h3>Withdrawal Section</h3>
                <div>
                    <div>
                        <h4>Account Balance</h4>
                        <?php
                        echo "<p>Ksh " . $accountBalance . "</p>";
                        ?>
                    </div>
                </div>
                <div>
                    <h4>Phone Number</h4>
                    <input type="text" name="phone_number" placeholder="Enter your phone number" 
                           style="width: 200px; height: 30px;" maxlength="10" 
                           oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10);" required>
                </div>
                <div>
                    <h4>Enter Amount</h4>
                    <input type="text" name="withdraw_amount" id="withdraw_amount" placeholder="Enter withdrawal amount (Ksh)" style="width: 200px; height: 30px;">
                </div>
                <br>
                <button type="submit">Withdraw</button>
                <br><br>
                <a href="home_page.php">
                    <button type="button" class="btn-back">Back</button>
                </a>
                <br><br>
             
            </form>
        </div>
    </div>

    <?php if (!empty($success_message)): ?>
        <div class="success-message" style="color: green; font-size: 1.2em; margin-top: 20px;">
            <?php echo $success_message; ?>
        </div>
    <?php endif; ?>

    <div class="withdrawals-section" id="withdrawals-section">
        <h3>Withdrawal History</h3>
        <?php if (!empty($withdrawals)): ?>
            <table>
                <tr>
                    <th>Serial No</th>
                    <th>Amount</th>
                    <th>Phone Number</th>
                    <th>Status</th>
                    <th>Date Requested</th>
                </tr>
                <?php foreach ($withdrawals as $withdrawal): ?>
                    <tr>
                        <td><?php echo $withdrawal['id']; ?></td>
                        <td><?php echo $withdrawal['amount']; ?></td>
                        <td><?php echo $withdrawal['phone_number']; ?></td>
                        <td><?php echo $withdrawal['status']; ?></td>
                        <td><?php echo $withdrawal['date_requested']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>No withdrawal history found.</p>
        <?php endif; ?>
    </div>

    <br><br><br>
    <script>
    function toggleNavbar() {
        const navbar = document.getElementById('navbar');
        const container = document.querySelector('.container');
        const withdrawalsSection = document.querySelector('.withdrawals-section');
        const menuIcon = document.querySelector('.menu-icon');
        const isOpen = navbar.classList.contains('show');

        if (isOpen) {
            navbar.classList.remove('show');
            container.style.marginLeft = '0';
            withdrawalsSection.style.marginLeft = '0';
            menuIcon.style.left = '10px';
        } else {
            navbar.classList.add('show');
            container.style.marginLeft = '200px';
            withdrawalsSection.style.marginLeft = '200px';
            menuIcon.style.left = '210px';
        }
    }

    function validateWithdrawal() {
        var withdrawAmount = document.getElementById('withdraw_amount').value;
        if (withdrawAmount < 500 || withdrawAmount > 100000) {
            alert("Please enter a withdrawal amount between Ksh 500 and Ksh 100,000.");
            return false;
        }
        return true;
    }
</script>

</body>
</html>
