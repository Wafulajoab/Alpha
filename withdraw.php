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

// Fetch user's phone number from the users table
$sql = "SELECT phone_number FROM users WHERE username = ?";
if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($phone_number);
    $stmt->fetch();
    $stmt->close();
} else {
    echo "Error preparing statement: " . $conn->error;
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
            padding: 10px 90px;
            border-radius: 50px;
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
   <li><a href="customer_care.php"><i class="fas fa-headset icon"></i>Customer Care</a></li> <!-- Customer Care Module -->
   <li><a href="logout.php"><i class="fas fa-sign-out-alt icon"></i>Logout</a></li>
</ul>

    </nav>
    <div class="container" id="container">
        <div class="section">
        <form action="withdraw_process.php" method="POST" onsubmit="return validateWithdrawal()">
                <h3>Withdrawal Section</h3>
                <div>
                    <div>
                    <h4 style="font-size: 1.5rem; font-family: times 'Times New Roman', Times, serif;  font-weight: bold; color: blue; margin-bottom: 10px;">Account Balance</h4>
                        <?php
                                echo "<p style='font-size: 2rem; font-weight: bold;  color: black;'>Ksh " . $accountBalance . "</p>";
                         ?>

                    </div>
                </div>
                <div>
               <h4>Phone Number</h4>
                    <input type="text" name="phone_number" value="<?php echo htmlspecialchars($phone_number); ?>" 
                        style="width: 200px; height: 30px; background: transparent; font-weight: bold; font-size: 35px; border: transparent;" maxlength="10" readonly>
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
    <style>
        /* Styles for the withdrawals section */
        .withdrawals-section {
            background-color: #f9f9f9;
            border-radius: 8px;
            padding: 20px;
            margin-top: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .withdrawals-section h3 {
            text-align: center;
            margin-bottom: 15px;
            color: #333;
        }

        .total-amount {
            text-align: center;
            font-size: 18px;
            color: #007bff;
            margin-bottom: 20px;
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 0 auto;
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            transition: background-color 0.3s ease;
        }

        th {
            background-color: #007bff;
            color: white;
            font-size: 16px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        td {
            color: #555;
            font-size: 14px;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .withdrawals-section p {
            text-align: center;
            color: #999;
        }

        /* Responsive styles */
        @media (max-width: 600px) {
            th, td {
                font-size: 14px;
                padding: 8px;
            }

            .withdrawals-section {
                padding: 10px;
            }
        }
    </style>

    <?php
    // Calculate the total amount withdrawn
    $totalWithdrawn = 0;
    if (!empty($withdrawals)) {
        foreach ($withdrawals as $withdrawal) {
            $totalWithdrawn += $withdrawal['amount'];
        }
    }
    ?>

    <div class="total-amount">
        Total Amount Withdrawn: KSH <?php echo number_format($totalWithdrawn, 2); ?>
    </div>

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
                    <td><?php echo number_format($withdrawal['amount'], 2); ?></td>
                    <td><?php echo htmlspecialchars($withdrawal['phone_number']); ?></td>
                    <td><?php echo htmlspecialchars($withdrawal['status']); ?></td>
                    <td><?php echo htmlspecialchars($withdrawal['date_requested']); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>No withdrawal history found.</p>
    <?php endif; ?>
</div>


    <footer>
        <p>Company. <strong>All Rights Reserved.</strong> Designed By <a href="jmtech.php">JMTech</a></p>
    </footer>
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
