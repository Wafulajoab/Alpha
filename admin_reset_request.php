<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Password Reset Request</title>
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
        input[type=text] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid wheat;
            box-sizing: border-box;
            border-radius: 8px;
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
<form action="admin_reset_request_process.php" method="post">
    <h2>Reset Password</h2>
    <label for="username"><b><i class="fas fa-user"></i> Admin Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" required autocomplete="off">
    <button type="submit"><i class="fas fa-envelope"></i> Request Reset</button>
</form>
</body>
</html>
