<?php
// Example user data
$username = "johndoe123";
$phone_number = "254123456789";
$balance = "Ksh 10,000";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process form data
    $new_username = $_POST["username"];
    $new_phone_number = $_POST["phone_number"];
    $new_balance = $_POST["balance"];
    
    // Update the user's profile with the new data (you need to implement this)
    // For demonstration purposes, just updating the variables
    $username = $new_username;
    $phone_number = $new_phone_number;
    $balance = $new_balance;

    // Assume saving changes to the database is successful
    $changes_saved = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Font Awesome CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        form {
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button[type="submit"] {
            background-color: #8a2be2;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button[type="submit"]:hover {
            background-color: #5f04b4;
        }
        .navbar {
            background-color: #444;
            padding: 20px 0;
            text-align: center;
        }
        .navbar a {
            color: #fff;
            text-decoration: none;
            margin: 0 20px;
            border-radius: 25px;
        }
        .footer {
            background: lavender;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
        }
        .footer a {
            color: green;
            text-decoration: underline;
            font-weight: bold;
        }
    </style>
    <script>
        // JavaScript function to show popup message
        function showPopup() {
            alert("Changes Saved Successfully");
        }
    </script>
</head>
<body>
    <div class="navbar">
        <a href="home_page.php"><i class="fas fa-home"></i> Home</a>
        <a href="deposits.php"><i class="fas fa-money-bill-alt"></i> Deposit</a>
        <a href="investments.php"><i class="fas fa-chart-line"></i> Invest</a>
        <a href="withdraw.php"><i class="fas fa-money-check-alt"></i> Cashouts</a>
        <a href="profile.php"><i class="fas fa-user"></i> Profile</a>
    </div>

    <div class="container">
        <h2>Edit Profile</h2>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="showPopup()">
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($username); ?>"><br>
            
            <label for="phone_number">Phone Number:</label><br>
            <input type="text" id="phone_number" name="phone_number" value="<?php echo htmlspecialchars($phone_number); ?>"><br>
            
            <label for="balance">Balance:</label><br>
            <input type="text" id="balance" name="balance" value="<?php echo htmlspecialchars($balance); ?>"><br>
            
            <button type="submit">Save Changes</button>
        </form>
        <?php
            // Display the popup message if changes are saved
            if (isset($changes_saved) && $changes_saved) {
                echo '<script>showPopup();</script>';
            }
        ?>
    </div>

    <div class="footer">
        <p>Company. All Rights Reserved. Designed By <a href="jmtech.php">JMTech</a></p>
    </div>
</body>
</html>

