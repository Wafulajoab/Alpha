
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dongle&family=Open+Sans+Condensed:wght@300&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Inspiration&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Inspiration&family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet"> 
    <title>Admin Register</title>
    <style>
        body {
            background-color: darkgrey;
            border-radius: 25px;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        img {
            width: 5rem;
            height: 5rem;
            border-radius: 50%;
        }
        .imgcontainer {
            text-align: center;
            margin-top: 3rem;
        }
        ::after, ::before {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        form {
            background-color: whitesmoke;
            opacity: 1;
            border-radius: 25px;
            width: 20%;
            margin: auto;
            margin-top: 20px;
            padding: 20px;
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
        .password-container {
            position: relative;
            width: 100%;
        }
        .toggle-password {
            position: absolute;
            right: 10px;
            top: 10px;
            cursor: pointer;
        }
        button {
            background-color: #444;
            color: rgb(252, 252, 252);
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
            text-decoration: rgb(253, 253, 253);
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
        body {
            background-color: #444;
        }
    </style>
</head>
<body>
    <br><br><br>
    <!-- Form -->
    <form action="admin_register_process.php" method="post">
        <div class="container">
            <div class="icon" id="icon">
                <div class="image" style="text-align: center;">
                    <img src="images/alpha.webp" class="image2" alt="avatar">
                </div>
                <div>
                <?php
// Start the session
session_start();

// Include this part in the form body of admin_register.php where you want to display error messages
if (isset($_GET['error'])) {
    if ($_GET['error'] == "emptyfields") {
        echo '<p class="error-message">Fill in all fields!</p>';
    } else if ($_GET['error'] == "passwordcheck") {
        echo '<p class="error-message">Passwords do not match!</p>';
    } else if ($_GET['error'] == "weakpassword") {
        echo '<p class="error-message">Password must be at least 8 characters long and contain at least one lowercase letter, one uppercase letter, one digit, and one special character!</p>';
    } else if ($_GET['error'] == "sqlerror") {
        echo '<p class="error-message">Database error. Please try again!</p>';
    }
} else if (isset($_GET['register']) && $_GET['register'] == "success") {
    echo '<p class="success-message">Registration successful! You can now log in.</p>';
}
?>

                </div>
                <h1 class="sign" style="text-align: center;"><i class="fas fa-user-plus"></i> Admin Sign Up</h1>
                <p class="sign">Please fill this form to register as an admin at Alpha Finance</p>
                <label for="username" class="sign"><b><i class="fas fa-user"></i> Username: ADMIN</b></label>
            
                
                <div class="password-container">
                    <label class="sign" for="psw"><b><i class="fas fa-lock"></i> Password</b></label>
                    <input type="password" class="sign" placeholder="Enter Password" name="psw" id="psw" required autocomplete="off">
                    <i class="fa fa-eye toggle-password" id="toggle-password"></i>
                </div>
                
                <div class="password-container">
                    <label for="psw-confirm" class="sign"><b><i class="fas fa-lock"></i> Confirm Password</b></label>
                    <input type="password" class="sign" placeholder="Confirm Your Password" name="psw-confirm" id="psw-confirm" required autocomplete="off">
                    <i class="fa fa-eye toggle-password" id="toggle-password-confirm"></i>
                </div>
                
                <label>
                    <input type="checkbox" checked="checked" name="remember">
                    <name class="sign"><i class="fas fa-check"></i> Remember me</name>
                </label>
                <p class="sign">By creating an account with this security system, you agree to our <a href="#" style="color:blue">Terms & Privacy</a></p>
                <div class="clearfix">
                    <button class="sign" type="submit" class="signupbtn"><i class="fas fa-check icon"></i> Sign Up</button>
                    <li><a href="admin_login.php"><i class="fas fa-info-circle icon"></i> Already have an account? Login as Admin here</a></li> 
                </div>
            </div>
        </div>
    </form>

    <br><br><br>
    <!-- Footer -->
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
        document.addEventListener('DOMContentLoaded', function() {
            const togglePassword = document.getElementById('toggle-password');
            const password = document.getElementById('psw');
            togglePassword.addEventListener('click', function() {
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);
                this.classList.toggle('fa-eye-slash');
            });

            const togglePasswordConfirm = document.getElementById('toggle-password-confirm');
            const passwordConfirm = document.getElementById('psw-confirm');
            togglePasswordConfirm.addEventListener('click', function() {
                const type = passwordConfirm.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordConfirm.setAttribute('type', type);
                this.classList.toggle('fa-eye-slash');
            });
        });
    </script>
</body>
</html>
