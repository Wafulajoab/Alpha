
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Include Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Styles for body, navbar, and footer */
        body {
            background-color: darkgrey;
            border-radius: 25px;
            font-family: Arial, sans-serif;
            margin: 0; /* Added to remove default margin */
            padding: 0; /* Added to remove default padding */
        }
        .navbar {
            background-color:#444;
            position: fixed; /* Fixed position */
            top: 0; /* Fixed to top */
            left: 0; /* Fixed to left */
            right: 0; /* Fixed to right */
            z-index: 1000; /* Ensuring navbar stays on top */
            padding: 10px ;
            text-align: center;
            width: 100%; /* Full width */
        }
     

        /* Existing Styles */
        img {
            width: 5rem;
            height: 5rem;
            border-radius: 50%;
        }
        .imgcontainer {
            text-align: center;
            margin-top: 3rem;
        }
        form {
            background-color: whitesmoke;
            opacity: 1;
            border-radius: 25px;
            width: 20%; /* Adjust the width as needed */
            margin: auto; /* Center the form horizontally */
            margin-top: 50px; /* Adjust the top margin as needed */
            padding: 10px; /* Add padding for better spacing */
        }
        input[type=text], input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid wheat;
            box-sizing: border-box;
            border-radius: 8px;
        }
        button {
            background-color: cyan;
            padding: 14px 20px;
            margin: 8px;
            border: none;
            cursor: pointer;
            width: 100%;
            border-radius: 25px;
            opacity: 0.9;
        }
        button:hover {
            opacity: 1;
        }
        .psw a {
            color: rgb(253, 253, 253);
            text-decoration: none;
        }
        input[type=text]:focus, input[type=password]:focus {
            background-color: rgb(255, 255, 255);
            outline: none;
        }
        .cancelbtn {
            padding: 14px 20px;
            background-color: rgb(0, 26, 255);
        }
        .signupbtn {
            float: center;
            width: 50%;
        }
        .container {
            padding: 16px;
        }
        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }
        @media screen and (max-width: 300px) {
            .cancelbtn, .signupbtn {
                width: 100%;
            }
        }
    </style>
</head>
<body>

<div class="navbar">
    <h1 style="color: white; margin: 0;">Alpha Finance</h1>
</div>

<br><br>
<form action="users_login_process.php" method="post">
    <div class="imgcontainer">
        <img src="images/aplha.webp" alt="Avatar" class="avatar">
    </div>
    <p class="error-message">
        <?php
        if (isset($_GET['error']) && $_GET['error'] == 'invalid') {
            echo "Invalid username or password. Please try again.";
        }
        ?>
    </p>
    <div class="container">
        <label class="username" for="username"><b><i class="fas fa-user"></i> Username</b></label>
        <input type="text" placeholder="Enter Username" name="username" required autocomplete="off">

        <label class="password" for="psw"><b><i class="fas fa-lock"></i> Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required autocomplete="off">

        <button id="buttonMe" type="submit"><i class="fas fa-sign-in-alt"></i> Login</button>
        <label>
            <input type="checkbox" checked="checked" name="remember">
            <span class="remember"><i class="fas fa-check"></i> Remember me</span>
        </label>
    </div>

    <div class="container" style="background-color: whitesmoke; border-bottom-left-radius: 25px; border-bottom-right-radius: 25px;">
        <li><a href="user_register.php"><i class="fas fa-user-plus"></i> Register</a></li>
        <span class="psw"><a href="#" style="font-family: Arial, sans-serif; color: rgb(1, 1, 104);"><i class="fas fa-question-circle"></i> Forgot password?</a></span>
    </div>
</form>

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
