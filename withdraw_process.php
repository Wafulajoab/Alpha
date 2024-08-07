<?php
session_start();
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_SESSION['username'];
    $phone_number = $_POST['phone_number'];
    $withdraw_amount = $_POST['withdraw_amount'];
    $status = 'Pending'; // Default status for new withdrawals

    // Fetch the current account balance
    $sql = "SELECT accountBalance FROM accounts WHERE username = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($accountBalance);
    $stmt->fetch();
    $stmt->close();

    // Check if the withdrawal amount is available
    if ($withdraw_amount > $accountBalance) {
        echo "Insufficient funds for this withdrawal.";
        $conn->close();
        exit();
    }

    // Insert withdrawal request into the database
    $sql = "INSERT INTO withdrawals (username, amount, phone_number, status, date_requested) VALUES (?, ?, ?, ?, NOW())";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ssss", $username, $withdraw_amount, $phone_number, $status);
        if ($stmt->execute()) {
            // Deduct the withdrawn amount from the account balance
            $new_balance = $accountBalance - $withdraw_amount;
            $update_sql = "UPDATE accounts SET accountBalance = ? WHERE username = ?";
            if ($update_stmt = $conn->prepare($update_sql)) {
                $update_stmt->bind_param("ds", $new_balance, $username);
                if ($update_stmt->execute()) {
                    // Update total withdrawn amount in the database
                    $sqlUpdateWithdrawn = "UPDATE accounts SET totalWithdrawn = totalWithdrawn + ? WHERE username = ?";
                    $stmtUpdateWithdrawn = $conn->prepare($sqlUpdateWithdrawn);
                    if ($stmtUpdateWithdrawn === false) {
                        die("Error preparing statement: " . $conn->error);
                    }
                    $stmtUpdateWithdrawn->bind_param("ds", $withdraw_amount, $username);
                    $stmtUpdateWithdrawn->execute();
                    $stmtUpdateWithdrawn->close();

                    // If withdrawal is successful
                    $_SESSION['success_message'] = "Withdrawn Successfully!";
                    header("Location: withdraw.php");
                    exit();
                } else {
                    echo "Error updating balance: " . $update_stmt->error;
                }
                $update_stmt->close();
            } else {
                echo "Error preparing update statement: " . $conn->error;
            }
        } else {
            echo "Error executing statement: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
    $conn->close();
}
?>
