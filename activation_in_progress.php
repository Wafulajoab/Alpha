<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activation In Progress</title>
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
            max-width: 400px;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .message {
            font-size: 18px;
            color: #333;
            margin-bottom: 20px;
        }
        .loader {
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 16px solid #3498db;
            width: 120px;
            height: 120px;
            animation: spin 2s linear infinite;
            margin: 20px auto;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="message">
            Your account activation is in progress. <br>Please wait for a few minutes while the admin activates your account.
        </div>
        <div class="loader"></div>
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
                .catch(error => console.error('Error checking activation status:', error));
        }

        setInterval(checkActivationStatus, 5000); // Check every 5 seconds
    </script>
</body>
</html>
