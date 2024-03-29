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

// Initialize $username as 'Guest' if not set
$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Main';
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

        /* Navbar styles */
        .navbar {
            background-color: green;
            color: #fff;
            padding: 0px;
            text-align: center;
            position: sticky;
            top: 0;
            z-index: 1000; /* Ensure the navbar is above other content */
        }

        .navbar a {
            color: #fff;
            text-decoration: none;
            margin: 0 10px;
            font-size: 18px;
        }

        .admin-panel {
            flex: 1; /* Expand to fill remaining vertical space */
            padding: 20px;
            max-width: 400px;
            margin: 0 auto;
            background-color: transparent;
        }

        .dashboard {
            background-color: #fff;
            padding: 10px;
            border-radius: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center; /* Center align the content */
        }

        .dashboard h2 {
            margin-top: 0;
            font-size: 25px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 0px;
            margin-bottom: 0px;
        }

        .dashboard ul {
            list-style-type: none;
            padding: 40px;
            text-align: left; /* Reset text alignment for list items */
        }

        .dashboard li {
            margin-bottom: 15px;
        }

        .dashboard a {
            text-decoration: none;
            color: black;
            font-size: 18px;
            display: block;
            padding: 15px;
            border-radius: 25px;
            transition: background-color 0.3s;
        }

        .dashboard a:hover {
            background-color:lavender;
        }

          /* Style for buttons */
          .action-buttons {
            margin-top: 10px; /* Adjusted margin top */
            text-align: center;
        }

        .action-buttons a {
            display: inline-block;
            margin: 5px;
            padding: 10px 20px;
            border-radius: 25px;
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .action-buttons a:hover {
            cursor: pointer;
        }

        .action-buttons .btn-primary {
            background-color: #007bff;
        }

        .action-buttons .btn-primary:hover {
            background-color: #0056b4;
        }

        .action-buttons .btn-danger {
            background-color: #dc3545;
        }

        .action-buttons .btn-danger:hover {
            background-color: #bd2130;
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
    <h1>ALPHA FINANCE ADMIN PANEL</h1> <!-- Title added here -->
</div>

<header>
    <h1>Welcome, <?php echo $admin_username; ?>!</h1> <!-- Display admin username -->
</header>

<main>
    <p>This is the admin dashboard. Feel free to navigate through the Admins Dashboard.</p>
</main>

<div class="admin-panel">
    <div class="dashboard">
        <div class="image" style="text-align: center;">
            <img src="images/aplha.webp" class="image2" alt="avatar" style="max-width: 20%; height: auto;">
        </div>
        <h2><?php echo $username ?> 
        <br>Admin Panel Dashboard</h2>
        <ul>
            <li><a href="displayadmins.php">Admins</a></li>
            <li><a href="display_users.php">User Management</a></li>
            <li><a href="display_investments.php">Investments Records</a></li>
            <li><a href="admin_announcements.php"> Post Announcements</a></li>
            <li><a href="cashouts_records.php">Cashouts</a></li>
        </ul>
    </div>

    <!-- Action buttons -->
    <div class="action-buttons">
        <a href="#" class="btn btn-primary" onclick="goBack()">Go Back</a>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
</div>
<br><br><br>
<footer>
    <p>&copy; <?php echo date("Y"); ?> Admin Dashboard. All rights reserved. Designed By <a href="jmtech.php">JMTech</a></p>
</footer>

</body>
</html>
