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
            background-image: url('images/aplha.webp');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
            background-color: darkgrey;
        }
        .navbar {
            background-color: #444;;
            width: 100%;
            padding: 15px 0;
            text-align: center;
        }
        .navbar .dropdown {
            position: relative;
            display: inline-block;
            color: white;
     
    
         
        }
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #444;
            min-width: 180px;
            z-index: 1;
        }
        .dropdown-content a {
            color: white;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
           
        }
        .dropdown:hover .dropdown-content {
            display: block;
        }
        .container {
            text-align: left;
            margin-bottom: 50px;
        }
        .button {
            padding: 10px 20px;
            margin: 10px;
            font-size: 18px;
            background-color: yellow;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .button:hover {
            background-color: white;
        }
        
    </style>
</head>
<body>
 
    <div class="navbar">
        <div class="dropdown">
            <span>&#9776;</span>
            <div class="dropdown-content">
                <a href="admin_register.php">Register as Admin</a>
                <a href="admin_login.php">Login as Admin</a>
                <a href="user_register.php">Register as User</a>
                <a href="user_login.php">Login as User</a>
            </div>
        </div>
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
