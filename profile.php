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
            background-color: black;
            padding: 20px 0;
            text-align: center;
        }
        .navbar a {
            color: #fff;
            text-decoration: none;
            margin: 0 20px;
            border-radius: 25px;
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
        <a href="home_page.php"><i class="fas fa-home"></i> Home</a>
        <a href="deposits.php"><i class="fas fa-money-bill-alt"></i> Deposit</a>
        <a href="investments.php"><i class="fas fa-chart-line"></i> Invest</a>
        <a href="withdraw.php"><i class="fas fa-money-check-alt"></i> Cashouts</a>
        <a href="profile.php"><i class="fas fa-user"></i> Profile</a>
    </div>

    <div class="container">
        <table>
            <tr>
                <th>Attribute</th>
                <th>Value</th>
            </tr>
            <tr>
                <td>Username</td>
                <td>johndoe123</td>
            </tr>
            <tr>
                <td>Phone Number</td>
                <td>254123456789</td>
            </tr>
            <tr>
                <td>Balance</td>
                <td>Ksh 10,000</td>
            </tr>
        </table>
        <a href="edit_profile.php" class="edit-profile-link"><i class="fas fa-edit"></i> Edit Profile</a>

        <a href="logout.php" class="logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>

    <div class="footer">
        <p>Company. All Rights Reserved. Designed By <a href="jmtech.php">JMTech</a></p>
    </div>
</body>
</html>
