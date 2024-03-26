<?php
session_start();

// Database connection
$servername = "localhost"; // Your database server name
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "alpha"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to fetch total deposits balance
function getTotalDepositsBalance($conn) {
    $userId = $_SESSION['user_id'] ?? 0; // Default value if user_id is not set
    $sql = "SELECT SUM(deposit_amount) AS total_deposits FROM deposits WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    return $row['total_deposits'] ?? 0; // Default value if total_deposits is not set
}

// Function to fetch total withdrawn
function getTotalWithdrawn($conn) {
    $userId = $_SESSION['user_id'] ?? 0; // Default value if user_id is not set
    $sql = "SELECT SUM(withdrawal_amount) AS total_withdrawn FROM withdrawals WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    return $row['total_withdrawn'] ?? 0; // Default value if total_withdrawn is not set
}

// Function to fetch referrals earnings
function getReferralsEarnings($conn) {
    $userId = $_SESSION['user_id'] ?? 0; // Default value if user_id is not set
    $sql = "SELECT SUM(referral_bonus) AS referrals_earnings FROM referrals WHERE referred_by = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    return $row['referrals_earnings'] ?? 0; // Default value if referrals_earnings is not set
}

// Function to fetch active investments
function getActiveInvestments($conn) {
    $userId = $_SESSION['user_id'] ?? 0; // Default value if user_id is not set
    $sql = "SELECT SUM(amount) AS active_investments FROM investments WHERE user_id = ?";
    
    // Check if 'user_id' column exists in the 'investments' table
    $tableCheckQuery = "SHOW COLUMNS FROM investments LIKE 'user_id'";
    $result = $conn->query($tableCheckQuery);
    $columnExists = $result->num_rows > 0;

    if ($columnExists) {
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return $row['active_investments'] ?? 0; // Default value if active_investments is not set
    } else {
        return 0; // Return default value if 'user_id' column doesn't exist
    }
}

// Fetch user's account information
$totalDepositsBalance = getTotalDepositsBalance($conn);
$totalWithdrawn = getTotalWithdrawn($conn);
$accountBalance = $totalDepositsBalance - $totalWithdrawn;
$referralsEarnings = getReferralsEarnings($conn);
$activeInvestments = getActiveInvestments($conn);

// Close the connection
$conn->close();
?>
