<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "alpha";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Update status to "Matured" for investments that have exceeded the maturity date
$updateSql = "UPDATE investments SET status = 'Matured' WHERE maturity_date < NOW() AND status = 'Active'";
if (!$conn->query($updateSql)) {
    die("Error updating investments: " . $conn->error);
}

// Fetch all investments from the database
$sql = "SELECT *, TIMESTAMPDIFF(SECOND, NOW(), maturity_date) AS countdown_seconds FROM investments";
$result = $conn->query($sql);

if (!$result) {
    die("Error fetching investments: " . $conn->error);
}

// Function to format countdown
function formatCountdown($seconds) {
    $days = floor($seconds / (60 * 60 * 24));
    $hours = floor(($seconds % (60 * 60 * 24)) / (60 * 60));
    $minutes = floor(($seconds % (60 * 60)) / 60);
    $seconds = $seconds % 60;

    return sprintf("%02d days, %02d hrs, %02d mins, %02d secs", $days, $hours, $minutes, $seconds);
}

// Function to calculate earnings based on amount and package name
function calculateEarnings($amount, $packageName) {
    // Dummy logic for calculating earnings. Adjust this based on your actual logic.
    $interestRate = 0.05; // 5% interest rate as an example
    if ($packageName === "Gold") {
        $interestRate = 0.1; // 10% interest rate for Gold package
    } elseif ($packageName === "Silver") {
        $interestRate = 0.07; // 7% interest rate for Silver package
    }
    return $amount * $interestRate;
}


// Function to calculate total amount
function calculateTotalAmount($totalMaturityValues) {
    return array_sum($totalMaturityValues);
}

// Function to calculate total expected earnings
function calculateTotalEarnings($totalMaturityValues) {
    $totalEarnings = 0;
    foreach ($totalMaturityValues as $value) {
        $totalEarnings += calculateEarnings($value, ""); // You may need to adjust this based on your logic
    }
    return $totalEarnings;
}

// Function to calculate total maturity value
function calculateTotalMaturityValue($totalMaturityValues) {
    return array_sum($totalMaturityValues);
}

// Function to calculate net profit/loss
function calculateNetProfitLoss($totalMaturityValues) {
    $totalEarnings = calculateTotalEarnings($totalMaturityValues);
    $totalAmount = calculateTotalAmount($totalMaturityValues);
    $netProfitLoss = $totalEarnings - $totalAmount;
    return $netProfitLoss;
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

<div class="container" id="content">

<div class="image" style="text-align: center; margin-top: 20px;">
    <img src="images/alpha.webp" class="image2" alt="avatar" style="width: 60px; height: 60px; border-radius: 50%; border: 2px solid #444;">
</div>

        <h2>Running Investments</h2>
        <table>
            <thead>
                <tr>
                    <th>Unique ID</th>
                    <th>Username</th>
                    <th>Package Name</th>
                    <th>Duration (days)</th>
                    <th>Maturity Date</th>
                    <th>Status</th>
                    <th>Amount (Ksh)</th>
                    <th>Countdown</th>
                    <th>Expected Earnings (Ksh)</th>
                    <th>Total Maturity Value (Ksh)</th>
                </tr>
            </thead>
            <tbody id="investments-table-body">
                <?php
                $totalMaturityValues = []; // Array to store total maturity values for each user

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $earnings = calculateEarnings($row['amount'], $row['package_name']);
                        $totalMaturityValue = $row['amount'] + $earnings;

                        // Store or accumulate total maturity value for each user
                        if (!isset($totalMaturityValues[$row['username']])) {
                            $totalMaturityValues[$row['username']] = 0;
                        }
                        $totalMaturityValues[$row['username']] += $totalMaturityValue;

                        echo "<tr>
                                <td>" . $row['id'] . "</td>
                                <td>" . $row['username'] . "</td>
                                <td>" . $row['package_name'] . "</td>
                                <td>" . $row['duration'] . "</td>
                                <td>" . $row['maturity_date'] . "</td>
                                <td class='status-" . strtolower($row['status']) . "'>" . $row['status'] . "</td>
                                <td>" . $row['amount'] . "</td>
                                <td id='countdown-" . $row['id'] . "'>" . formatCountdown($row['countdown_seconds']) . "</td>
                                <td>" . number_format($earnings, 2) . "</td>
                                <td>" . number_format($totalMaturityValue, 2) . "</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='10'>No investments found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> Your Website. All rights reserved. | Designed by <a href="mailto:mathembo62@gmail.com">Maureen Athembo</a></p>
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
        function updateCountdowns() {
            var countdownElements = document.querySelectorAll('[id^="countdown-"]');
            countdownElements.forEach(function(element) {
                var countdownValue = element.innerHTML;
                var parts = countdownValue.split(' ');
                var days = parseInt(parts[0]);
                var hours = parseInt(parts[2]);
                var minutes = parseInt(parts[4]);
                var seconds = parseInt(parts[6]);

                var totalSeconds = days * 24 * 60 * 60 + hours * 60 * 60 + minutes * 60 + seconds;

                if (totalSeconds > 0) {
                    totalSeconds--;

                    var newDays = Math.floor(totalSeconds / (24 * 60 * 60));
                    var newHours = Math.floor((totalSeconds % (24 * 60 * 60)) / (60 * 60));
                    var newMinutes = Math.floor((totalSeconds % (60 * 60)) / 60);
                    var newSeconds = totalSeconds % 60;

                    element.innerHTML = (newDays < 10 ? '0' : '') + newDays + " days, " + 
                                        (newHours < 10 ? '0' : '') + newHours + " hrs, " + 
                                        (newMinutes < 10 ? '0' : '') + newMinutes + " mins, " + 
                                        (newSeconds < 10 ? '0' : '') + newSeconds + " secs";
                } else {
                    element.innerHTML = "Matured";
                }
            });
        }

        setInterval(updateCountdowns, 1000);
    </script>
</body>
</html>
