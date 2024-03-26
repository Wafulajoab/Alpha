<?php
session_start(); // Start the session

// Check if the username is set in the session
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username']; // Get the username from the session
} else {
    $username = 'Guest'; // Default to 'Guest' if username is not set in the session
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Make the body fill the viewport height */
            margin: 0; /* Remove default margin */
        }
        .success-message {
            background-color: #4caf50;
            color: #fff;
            padding: 20px;
            border-radius: 5px;
            text-align: center;
            max-width: 80%; /* Adjust the width of the success message */
        }
        .success-message a {
            color: #fff;
            text-decoration: none;
            display: inline-block;
            margin-top: 10px;
            background-color: #333;
            padding: 8px 15px;
            border-radius: 3px;
        }
        .success-message a:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <div class="success-message">
        <h2>Success!</h2>
        <p>Hello <?php echo $username; ?>,<br>Your investment has been recorded successfully!</p>
        <a href="investments.php">Go back</a>
    </div>
</body>
</html>
