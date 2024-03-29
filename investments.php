<?php
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
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Investments</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Font Awesome CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: darkgrey;
        }
        .navbar {
            background-color:#444;
            padding: 20px 0;
            text-align: center;
            position: fixed; /* Fixed positioning */
            top: 0; /* Fixed to the top */
            width: 100%; /* Full width */
        }
        .navbar a {
            color: #fff;
            text-decoration: none;
            margin: 0 20px;
            border-radius: 25px;
        }
        .navbar .icon {
            font-size: 20px;
            margin-right: 5px;
        }
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 60px; /* Adjusted margin-top for content below the fixed navbar */
        }
        .section {
            width: 40%;
            margin: 10px 0; /* Adjusted margin */
            padding: 20px;
            text-align: center;
            border-radius: 10px;
        }
        .investment-options-section {
            background-color: #ffcccb; /* Light salmon background */
            color: #333; /* Dark text color */
        }
        .current-investment-section {
            background-color: #ff9999; /* Light coral background */
            color: #333; /* Dark text color */
        }
        .total-investments-section {
            background-color: #99ff99; /* Light green background */
            color: #333; /* Dark text color */
        }
        .invest-now-section {
            background-color: #99ccff; /* Light sky blue background */
            color: #333; /* Dark text color */
        }
        button {
            background-color:green;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #8a2be2; /* Dark purple on hover */
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    
    <div class="navbar">
        <a href="home_page.php"><i class="fas fa-home icon"></i>Home</a>
        <a href="deposits.php"><i class="fas fa-money-bill-alt icon"></i>Deposit</a>
        <a href="summary.php"><i class="fas fa-file-alt"></i>Summary</a>
        <a href="investments.php"><i class="fas fa-chart-line icon"></i>Invest</a>
        <a href="updates.php"><i class="fas fa-bullhorn"></i>Updates</a>
        <a href="withdraw.php"><i class="fas fa-money-check-alt icon"></i>Cashout</a>
        <a href="profile.php"><i class="fas fa-user icon"></i>Profile</a>
    </div>

    <div class="container">
        <!-- Silver Package form -->
        <div class="section investment-options-section">
            <form action="investments_process.php" method="POST">
                <h3>Silver Package</h3>
                <p>Earn 15% after 2 days</p>
                <p>Minimum capital - Ksh 500 (2 days)</p>
                <p>Maximum capital - Ksh 150,000 </p>
                <input type="hidden" name="package_name" value="Silver Package">
                <input text="number" name="amount" placeholder="Enter investment amount (Ksh)" style="width: 200px; height: 30px;">
                <input type="hidden" name="duration" value="2">
                <button type="submit">Invest Now</button>
            </form>
        </div>

        <!-- Bronze Package form -->
        <div class="section current-investment-section">
            <form action="investments_process.php" method="POST">
                <h3>Bronze Package</h3>
                <p>Earn 30% after 3 days</p>
                <p>Minimum capital - Ksh 1000 (3 days)</p>
                <p>Maximum capital - Ksh 150,000 </p>
                <input type="hidden" name="package_name" value="Bronze Package">
                <input text="number" name="amount" placeholder="Enter investment amount (Ksh)" style="width: 200px; height: 30px;">
                <input type="hidden" name="duration" value="3">
                <button type="submit">Invest Now</button>
            </form>
        </div>

        <!-- Gold Package form -->
        <div class="section total-investments-section">
            <form action="investments_process.php" method="POST">
                <h3>Gold Package</h3>
                <p>Earn 50% after 6 days</p>
                <p>Minimum capital - Ksh 2000 (6 days)</p>
                <p>Maximum capital - Ksh 150,000 </p>
                <input type="hidden" name="package_name" value="Gold Package">
                <input text="number" name="amount" placeholder="Enter investment amount (Ksh)" style="width: 200px; height: 30px;">
                <input type="hidden" name="duration" value="6">
                <button type="submit">Invest Now</button>
            </form>
        </div>

        <!-- Executive Package form -->
        <div class="section invest-now-section">
            <form action="investments_process.php" method="POST">
                <h3>Executive Package</h3>
                <p>Earn 100% after 10 days</p>
                <p>Minimum capital - Ksh 5000 (10 days)</p>
                <p>Maximum capital - Ksh 150,000 </p>
                <input type="hidden" name="package_name" value="Executive Package">
                <input text="number" name="amount" placeholder="Enter investment amount (Ksh)" style="width: 200px; height: 30px;">
                <input type="hidden" name="duration" value="10">
                <button type="submit">Invest Now</button>
            </form>
        </div>

        <!-- Running Investments Table with Countdown Column -->
        <div class="container">
            <h2>Running Investments</h2>
            <style>
                table {
                    width: 100%;
                    border-collapse: collapse;
                    margin-bottom: 20px;
                }

                th, td {
                    padding: 10px;
                    text-align: left;
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

                .status-closed {
                    color: red;
                }
            </style>
           
                <tbody id="investments-table-body"> <!-- Added ID for JavaScript manipulation -->
                    <!-- Sample data for demonstration purposes -->
                    <?php
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

// Check if there are any active investments
$sql = "SELECT * FROM investments WHERE status = 'Active'";
$result = $conn->query($sql);

// Fetch running investments from the database again to get end dates for countdown
$sql = "SELECT * FROM investments WHERE status = 'Active'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Display the investments table
    echo '<table border="1">
            <thead>
                <tr>
                    <th>Investment ID</th>
                    <th>Package Name</th>
                    <th>Amount (Ksh)</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Countdown</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>';

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        // Check if the required array keys exist before accessing them
        $investmentId = isset($row['investment_id']) ? $row['investment_id'] : '';
        $packageName = isset($row['package_name']) ? $row['package_name'] : '';
        $amount = isset($row['amount']) ? $row['amount'] : '';
        $startDate = isset($row['start_date']) ? $row['start_date'] : '';
        $endDate = isset($row['end_date']) ? $row['end_date'] : '';

        echo "<tr>
                <td>" . $investmentId . "</td>
                <td>" . $packageName . "</td>
                <td>" . $amount . "</td>
                <td>" . $startDate . "</td>
                <td>" . $endDate . "</td>
                <td><span id='countdown-" . $investmentId . "'></span></td>
                <td><span class='status-active'>Active</span></td>
              </tr>";
    }

    echo '</tbody>
        </table>';
} else {
    echo "No active investments found.";
}

