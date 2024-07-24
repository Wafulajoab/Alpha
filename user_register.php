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
            background-color:black;
            color:white;
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
            background-color: yellowgreen;
            outline: none;
        }
        .cancelbtn {
            padding: 14px 20px;
            background-color: green;
        }
        .signupbtn {
            float: center;
            width: 100%;
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
        .modal {
            display: none; 
            position: fixed; 
            z-index: 1; 
            left: 0;
            top: 0;
            width: 30%; 
            height: 30%; 
            overflow: auto; 
            background-color: rgb(0,0,0); 
            background-color: rgba(0,0,0,0.4); 
            padding-top: 60px; 
        }
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 30%;
            border-radius: 25px;
        }
        .close {
            color: #aaa;
            float: center;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
        .login-link {
            text-align: center;
            margin-top: 20px;
        }
        .login-link a {
            color: dodgerblue;
            text-decoration: none;
        }
        .login-link a:hover {
            text-decoration: underline;
        }
    </style>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script>
        function checkUsername(event) {
            event.preventDefault();
            var username = document.getElementById('username').value;
            var form = document.getElementById('registerForm');

            if (username.length >= 4) {
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'check_username.php', true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        if (xhr.responseText == 'exists') {
                            var modal = document.getElementById("myModal");
                            modal.style.display = "block";
                        } else if (xhr.responseText == 'success') {
                            form.submit(); // Submit form if username is available
                        }
                    }
                };
                xhr.send('username=' + encodeURIComponent(username));
            }
        }

        // Close the modal
        function closeModal() {
            var modal = document.getElementById("myModal");
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            var modal = document.getElementById("myModal");
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        // Populate the upline username field if it is present in the URL
        function populateUplineUsername() {
            const urlParams = new URLSearchParams(window.location.search);
            const uplineUsername = urlParams.get('ref');
            if (uplineUsername) {
                document.getElementById('upline_username').value = uplineUsername;
            }
        }

        document.addEventListener('DOMContentLoaded', populateUplineUsername);
    </script>
</head>
<body> 
  <!-- Form -->
  <form id="registerForm" onsubmit="checkUsername(event)" method="post" action="user_register_process.php">
        <div class="container">
            <div class="icon" id="icon">
                <div class="image" style="text-align: center;">
                    <img src="images/alpha.webp" class="image2" alt="avatar">
                </div>
                <h1 class="sign" style="text-align: center;"><i class="fas fa-user-plus"></i> Sign Up</h1>
                <p class="sign">Please fill this form to register to Alpha Finance</p>
                <label for="username" class="sign"><b><i class="fas fa-user"></i> Username</b></label>
                <input type="text" id="username" name="username" class="sign" placeholder="Enter Username of Your Choice" autocomplete="off" required>
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
                <label for="upline_username" class="sign"><b><i class="fas fa-user"></i> Upline Username</b></label>
                <input type="text" id="upline_username" name="upline_username" class="sign" placeholder="Enter Upline Username" autocomplete="off" required>

                <label class="sign">
                    <input type="checkbox" name="remember" style="margin-bottom: 15px"> Remember me 
                </label>
                <p class="sign">By creating an account, you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>
                <div class="clearfix">
                    <button type="submit" class="signupbtn">Sign Up</button>
                </div>
                <div class="login-link">
                    <p>Already have an account? <a href="user_login.php">Login</a></p>
                </div>
            </div>
        </div>
    </form>

    <!-- Modal -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <p>Username already exists. Please choose a different username.</p>
        </div>
    </div>
</body>
</html>
