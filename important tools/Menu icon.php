<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deposits</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Font Awesome CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: darkgrey;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        /* Menu icon styles */
        .menu-icon {
            color: white; /* Icon color */
            font-size: 40px; /* Icon size */
            margin-right: 10px; /* Right margin for spacing */
            cursor: pointer; /* Change cursor to pointer on hover */
            position: absolute; /* Position the icon */
            top: 10px; /* Adjust top position */
            left: 10px; /* Adjust left position */
            z-index: 1000; /* Ensure icon appears above other content */
            transition: left 0.3s ease; /* Add transition for sliding effect */
        }

        /* Navbar styles */
        .navbar {
            position: fixed;
            top: 0;
            left: -200px; /* Initially hide the navbar */
            width: 200px;
            height: 100vh;
            background-color: #444;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 0;
            transition: left 0.3s ease; /* Add transition for sliding effect */
        }

        .navbar.show {
            left: 0; /* Show the navbar */
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
            left: 0; /* Adjust to be aligned with the container */
            width: 100%; /* Adjust width based on the navbar width */
            background: #444;
            text-align: center;
            padding: 0.01rem;
            z-index: 999; /* Ensure it stays above other content */
        }

        footer p {
            justify-content: center;
            margin: 0; /* Remove default margin */
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
        <h2>ALPHA FINANCE</h2>
        <ul>
            <li><a href="home_page.php"><i class="fas fa-home icon"></i>Home</a></li>
            <li><a href="deposits.php"><i class="fas fa-money-bill-alt icon"></i>Deposit</a></li>
            <li><a href="summary.php"><i class="fas fa-file-alt icon"></i>Summary</a></li>
            <li><a href="investments.php"><i class="fas fa-chart-line icon"></i>Invest</a></li>
            <li><a href="active_investments.php"><i class="fas fa-chart-line icon"></i>Active Investments</a></li>
            <li><a href="withdraw.php"><i class="fas fa-money-check-alt icon"></i>Cashout</a></li>
            <li><a href="profile.php"><i class="fas fa-user icon"></i>Profile</a></li>
        </ul>
    </nav>

    <!-- Footer -->
    <footer>
        <p>Company. <strong>All Rights Reserved.</strong> Designed By <a href="jmtech.php">JMTech</a></p>
    </footer>

    <!-- JavaScript -->
    <script>
        function toggleNavbar() {
            const navbar = document.getElementById('navbar');
            navbar.classList.toggle('show');
        }
    </script>
</body>
</html>









//nav codes//


<body>
    <!-- Menu Icon -->
    <i class="fas fa-bars menu-icon" onclick="toggleNavbar()"></i>
    
    <!-- Navigation Bar -->
    <nav class="navbar" id="navbar">
        <br><br><br>
        <div class="image" style="text-align: center; margin-top: 20px;">
          <img src="images/alpha.webp" class="image2" alt="avatar" style="width: 150px; height: 150px; border-radius: 50%; border: 2px solid #444;">
        </div>
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

    <!-- Container content goes here -->

    <footer>
        <p>&copy; <?php echo date('Y'); ?> Your Website. All rights reserved. | Designed by <a href="mailto:mathembo62@gmail.com">Maureen Athembo</a></p>
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





//css for nav and footer//

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









body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: darkgrey;
        }
        .container {
            padding: 20px;
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
        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button[type="submit"]:hover {
            background-color: #45a049;
        }
        button[name="action"][value="Rejected"] {
            background-color: #f44336;
        }
        button[name="action"][value="Rejected"]:hover {
            background-color: #e53935;
        }
</table>










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