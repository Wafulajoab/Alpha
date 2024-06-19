<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Success</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        
        .container {
            max-width: 600px;
            margin: auto;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        
        h2 {
            color: #4CAF50;
            margin-bottom: 20px;
        }
        
        p {
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 30px;
        }
        
        a {
            color: #1565c0;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }
        
        a:hover {
            color: #0d47a1;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Registration Successful!</h2>
    <p>Your registration as an Investor was successful.</p>
    <p>You can now <a href="user_login.php">Login</a> with your credentials.</p>
</div>


<script>
function checkActivationStatus() {
    fetch('check_activation_status.php')
        .then(response => response.json())
        .then(data => {
            if (data.status === 'activated') {
                window.location.href = 'user_registration_success.php';
            } else if (data.status === 'rejected') {
                window.location.href = 'user_register.php';
            }
        })
        .catch(error => console.error('Error:', error));
}

// Check the activation status every 5 seconds
setInterval(checkActivationStatus, 5000);
</script>



</body>
</html>
