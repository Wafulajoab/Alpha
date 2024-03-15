<?php
// Start the session
session_start();

// Check if the admin is logged in
if (!isset($_SESSION['admin_id'])) {
    // If not logged in, redirect to the login page
    header("Location: admin_login.php");
    exit();
}

// Retrieve the admin's information from the session
$admin_id = $_SESSION['admin_id'];
$admin_username = $_SESSION['admin_username'];

// You can now use $admin_id and $admin_username to personalize the dashboard for the logged-in admin
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: darkgrey;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .navbar {
            background-color:#444;
            padding: 20px 0;
            text-align: center;
        }

        .navbar a {
            color: #fff;
            text-decoration: none;
            margin: 0 20px;
            border-radius: 25px;
        }

        footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background: lavender;
            text-align: center;
            padding: 0.1rem;
        }

        footer p {
            justify-content: center;
        }

        footer a {
            color: green;
            text-decoration: underline;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="navbar">
    <a href="#" class="button"><i class="fas fa-chart-bar"></i> Dashboard</a>
    <a href="#" class="button"><i class="fas fa-users"></i> Manage Users</a>
    <a href="#" class="button"><i class="fas fa-file-alt"></i> Manage Posts</a>
    <a href="logout.php" class="button"><i class="fas fa-sign-out-alt"></i> Logout</a>
</div>

<header>
    <h1>Welcome, <?php echo $admin_username; ?>!</h1>
</header>

<main>
    <p>This is the admin dashboard. You can add your content here.</p>
</main>

<footer>
    <p>&copy; <?php echo date("Y"); ?> Admin Dashboard. All rights reserved. Designed By <a href="jmtech.php">JMTech</a></p>
</footer>

</body>
</html>
