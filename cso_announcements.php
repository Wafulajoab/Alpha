<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSO Announcements</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* CSS styles */
        body {
            background: rgba(244, 244, 247, 0.973);
            font-family: Arial, sans-serif;
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            position: fixed;
            top: 0;
            left: 0;
            width: 50%; /* Set body width to 50% */
            height: 100%;
            overflow-x: hidden; /* Hide horizontal scrollbar */
        }

        ::after,
        ::before {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        .navbar ul li a::after {
            position: absolute;
            content: "";
            bottom: 0;
            left: 50%;
            width: 0%;
            height: 2px;
            background-color: rgb(245, 243, 243);
            transition: 0.4s ease-out;
            align-items: center;
        }

        .navbar ul li a:hover::after {
            /* width: 100%; */
            left: 0;
        }

        nav {
            position: fixed;
            width: 100%;
            top: 0;
            height: 10vh;
        }

        .container {
            background-color: white;
            width: 100%;
            z-index: 100%;
            margin-top: 70px; /* Adjust according to your navbar height */
        }

        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 60px;
            background-color: purple;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
        }

        .navbar ul {
            display: flex;
            list-style-type: none;
            top: 0;
        }

        .navbar ul li {
            padding: .5rem;
            margin: .5rem;
        }

        .navbar ul li a {
            text-decoration: none;
            color: rgb(250, 246, 246);
            font-size: 1rem;
            font-weight: bold;
        }

        .navbar h2 {
            font-size: 1.5rem;
            padding: 0.5px;
            margin: 1.5rem;
            font-family: Arial, sans-serif;
            color: rgb(250, 245, 245);
        }

        .announcements {
            margin-top: 20px; /* Adjust according to your navbar and container height */
            max-height: 70vh; /* Set maximum height for scrolling */
            overflow-y: auto; /* Enable vertical scrolling */
            padding-right: 15px; /* Add space for scrollbar */
        }

        .announcement {
            margin-bottom: 10px;
            padding: 10px;
            background-color: #f2f2f2;
            border-radius: 5px;
        }

    </style>
</head>
<body>
<nav>
    <div class="container">
        <div class="navbar">
            <h2>KEMU SECURITY SYSTEM</h2>
            <ul>
            <a href="home_page.php"><i class="fas fa-home icon"></i>Home</a>
            <a href="deposits.php"><i class="fas fa-money-bill-alt icon"></i>Deposit</a>
            <a href="summary.php"><i class="fas fa-file-alt"></i>Summary</a>
            <a href="investments.php"><i class="fas fa-chart-line icon"></i>Invest</a>
            <a href="updates.php"><i class="fas fa-bullhorn"></i>Updates</a>
            <a href="withdraw.php"><i class="fas fa-money-check-alt icon"></i>Cashout</a>
            <a href="profile.php"><i class="fas fa-user icon"></i>Profile</a>
            </ul>
        </div>
    </div>
</nav>
<br>
<div class="container">
    <h2>CSO Announcements</h2>
    <div class="announcements" id="announcement-container">
        <?php include 'fetchadmin_announcements.php'; ?>
    </div>
</div>


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
