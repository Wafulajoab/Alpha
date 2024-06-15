<?php
session_start();

// Check if the admin is logged in
if (!isset($_SESSION['admin_username'])) {
    header("Location: admin_login.php");
    exit();
}

// Include the database connection file
include 'db_connection.php';

if (isset($_GET['deposit_id'])) {
    $deposit_id = $_GET['deposit_id'];

    // Update deposit status to 'rejected' in the database
    $queryReject = "UPDATE deposits SET status = 'rejected' WHERE deposit_id = $deposit_id";
    $resultReject = mysqli_query($conn, $queryReject);

    if ($resultReject) {
        // Redirect back to the manage deposits page
        header("Location: admin_deposits.php");
        exit();
    } else {
        echo "Error rejecting deposit.";
    }
} else {
    echo "Deposit ID not specified.";
}
?>
