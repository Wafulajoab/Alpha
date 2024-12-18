<?php
// Database connection parameters
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'alpha';

// Attempt database connection
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error: Could not connect. " . $e->getMessage());
}

$message = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['deposit_amount'], $_POST['transaction_code'], $_POST['username'])) {
        $deposit_amount = $_POST['deposit_amount'];
        $transaction_code = strtoupper($_POST['transaction_code']);
        $username = $_POST['username'];

        if ($deposit_amount == 100.00) {
            if (preg_match('/^[A-Z0-9]{10}$/', $transaction_code)) {
                $user_id = 123; // Replace with the actual user ID from your session or form data
                $sql = "INSERT INTO transactions (user_id, username, amount, transaction_code, activation_status) 
                        VALUES (?, ?, 100.00, ?, 'pending')";
                $stmt = $pdo->prepare($sql);

                try {
                    $stmt->execute([$user_id, $username, $transaction_code]);
                    header("Location: activation_in_progress.php");
                    exit();
                } catch (PDOException $e) {
                    $message = "Error: " . $e->getMessage();
                }
            } else {
                $message = "Transaction code must be exactly 10 alphanumeric characters.";
            }
        } else {
            $message = "Deposit amount must be exactly Ksh. 100.00 for account activation.";
        }
    } else {
        $message = "Please fill in all required fields.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Process</title>
    <style>
        /* Basic Styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .section {
            margin-bottom: 20px;
        }
        .section h3 {
            color: #333;
        }
        .section img {
            display: block;
            margin: 0 auto 20px;
            max-width: 60%;
            height: auto;
        }
        .section ol {
            padding-left: 20px;
        }
        .section ol li {
            margin-bottom: 10px;
        }
        .section form {
            background-color: #f5f5f5;
            padding: 20px;
            border-radius: 8px;
        }
        .section form label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }
        .section form input[type="text"], .section form input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .section form button {
            background-color: #444;
            color: #fff;
            border: none;
            padding: 12px 20px;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
        }
        .section form button:hover {
            background-color: #333;
        }
        .message {
            color: red;
            font-weight: bold;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Payment Procedure Section -->
        <div class="section payment-procedure-section">
            <img src="images/mpesa.jpg" alt="M-Pesa Payment">
            <div style="
    max-width: 400px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: center;
">
    <h3 style="
        color: green; 
        font-size: 24px; 
        font-family: 'Arial, sans-serif'; 
        text-transform: uppercase; 
        font-weight: bold; 
        margin-top: 20px; 
        margin-bottom: 20px; 
        border-bottom: 2px solid #4CAF50; 
        padding-bottom: 10px;
        animation: glow 3s infinite alternate;
        text-shadow: 0 0 10px #4CAF50;
    ">
        Activate Your Account NOW!!
    </h3>
</div>

<style>
@keyframes glow {
    0% {
        text-shadow: 0 0 10px #4CAF50, 0 0 20px #4CAF50, 0 0 30px #4CAF50, 0 0 40px #4CAF50, 0 0 50px #4CAF50;
    }
    20% {
        text-shadow: 0 0 10px #FF5733, 0 0 20px #FF5733, 0 0 30px #FF5733, 0 0 40px #FF5733, 0 0 50px #FF5733;
    }
    40% {
        text-shadow: 0 0 10px #33C1FF, 0 0 20px #33C1FF, 0 0 30px #33C1FF, 0 0 40px #33C1FF, 0 0 50px #33C1FF;
    }
    60% {
        text-shadow: 0 0 10px #4CAF50, 0 0 20px #4CAF50, 0 0 30px #4CAF50, 0 0 40px #4CAF50, 0 0 50px #4CAF50;
    }
    80% {
        text-shadow: 0 0 10px #FF5733, 0 0 20px #FF5733, 0 0 30px #FF5733, 0 0 40px #FF5733, 0 0 50px #FF5733;
    }
    100% {
        text-shadow: 0 0 10px #33C1FF, 0 0 20px #33C1FF, 0 0 30px #33C1FF, 0 0 40px #33C1FF, 0 0 50px #33C1FF;
    }
}
</style>


            <ol>
                <li>Go to M-Pesa menu on your phone.</li>
                <li>Select Lipa Na M-Pesa.</li>
                <li>Choose Paybill.</li>
                <li>Enter Paybill Number: <strong>247247</strong>.</li>
                <li>Enter Account Number: <strong>17101764567</strong>.</li>
                <li>Enter Amount.</li>
                <li>Enter your M-Pesa PIN and confirm the transaction.</li>
            </ol>
        </div>
        
        <!-- Transaction Input Section -->
        <div class="section transaction-input-section">
            <h3>Enter M-Pesa Transaction Details</h3>
            <form action="account_activation.php" method="post">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" placeholder="Enter Username" required>

                <label for="deposit_amount">Deposited Amount:</label>
                <input type="text" id="deposit_amount" name="deposit_amount" placeholder="Enter Deposited Amount" required>

                <label for="transaction_code">Transaction Code:</label>
                <input type="text" id="transaction_code" name="transaction_code" placeholder="Enter M-Pesa transaction code (e.g., OJM3RT593P)" required pattern="[A-Z0-9]{10}" title="10 characters, alphanumeric (e.g., OJM3RT593P)">

                <button type="submit" name="submit">Submit</button>
            </form>
            <?php if (!empty($message)): ?>
                <p class="message"><?php echo $message; ?></p>
            <?php endif; ?>
        </div>
    </div>
    <script>
         function toggleNavbar() {
        const navbar = document.getElementById('navbar');
        const container = document.querySelector('.container');
        const menuIcon = document.querySelector('.menu-icon');
        const isOpen = navbar.classList.contains('show');
        
        if (isOpen) {
            navbar.classList.remove('show');
            container.style.marginLeft = '0';
            menuIcon.style.left = '10px';
        } else {
            navbar.classList.add('show');
            container.style.marginLeft = '200px';
            menuIcon.style.left = '210px';
        }
    }

        document.getElementById('transaction_code').addEventListener('input', function(event) {
            const input = event.target;
            const value = input.value.toUpperCase().replace(/[^0-9A-Z]/g, '');
            input.value = value.slice(0, 10);
        });
    </script>
</body>
</html>