// Close the database connection
$conn->close();
?>

                </tbody>
            </table>
        </div>
    </div>

    <script>
        // JavaScript code for calculating and updating countdown
        function updateCountdown(endDate, countdownElementId) {
            var countDownDate = new Date(endDate).getTime();

            var x = setInterval(function() {
                var now = new Date().getTime();
                var distance = countDownDate - now;

                var days = Math.floor(distance / (1000 * 60 * 60 * 24));

                document.getElementById(countdownElementId).innerHTML = days + " days";

                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById(countdownElementId).innerHTML = "Matured";
                }
            }, 1000);
        }

        // Call the updateCountdown function for each investment
        <?php
        // Fetch running investments from the database again to get end dates for countdown
        $sql = "SELECT * FROM investments WHERE status = 'Active'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "updateCountdown('" . $row['end_date'] . "', 'countdown-" . $row['investment_id'] . "');";
            }
        }
        ?>
    </script>

    <footer id="footer">
        <style>
            #footer {
                position: fixed;
                bottom: 0;
                left: 0;
                width: 100%;
                background: lavender;
                text-align: center;
                padding: 0.1rem;
            }

            .footer p {
                justify-content: center;
            }

            .footer a {
                color: green;
                text-decoration: underline;
                font-weight: bold;
            }
        </style>

        <div class="footer">
            <p><span>Company.<strong>All Rights Reserved.</strong>Designed By <a href="jmtech.php">JMTech</a></span></p>
        </div>
    </footer>
</body>
</html>
