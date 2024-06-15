<?php
session_start();
include 'db_connection.php';

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['approve'])) {
    $transaction_code = $_POST['transaction_code'];

    // Update the deposit status to 'approved'
    $query = "UPDATE deposits SET status = 'approved' WHERE transaction_code = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $transaction_code);
    
    if ($stmt->execute()) {
        // Get deposit details
        $query_deposit = "SELECT username, deposit_amount FROM deposits WHERE transaction_code = ?";
        $stmt_deposit = $conn->prepare($query_deposit);
        $stmt_deposit->bind_param("s", $transaction_code);
        $stmt_deposit->execute();
        $result_deposit = $stmt_deposit->get_result();
        $deposit = $result_deposit->fetch_assoc();
        $username = $deposit['username'];
        $deposit_amount = $deposit['deposit_amount'];
        
        // Update totalDepositsBalance in accounts table
        $query_update_balance = "UPDATE accounts SET totalDepositsBalance = totalDepositsBalance + ? WHERE username = ?";
        $stmt_update_balance = $conn->prepare($query_update_balance);
        $stmt_update_balance->bind_param("ds", $deposit_amount, $username);
        
        if ($stmt_update_balance->execute()) {
            echo "Deposit approved and balance updated.";
        } else {
            echo "Error updating balance: " . $stmt_update_balance->error;
        }
        $stmt_update_balance->close();
    } else {
        echo "Error approving deposit: " . $stmt->error;
    }
    $stmt->close();
}

$conn->close();
header("Location: admin_deposits.php");
exit();
?>
