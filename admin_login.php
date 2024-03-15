<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    
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
        .container {
            max-width: 20%;
            padding: 20px;
            background-color: #fff;
            border-radius: 25px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: auto;
            margin-top: 20px;
            margin-bottom: auto; /* Added */
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 6px;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .password-toggle {
            position: relative;
        }
        .password-toggle input[type="password"] {
            padding-right: 30px;
        }
        .password-toggle .toggle-password {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color:black;
            color: #fff;
            border: none;
            border-radius: 25px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
       
        .navbar a {
        padding: 10px 20px; /* Adjust padding as needed */
    }
    .navbar a:hover {
        background-color: green; /* Change to desired hover background color */
        color: #333; /* Change to desired hover text color */
    }

    .button {
    background-color: transparent;
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

.button:active {
    transform: translateY(1px);
}


    </style>
</head>
<body>

<div class="navbar">
    <a href="admin_register.php" class="button" id="adminBtn">Register as Admin</a>
    <a href="admin_login.php" class="button" id="adminBtn">Login as Admin</a>
    <a href="user_register.php" class="button" id="registerBtn">Register as User</a>
    <a href="user_login.php" class="button" id="loginBtn">Login as User</a>
</div>

</div>

<div class="container">
    <div class="image" style="text-align: center;">
        <img src="images/aplha.webp" class="image2" alt="avatar" style="max-width: 30%; height: auto;">
    </div>
    <h2>Admin Login</h2>
    
    <form action="adlogin_process.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" autocomplete="off" required><br><br>

        <div class="password-toggle">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" autocomplete="off" required>
            <span class="toggle-password" onclick="togglePasswordVisibility()">Show</span>
        </div><br><br>

        <button type="submit">Login</button>
       
    </form>
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
<script>
    function togglePasswordVisibility() {
        var passwordField = document.getElementById("password");
        var toggleButton = document.querySelector(".toggle-password");

        if (passwordField.type === "password") {
            passwordField.type = "text";
            toggleButton.textContent = "Hide";
        } else {
            passwordField.type = "password";
            toggleButton.textContent = "Show";
        }
    }
</script>

</body>
</html>
