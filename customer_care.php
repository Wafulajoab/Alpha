<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Include the database connection file
include 'db_connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Care</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Font Awesome CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: darkgrey;
            display: flex;
            flex-direction: column;
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
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            padding: 25px;
            text-align: center;
            width: 90%;
            max-width: 600px;
            margin-bottom: 50px; /* Space for the footer */
        }

        .container h2 {
            margin-bottom: 20px;
            font-size: 1.75rem;
            color: #444;
        }

        .container a {
            color: #007BFF;
            text-decoration: none;
            font-size: 1.2rem;
        }

        .container a:hover {
            text-decoration: underline;
        }

        footer {
            background-color: #444;
            color: white;
            text-align: center;
            padding: 10px;
            position: absolute;
            bottom: 0;
            width: 100%;
            font-size: 0.9rem;
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

<div class="container">
    <h2>Alpha Finance <br> Contact Customer Care</h2>
    <p>Click the link below to contact us via WhatsApp.</p>
    <a href="https://wa.me/254791302603" target="_blank"><i class="fas fa-headset icon"></i> Customer Care</a>
</div>

<footer>
    &copy; 2024 ALPHA FINANCE. All Rights Reserved.
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
</script>

</body>
</html>
