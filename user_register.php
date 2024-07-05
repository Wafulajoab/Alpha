<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="css/register.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dongle&family=Open+Sans+Condensed:wght@300&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Inspiration&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Inspiration&family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet"> 
    <title>Register</title>
    <style>
        /* Navbar Styles */
        .navbar {
            position: fixed;
            width: 100%;
            top: 0;
            background-color:#444;
            padding: 10px ;
            text-align: center;
            z-index: 1000;
        }
        .navbar ul {
            list-style-type: none;
            margin: 0;
            padding: 20px 0;
        }
        .navbar ul li {
            display: inline;
            margin: 0 10px;
        }
        .navbar ul li a {
            text-decoration: none;
            color: white;
            font-weight: bold;
        }
        .navbar ul li a:hover {
            color: lightgray;
        }
        /* Other Styles */
        body {
            background-color: #444;
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
        button {
            background-color:#444;
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
       
    </style>
</head>
<body> 
    <!-- Navbar -->
    <!-- <div class="navbar">
    <h1 style="color: white; margin: 0;">Alpha Finance</h1>
</div> -->

<br><br><br>
  <!-- Form -->
  <form action="user_register_process.php" method="post">
        <div class="container">
            <div class="icon" id="icon">
                <div class="image" style="text-align: center;">
                    <img src="images/alpha.webp" class="image2" alt="avatar">
                </div>
                <h1 class="sign" style="text-align: center;"><i class="fas fa-user-plus"></i> Sign Up</h1>
                <p class="sign">Please fill this form to register to Alpha Finance</p>
                <label for="username" class="sign"><b><i class="fas fa-user"></i> Username</b></label>
                <input type="text" name="username" class="sign" placeholder="Enter Username of Your Choice" autocomplete="off" required>
                <label for="phonenumber" class="sign"><b><i class="fas fa-phone"></i> Enter Phone Number</b></label>
                <input type="text" id="phone_number" name="phone_number" class="sign" placeholder="Enter phone number" autocomplete="off" pattern="[0-9]{10}" title="Please enter a 10-digit phone number" required>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const inputField = document.getElementById('phone_number');
                        inputField.addEventListener('input', function() {
                            if (this.value.length > 10) {
                                this.value = this.value.slice(0, 10);
                            }
                        });
                    });
                </script>
                <label class="sign" for="psw"><b><i class="fas fa-lock"></i> Password</b></label>
                <input type="password" class="sign" placeholder="Enter Password" name="psw" required autocomplete="off">
                <label for="psw-confirm" class="sign"><b><i class="fas fa-lock"></i> Confirm Password</b></label>
                <input type="password" class="sign" placeholder="Confirm Your Password" name="psw-confirm" required autocomplete="off">
                
                <!-- Upline Username -->
                <label for="upline_username" class="sign"><b><i class="fas fa-user"></i> Upline Username (Optional)</b></label>
                <input type="text" name="upline_username" class="sign" placeholder="Enter Upline Username" autocomplete="off">

                <label>
                    <input type="checkbox" checked="checked" name="remember">
                    <name class="sign"><i class="fas fa-check"></i> Remember me</name>
                </label>
                <p class="sign">By creating an account with this security system, you agree to our <a href="#" style="color:blue">Terms & Privacy</a></p>
                <div class="clearfix">
                    <button class="sign" type="submit" class="signupbtn"><i class="fas fa-check icon"></i> Sign Up</button>
                    <li><a href="user_login.php"><i class="fas fa-info-circle icon"></i> Already have an account? Login as User here</a></li>
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
            <p><span>Company. <strong>All Rights Reserved.</strong> Designed By <a href="jmtech.php">JMTech</a></span></p>
        </div>
    </footer>
</body>
</html>