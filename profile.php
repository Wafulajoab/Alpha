<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Font Awesome CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .edit-profile-link, .logout {
            display: inline-block;
            padding: 10px 20px;
            background-color: #8a2be2;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .edit-profile-link:hover, .logout:hover {
            background-color: #5f04b4;
        }
         .navbar {
            background-color: #444;
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
        .footer {
            background: lavender;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
        }
        .footer a {
            color: green;
            text-decoration: underline;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="navbar">
        <a href="home_page.php"><i class="fas fa-home icon"></i>Home</a>
        <a href="deposits.php"><i class="fas fa-money-bill-alt icon"></i>Deposit</a>
        <a href="investments.php"><i class="fas fa-chart-line icon"></i>Invest</a>
        <a href="active_investments.php"><i class="fas fa-chart-line icon"></i>Active Investments</a>
        <a href="withdraw.php"><i class="fas fa-money-check-alt icon"></i>Cashout</a>
        <a href="profile.php"><i class="fas fa-user icon"></i>Profile</a>
</div>
<br><br><br><br>
    <div class="container">
        <table>
            <tr>
                <th>Attribute</th>
                <th>Value</th>
            </tr>
            <?php
                // Assuming you have established a database connection
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "alpha";

                $conn = new mysqli($servername, $username, $password, $database);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT username, phone_number, balance FROM users WHERE id = 1"; // Assuming the user's ID is 1, modify this query accordingly
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>Username</td>";
                        echo "<td>" . $row["username"] . "</td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td>Phone Number</td>";
                        echo "<td>" . $row["phone_number"] . "</td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td>Balance</td>";
                        echo "<td>Ksh " . $row["balance"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "0 results";
                }
                $conn->close();
            ?>
        </table>
        <a href="edit_profile.php" class="edit-profile-link"><i class="fas fa-edit"></i> Edit Profile</a>

        <a href="logout.php" class="logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>

    <div class="footer">
        <p>Company. All Rights Reserved. Designed By <a href="jmtech.php">JMTech</a></p>
    </div>
</body>
</html>
