<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alpha Investments</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: darkgrey;
        }
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 200px;
            height: 100vh;
            background-color: #444;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 10px;
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

        .container {
            margin-left: 220px; /* Adjust margin-left to accommodate the fixed navbar */
            padding: 20px;
        }
        /* CSS for Footer */
        #footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background: #444;
            text-align: center;
            padding: 0.01rem;
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
            background-color: blue;
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
            background-color: navy; /* Set background color */
            padding: 3%; /* Add padding for better appearance */
            border-radius: 50px; /* Add border-radius for rounded corners */
            position: relative; /* Added position relative */
        }
        .announcement-title {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 20px;
            color: white;
        }
        .announcement-logo {
            margin-bottom: 40px;

        }
        .announcement-logo img {
            width: 50%; /* Set width to 10% of the container */
            border-radius: 100px; /* Add border-radius for rounded corners */
        }
    </style>
</head>
<body>
   <!-- Navigation Bar -->
   <nav class="navbar">
        <h2>ALPHA FINANCE</h2>
        <ul>
            <li><a href="home_page.php"><i class="fas fa-home icon"></i>Home</a></li>
            <li><a href="deposits.php"><i class="fas fa-money-bill-alt icon"></i>Deposit</a></li>
            <li><a href="summary.php"><i class="fas fa-file-alt icon"></i>Summary</a></li>
            <li><a href="investments.php"><i class="fas fa-chart-line icon"></i>Invest</a></li>
            <li><a href="updates.php"><i class="fas fa-bullhorn icon"></i>Updates</a></li>
            <li><a href="withdraw.php"><i class="fas fa-money-check-alt icon"></i>Cashout</a></li>
            <li><a href="profile.php"><i class="fas fa-user icon"></i>Profile</a></li>
        </ul>
    </nav>
    <div class="container">
        <!-- Announcements Div -->
        <div class="announcement-container">
            <div class="announcement-title">Announcements</div>
            <!-- Logo and Buttons section -->
            <div class="logo-and-buttons">
                <div class="announcement-logo">
                    <img src="images/alpha.webp" alt="Logo">
                </div>
                <div class="button-container">
                    <button onclick="window.location.href='cso_announcements.php'"> CEO Announcements</button>
                    <button onclick="window.location.href='normal_announcements.php'">Investors Chat Zone</button>
                </div>
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
