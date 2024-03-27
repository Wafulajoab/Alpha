<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KEMU Security System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
         body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: darkgrey;
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
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 60px; /* Adjusted margin-top for content below the fixed navbar */
        }
        /* CSS for Footer */
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

        /* CSS for Buttons */
        .button-container {
            width: 100%;
            margin: 0 auto;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            margin-top: 20px;
        }

        .button-container button {
            margin: 10px;
            padding: 10px 30px;
            background-color: purple;
            color: white;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .button-container button:hover {
            background-color: green;
        }

        /* CSS for Announcement Div */
        .announcement-container {
            width: 20%;
            margin: 0 auto;
            text-align: center;
            margin-top: 100px; /* Adjust margin-top as needed */
            background-color: #f5f5f5; /* Set background color */
            padding: 3%; /* Add padding for better appearance */
            border-radius: 25px; /* Add border-radius for rounded corners */
            position: relative; /* Added position relative */
        }

        .announcement-title {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .announcement-logo {
            margin-bottom: 10px;
        }

        .announcement-logo img {
            width: 30%; /* Set width to 10% of the container */
        }
    </style>
</head>
<body>
    <nav>
        <div class="container">
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
    </div>
        </div>
    </nav>

    <!-- Announcements Div -->
    <div class="announcement-container">
        <div class="announcement-title">Announcements</div>
        <!-- Logo and Buttons section -->
        <div class="logo-and-buttons">
            <div class="announcement-logo">
                <img src="images/aplha.webp" alt="Logo">
            </div>
            <div class="button-container">
                <button onclick="window.location.href='cso_announcements.php'"> Chief Security Officer(CSO) Announcement</button>
                <button onclick="window.location.href='normal_announcements.php'">Normal Announcements</button>
            </div>
        </div>
    </div>

    <footer id="footer">
        <div class="footer">
            <p><span>Company.<strong>All Rights Reserved.</strong>Designed By <a href="jmtech.php">JMTech</a></span></p>
        </div>
    </footer>
</body>
</html>
