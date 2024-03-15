<?php
// Database connection parameters
$host = 'localhost'; // or your database host
$dbname = 'alpha'; // Changed database name to alpha
$username = 'root'; // Replace with your database username
$password = ''; // Replace with your database password

// Connect to the database
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare and bind parameters
    $work_id = $_POST['work_id'];
    $rank = $_POST['rank'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password for security

    $stmt = $pdo->prepare("INSERT INTO admins (work_id, rank, username, password) VALUES (?, ?, ?, ?)");
    $stmt->bindParam(1, $work_id);
    $stmt->bindParam(2, $rank);
    $stmt->bindParam(3, $username);
    $stmt->bindParam(4, $password);

    // Attempt to execute the prepared statement
    try {
        $stmt->execute();
        // Redirect to success page or display success message
        header("Location: registration_success.php");
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: darkgrey;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color:#444;
            padding: 20px 0;
            text-align: center;
            position: fixed; /* Make the navbar fixed */
            width: 100%; /* Set the width to 100% */
            top: 0; /* Align the navbar to the top */
            z-index: 999; /* Ensure the navbar stays on top of other content */
        }

        .navbar a {
            color: #fff;
            text-decoration: none;
            margin: 0 20px;
            border-radius: 25px;
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

        .container {
            max-width: 20%;
            margin: 60px auto 20px; /* Adjust margin to accommodate fixed navbar */
            padding: 20px;
            background-color: #fff;
            border-radius: 25px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
        input[type="password"],
        select {
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
            background-color: black;
            color: #fff;
            border: none;
            border-radius: 25px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
        }

        .login-link a {
            color: black;
            text-decoration: none;
            transition: color 0.3s; /* Adding transition effect for color change */
        }

        .login-link a:hover {
            color:black; /* Changing color on hover */
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

<div class="container">
    <div class="image" style="text-align: center;">
        <img src="images/aplha.webp" class="image2" alt="avatar" style="max-width: 15%; height: auto;">
    </div>
    <h2>Admin Registration</h2>

    <form action="admin_register.php" method="post">
        <label for="work_id">Admin Work ID:</label>
        <input type="text" id="work_id" name="work_id" autocomplete="off" required><br><br>

        <label for="rank">Rank:</label>
        <select id="rank" name="rank" autocomplete="off" required>
            <option value="">Select Rank</option>
            <option value="Chief Executive Officer">Chief Executive Officer (CEO)</option>
            <option value="Marketing Director (MD)">Marketing Director (MD)</option>
        </select><br><br>

        <label for="username">Username:</label>
        <input type="text" id="username" name="username" autocomplete="off" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" autocomplete="off" required><br><br>

        <button type="submit">Register</button>
    </form>

    <div class="login-link">
        <h> Already registered? <a href="admin_login.php">Login here</a></h>
    </div>

</div>
<br><br><br>
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
