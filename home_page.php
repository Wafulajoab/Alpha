<?php
// Database connection
$host = 'localhost'; // or your database host
$dbname = 'alpha'; // Changed database name to alpha
$username = 'root'; // Replace with your database username
$password = ''; // Replace with your database password

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to get account information
function getAccountInfo($username) {
    global $conn;
    $accountInfo = [
        'totalDepositsBalance' => 0,
        'accountBalance' => 0,
        'totalWithdrawn' => 0,
        'referralsEarnings' => 0
    ];

    $sql = "SELECT totalDepositsBalance, accountBalance, totalWithdrawn, referralsEarnings FROM accounts WHERE username = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result(
        $accountInfo['totalDepositsBalance'], 
        $accountInfo['accountBalance'], 
        $accountInfo['totalWithdrawn'], 
        $accountInfo['referralsEarnings']
    );
    $stmt->fetch();
    $stmt->close();

    return $accountInfo;
}

// Function to fetch the total active investments
function getTotalActiveInvestments($username) {
    global $conn;

    $totalActiveInvestments = 0;

    $sql = "SELECT SUM(amount) AS total FROM investments WHERE username = ? AND status = 'Active'";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($total);
    $stmt->fetch();

    if ($total) {
        $totalActiveInvestments = $total;
    }

    $stmt->close();

    return $totalActiveInvestments;
}


// Check if a session is not already active before starting one
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Start the session
}

// Check if the username is set in the session
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username']; // Get the username from the session
} else {
    $username = 'Guest'; // Default to 'Guest' if username is not set in the session
}

// Fetch account information for the logged-in user
$accountInfo = getAccountInfo($username);
$totalDepositsBalance = $accountInfo['totalDepositsBalance'];
$accountBalance = $accountInfo['accountBalance'];
$totalWithdrawn = $accountInfo['totalWithdrawn'];
$referralsEarnings = $accountInfo['referralsEarnings'];

// Fetch the total active investments for the logged-in user
$totalActiveInvestments = getTotalActiveInvestments($username);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
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

        /* Navbar styles */
        .navbar {
            position: fixed;
            top: 0;
            left: -200px; /* Initially hide the navbar */
            width: 200px;
            height: 100vh;
            background-color: #444;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 0px;
            transition: left 0.3s ease; /* Add transition for sliding effect */
        }

        .navbar.show {
            left: 0; /* Show the navbar */
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
        margin-left: 0; /* Start with no margin-left */
        padding: 20px;
        max-width: 1000px;
        width: 100%;
        transition: margin-left 0.3s ease; /* Add transition for sliding effect */
    }

    .container.shifted {
        margin-left: 200px; /* Adjust margin-left when navbar is shown */
    }

    .section {
        width: 60%;
        margin: 20px 0;
        padding: 20px;
        text-align: center;
        border-radius: 100%;
        background-color: #fff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .total-deposits {
        background-color: #ffcccb; /* Light salmon background */
        color: #333; /* Dark text color */
    }

    .account-balance {
        background-color: #ff9999; /* Light coral background */
        color: #333; /* Dark text color */
    }

    .total-withdrawn {
        background-color: #99ff99; /* Light green background */
        color: #333; /* Dark text color */
    }

    .referral-earnings {
        background-color: #99ccff; /* Light sky blue background */
        color: #333; /* Dark text color */
    }

    .active-investments {
        background-color: #ff9999; /* Light coral background */
        color: #333; /* Dark text color */
    }

    .total-withdrawals {
        background-color: #ffcccb; /* Light salmon background */
        color: #333; /* Dark text color */
    }

    .username {
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
    <!-- Menu Icon -->
    <i class="fas fa-bars menu-icon" onclick="toggleNavbar()"></i>
    <!-- Navigation Bar -->
    <nav class="navbar" id="navbar">
        <br><br><br>
        <h2>ALPHA FINANCE</h2>
        <ul>
        <li><a href="home_page.php"><i class="fas fa-home icon"></i>Dashboard</a></li>
        <li><a href="deposits.php"><i class="fas fa-money-bill-alt icon"></i>Deposit</a></li>
        <li><a href="summary.php"><i class="fas fa-file-alt icon"></i>Summary</a></li>
        <li><a href="investments.php"><i class="fas fa-chart-line icon"></i>Invest</a></li>
        <li><a href="active_investments.php"><i class="fas fa-chart-line icon"></i>Active Investments</a></li>
        <li><a href="withdraw.php"><i class="fas fa-credit-card icon"></i>Withdrawals</a></li>
        <li><a href="messages.php"><i class="fas fa-envelope icon"></i>Messages</a></li>
        <li><a href="logout.php"><i class="fas fa-sign-out-alt icon"></i>Logout</a></li>
        </ul>
    </nav>
    <!-- Main Content -->
    <div class="container" id="container">
        <div class="username">Welcome, <?php echo $username; ?>!</div>
        <br>
        <div class="section total-deposits">
            <h2>Total Deposits Balance</h2>
            <p>Ksh <?php echo number_format($totalDepositsBalance, 2); ?></p>
        </div>
        <div class="section account-balance">
            <h2>Account Balance</h2>
            <p>Ksh <?php echo number_format($accountBalance, 2); ?></p>
        </div>
        <div class="section total-withdrawn">
            <h2>Total Withdrawn</h2>
            <p>Ksh <?php echo number_format($totalWithdrawn, 2); ?></p>
        </div>
        <div class="section referral-earnings">
            <h2>Referrals Earnings</h2>
            <p>Ksh <?php echo number_format($referralsEarnings, 2); ?></p>
        </div>
        <div class="section active-investments">
            <h2>Total Active Investments</h2>
            <p>Ksh <?php echo number_format($totalActiveInvestments, 2); ?></p>
        </div>
    </div>
    <footer>
        <p>Company. <strong>All Rights Reserved.</strong> Designed By <a href="jmtech.php">JMTech</a></p>
    </footer>

    <script>
        function toggleNavbar() {
            var navbar = document.getElementById('navbar');
            var container = document.getElementById('container');
            navbar.classList.toggle('show');
            container.classList.toggle('shifted');
        }
    </script>
</body>
</html>
