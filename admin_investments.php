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
        <br><br><br>
        <h2>ADMIN PANEL</h2>
        <ul>
            <li><a href="admin_dashboard.php"><i class="fas fa-home icon"></i>Dashboard</a></li>
            <li><a href="admin_users.php"><i class="fas fa-users icon"></i>Manage Users</a></li>
            <li><a href="admin_deposits.php"><i class="fas fa-money-bill-alt icon"></i>Manage Deposits</a></li>
            <li><a href="admin_withdrawals.php"><i class="fas fa-credit-card icon"></i>Manage Withdrawals</a></li>
            <li><a href="admin_investments.php"><i class="fas fa-chart-line icon"></i>Manage Investments</a></li>
            <li><a href="admin_messages.php"><i class="fas fa-envelope icon"></i>Messages</a></li>
            <li><a href="admin_logout.php"><i class="fas fa-sign-out-alt icon"></i>Logout</a></li>
        </ul>
    </nav>
<br><br>
    <div class="container" id="content">
        <h2>Manage All Investments</h2>
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
                </tr>
            </thead>
            <tbody id="investments-table-body">
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row['id'] . "</td>
                                <td>" . $row['username'] . "</td>
                                <td>" . $row['package_name'] . "</td>
                                <td>" . $row['duration'] . "</td>
                                <td>" . $row['maturity_date'] . "</td>
                                <td class='status-" . strtolower($row['status']) . "'>" . $row['status'] . "</td>
                                <td>" . $row['amount'] . "</td>
                                <td id='countdown-" . $row['id'] . "'>" . formatCountdown($row['countdown_seconds']) . "</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>No investments found.</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <footer>
        <p>Company. <strong>All Rights Reserved.</strong> Designed By <a href="jmtech.php">JMTech</a></p>
    </footer>

    <!-- JavaScript -->
    <script>
        function toggleNavbar() {
            const navbar = document.getElementById('navbar');
            const content = document.getElementById('content');
            navbar.classList.toggle('show');
            if (navbar.classList.contains('show')) {
                content.style.marginLeft = '200px';
            } else {
                content.style.marginLeft = '0';
            }
        }

        // Function to update countdowns
        function updateCountdowns() {
            const rows = document.querySelectorAll('#investments-table-body tr');
            rows.forEach(row => {
                const countdownCell = row.querySelector('td[id^="countdown-"]');
                if (countdownCell) {
                    let timeParts = countdownCell.textContent.split(/[\s,]+/);
                    let days = parseInt(timeParts[0]);
                    let hours = parseInt(timeParts[2]);
                    let minutes = parseInt(timeParts[4]);
                    let seconds = parseInt(timeParts[6]);

                    if (seconds > 0) {
                        seconds--;
                    } else {
                        if (minutes > 0) {
                            seconds = 59;
                            minutes--;
                        } else {
                            if (hours > 0) {
                                seconds = 59;
                                minutes = 59;
                                hours--;
                            } else {
                                if (days > 0) {
                                    seconds = 59;
                                    minutes = 59;
                                    hours = 23;
                                    days--;
                                }
                            }
                        }
                    }
                    countdownCell.textContent = `${days} days, ${hours} hrs, ${minutes} mins, ${seconds} secs`;
                }
            });
        }

        setInterval(updateCountdowns, 1000);
    </script>
</body>
</html>
