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

// Initialize referral arrays
$direct_referrals = [];
$indirect_referrals = [];

// Fetch user profile information if logged in
$user_profile = null;
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    
    // Fetch user profile information
    $sql = "SELECT username, phone_number FROM users WHERE username = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $param_username);
        $param_username = $username;

        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows == 1) {
            $user_profile = $result->fetch_assoc();
        }
        $stmt->close();
    }
    
    // Fetch direct referrals
    $sql = "SELECT username FROM users WHERE referred_by = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $param_username);
        $param_username = $username;

        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $direct_referrals[] = $row['username'];
        }
        $stmt->close();
    }

    // Fetch indirect referrals (assuming indirect referrals are one level deeper)
    if (!empty($direct_referrals)) {
        $placeholders = implode(',', array_fill(0, count($direct_referrals), '?'));
        $types = str_repeat('s', count($direct_referrals));

        $sql = "SELECT username FROM users WHERE referred_by IN ($placeholders)";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param($types, ...$direct_referrals);

            $stmt->execute();
            $result = $stmt->get_result();
            while ($row = $result->fetch_assoc()) {
                $indirect_referrals[] = $row['username'];
            }
            $stmt->close();
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

        /* Menu icon styles */
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

        .container {
            margin-left: 0; /* Start with no margin-left */
            padding: 20px;
            max-width: 1000px;
            width: 100%;
            transition: margin-left 0.3s ease; /* Add transition for sliding effect */
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
        }

        .referral-container input[type="text"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 2px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .profile-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .profile-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .profile-container p {
            font-size: 18px;
            margin-bottom: 10px;
        }
    </style>
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
        
        function copyToClipboard() {
            var copyText = document.getElementById("referral-link");
            copyText.select();
            copyText.setSelectionRange(0, 99999); // For mobile devices
            document.execCommand("copy");
            alert("Referral link copied to clipboard: " + copyText.value);
        }
    </script>
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

    <div class="container">
        <div class="home-content">
            <h1>Welcome to Alpha Platform</h1>
            <div class="referral-container">
                <input type="text" id="referral-link" value="http://example.com/register.php?ref=<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>" readonly>
                <button class="copy-btn" onclick="copyToClipboard()">Copy Referral Link</button>
            </div>
        </div>
        <div class="profile-container">
            <?php if ($user_profile): ?>
                <h2>User Profile</h2>
                <p><strong>Username:</strong> <?php echo htmlspecialchars($user_profile['username']); ?></p>
                <p><strong>Phone Number:</strong> <?php echo htmlspecialchars($user_profile['phone_number']); ?></p>
            <?php else: ?>
                <p>No user profile information available.</p>
            <?php endif; ?>
        </div>
        <div class="profile-container">
            <h2>Direct Referrals</h2>
            <?php if (!empty($direct_referrals)): ?>
                <ul>
                    <?php foreach ($direct_referrals as $referral): ?>
                        <li><?php echo htmlspecialchars($referral); ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>No direct referrals available.</p>
            <?php endif; ?>
        </div>
        <div class="profile-container">
            <h2>Indirect Referrals</h2>
            <?php if (!empty($indirect_referrals)): ?>
                <ul>
                    <?php foreach ($indirect_referrals as $referral): ?>
                        <li><?php echo htmlspecialchars($referral); ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>No indirect referrals available.</p>
            <?php endif; ?>
        </div>
    </div>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Your Company. All rights reserved. <a href="privacy-policy.php">Privacy Policy</a> | <a href="terms-of-service.php">Terms of Service</a></p>
    </footer>
</body>
</html>