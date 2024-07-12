<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Password Reset</title>
    <!-- Include Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Styles for the form */
        body {
            background-color: #444;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        form {
            background-color: whitesmoke;
            border-radius: 25px;
            width: 20%;
            margin: auto;
            margin-top: 50px;
            padding: 10px;
        }
        input[type=password] {
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
            background-color: green;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            border-radius: 25px;
        }
        button:hover {
            opacity: 1;
        }
    </style>
</head>
<body>
<form action="admin_reset_password_process.php" method="post">
    <input type="hidden" name="token" value="<?php echo htmlspecialchars($_GET['token']); ?>"> 
    <h2>Reset Password</h2>
    <div class="password-container">
        <label for="psw"><b><i class="fas fa-lock"></i> New Password</b></label>
        <input type="password" placeholder="Enter New Password" name="psw" id="psw" required autocomplete="off">
        <i class="fa fa-eye toggle-password" id="toggle-password"></i>
    </div>
    <div class="password-container">
        <label for="psw-confirm"><b><i class="fas fa-lock"></i> Confirm Password</b></label>
        <input type="password" placeholder="Confirm New Password" name="psw-confirm" id="psw-confirm" required autocomplete="off">
        <i class="fa fa-eye toggle-password" id="toggle-password-confirm"></i>
    </div>
    <button type="submit"><i class="fas fa-save"></i> Reset Password</button>
</form>
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
