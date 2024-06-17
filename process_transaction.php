<?php
session_start();
include 'db_connection.php';

// Ensure the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$message = "";
$status = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $username = $_SESSION['username'];
    $deposit_amount = $_POST['deposit_amount'];
    $transaction_code = $_POST['transaction_code'];

    // Validate form data
    if (!empty($deposit_amount) && !empty($transaction_code)) {
        // Check if the transaction code already exists
        $stmt = $conn->prepare("SELECT transaction_code FROM deposits WHERE transaction_code = ?");
        $stmt->bind_param("s", $transaction_code);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $message = "Transaction code already exists. Please use a different code.";
            $status = "failure";
        } else {
            // Insert the deposit record into the deposits table
            $stmt = $conn->prepare("INSERT INTO deposits (username, deposit_amount, transaction_code, status) VALUES (?, ?, ?, 'pending')");
            $stmt->bind_param("sds", $username, $deposit_amount, $transaction_code);

            if ($stmt->execute()) {
                // Update the totalDepositsBalance in the accounts table
                $stmt = $conn->prepare("INSERT INTO accounts (username, totalDepositsBalance) VALUES (?, ?) 
                                        ON DUPLICATE KEY UPDATE totalDepositsBalance = totalDepositsBalance + VALUES(totalDepositsBalance)");
                $stmt->bind_param("sd", $username, $deposit_amount);

                if ($stmt->execute()) {
                    $message = "Deposited Successfully";
                    $status = "success";
                } else {
                    $message = "Failed to update total deposits balance. Please try again.";
                    $status = "failure";
                }
            } else {
                $message = "Failed to record the deposit. Please try again.";
                $status = "failure";
            }

            $stmt->close();
        }
    } else {
        $message = "Please fill in all fields.";
        $status = "failure";
    }
} else {
    $message = "Invalid request.";
    $status = "failure";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deposit Confirmation</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: darkgrey;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .message {
            font-size: 18px;
            margin-bottom: 20px;
        }
        .button {
            background-color: #008080;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-decoration: none;
        }
        .button:hover {
            background-color: #006666;
        }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var message = "<?php echo $message; ?>";
            var status = "<?php echo $status; ?>";
            if (status === "success") {
                alert("Deposited Successfully");
            } else {
                alert(message);
            }
        });
    </script>
</head>
<body>
    <div class="container">
        <p class="message"><?php echo $message; ?></p>
        <a href="deposits.php" class="button">Back to Deposits</a>
    </div>
</body>
</html>
