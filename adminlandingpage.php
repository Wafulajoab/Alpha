<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <title>Landing Page</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-image: url('images/alpha.webp');
            background-size: 70%;
            background-position: center;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
            background-color: darkgrey;
        }
       
        .navbar {
            background-color:transparent;
            padding: 20px 0;
            text-align: center;
            position: fixed; /* Make the navbar fixed */
            width: 100%; /* Set the width to 100% */
            top: 0; /* Align the navbar to the top */
            z-index: 999; /* Ensure the navbar stays on top of other content */
        }

        .navbar a {
            color: black;
            text-decoration: none;
            margin: 0 20px;
            border-radius: 25px;
        }

        .button {
            background-color:yellow;
            color: green;
            text-decoration: none;
            font-weight: bold;
            border: 2px solid green;
            padding: 8px 16px;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s, border-color 0.3s;
            border-radius: 4px;
        }

        .button:hover {
            background-color: green;
            color: white;
        }

        
    </style>
</head>
<body>
 
<div class="navbar">
    <a href="admin_register.php" class="button" id="adminBtn">Register as Admin</a>
    <a href="admin_login.php" class="button" id="adminBtn">Login as Admin</a>
   
</div>

    <div class="container">
        <!-- <h1>Welcome to KeMU Security System</h1> -->
        <!-- Your other content here -->
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
