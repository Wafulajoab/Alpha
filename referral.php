<?php
session_start();

// Database credentials
$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "alpha";

// Create connection
$conn = new mysqli($servername, $db_username, $db_password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to update referral earnings
function updateReferralEarnings($referrerUsername, $activationFee) {
    global $conn;

    // Calculate the referral bonus (50% of the activation fee)
    $referralBonus = $activationFee * 0.50;

    // Update the referrer's earnings
    $sql = "UPDATE accounts SET referralsEarnings = referralsEarnings + ? WHERE username = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }
    $stmt->bind_param("ds", $referralBonus, $referrerUsername);
    $stmt->execute();
    $stmt->close();
}

// Fetch user profile information if logged in
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $direct_referrals = [];

    // Fetch direct referrals with additional details
    $sql = "SELECT username, phone_number, account_status FROM users WHERE upline_username = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $row['amount_earned'] = $row['account_status'] == 'Active' ? '50' : '0.0';
            $direct_referrals[] = $row;
        }
        $stmt->close();
    }

    // Handle referral bonuses for direct referrals if investment amount is posted
    if (isset($_POST['investment_amount'])) {
        $investment_amount = $_POST['investment_amount'];
        $referrer_percentage_direct = 0.05; // 5% for direct referrals

        // Direct Referrals
        foreach ($direct_referrals as $referral) {
            $bonus_amount = $investment_amount * $referrer_percentage_direct;
            // Update the account balance of the direct referrer
            $sql = "UPDATE users SET account_balance = account_balance + ? WHERE username = ?";
            if ($stmt = $conn->prepare($sql)) {
                $stmt->bind_param("ds", $bonus_amount, $referral['username']);
                $stmt->execute();
                $stmt->close();
            }
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
            overflow-y: auto;
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

        .home-content {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
        }

        h1, h2 {
            text-align: center;
        }

        .copy-btn {
            display: block;
            margin: 10px auto;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        .referral-container {
    text-align: center;
    margin-top: 20px;
    animation: slideInLeft 1s ease-in-out;
    
}

.referral-container input[type="text"] {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    border: 2px solid #ccc;
    border-radius: 5px;
    margin-bottom: 10px;
    animation: slideInLeft 1s ease-in-out;
}

.referral-table-container {
    margin-top: 20px;
    padding: 10px;
    background-color: #f9f9f9;
    border-radius: 8px;
    animation: slideInLeft 1s ease-in-out;
    width: 600px;
}

.referral-table {
    width: 600px;
    border-collapse: collapse;
    margin-top: 10px;
    animation: slideInLeft 1s ease-in-out;
}

.referral-table th, .referral-table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
    animation: slideInLeft 1s ease-in-out;
}

.referral-table th {
    background-color: #444;
    color: white;
    animation: slideInLeft 1s ease-in-out;
}

@keyframes slideInLeft {
    0% {
        opacity: 0;
        transform: translateX(-100%);
    }
    100% {
        opacity: 1;
        transform: translateX(0);
    }
}

    </style>
</head>
<body>
    <div class="menu-icon" onclick="toggleNavbar()">
        <i class="fas fa-bars"></i>
    </div>
    <nav class="navbar">
        <h2>Menu</h2>
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
            <li><a href="customer_care.php"><i class="fas fa-headset icon"></i>Customer Care</a></li>
            <li><a href="logout.php"><i class="fas fa-sign-out-alt icon"></i>Logout</a></li>
        </ul>
    </nav>
    <div class="container">
        <div class="home-content">
            <h2>Copy the link below and invite more Investors and Earn Referral Bonus</h2>
            <div class="referral-container">
                <input type="text" id="referral-link" value="http://example.com/register.php?ref=<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>" readonly>
                <button class="copy-btn" onclick="copyToClipboard()">Copy Referral Link</button>
            </div>
            <div class="referral-table-container">
                <h2>Direct Referrals</h2>
                <?php if (!empty($direct_referrals)): ?>
                    <table class="referral-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Phone Number</th>
                                <th>Status</th>
                                <th>Amount Earned (KSH)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($direct_referrals as $index => $referral): ?>
                                <tr>
                                    <td><?php echo $index + 1; ?></td>
                                    <td><?php echo htmlspecialchars($referral['username']); ?></td>
                                    <td><?php echo htmlspecialchars($referral['phone_number']); ?></td>
                                    <td><?php echo htmlspecialchars($referral['account_status'] == 'Active' ? 'Active' : 'Inactive'); ?></td>
                                    <td><?php echo htmlspecialchars($referral['amount_earned']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p>No direct referrals available.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <footer>
        <p>&copy; 2024 Alpha Platform. All rights reserved. <a href="#">Terms of Service</a> | <a href="#">Privacy Policy</a></p>
    </footer>
    <script>
        function toggleNavbar() {
            const navbar = document.querySelector('.navbar');
            const container = document.querySelector('.container');
            const menuIcon = document.querySelector('.menu-icon');
            navbar.classList.toggle('show');
            container.classList.toggle('shifted');
        }

        function copyToClipboard() {
            const referralLink = document.getElementById('referral-link');
            referralLink.select();
            document.execCommand('copy');
            alert('Referral link copied to clipboard!');
        }
    </script>
</body>
</html>
