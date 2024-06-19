<?php
session_start();
include 'db_connection.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['package_name'], $_POST['amount'], $_POST['duration'])) {
    $username = $_SESSION['username'];
    $packageName = $_POST['package_name'];
    $amount = $_POST['amount'];
    $duration = $_POST['duration'];

    // Perform any additional validation as needed

    // Check if the connection is valid
    if ($conn === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    // Get the account balance of the user
    $sql = "SELECT accountBalance FROM accounts WHERE username = ?";
    $stmt = $conn->prepare($sql);

    // Check if the statement was prepared successfully
    if ($stmt === false) {
        die("ERROR: Could not prepare the SQL statement. " . $conn->error);
    }

    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($accountBalance);
    $stmt->fetch();
    $stmt->close();

    // Check if the user has enough balance to invest
    if ($accountBalance >= $amount) {
        // Deduct the investment amount from the account balance
        $newBalance = $accountBalance - $amount;

        // Update the account balance in the database
        $sql = "UPDATE accounts SET accountBalance = ? WHERE username = ?";
        $stmt = $conn->prepare($sql);

        // Check if the statement was prepared successfully
        if ($stmt === false) {
            die("ERROR: Could not prepare the SQL statement. " . $conn->error);
        }

        $stmt->bind_param("ds", $newBalance, $username);
        
        // Execute the statement and check for errors
        if ($stmt->execute() === false) {
            die("ERROR: Could not execute the SQL statement. " . $stmt->error);
        }

        $stmt->close();

        // Insert the investment into the database
        $sql = "INSERT INTO investments (username, package_name, amount, duration, maturity_date, status) VALUES (?, ?, ?, ?, DATE_ADD(NOW(), INTERVAL ? DAY), 'Active')";
        $stmt = $conn->prepare($sql);

        // Check if the statement was prepared successfully
        if ($stmt === false) {
            die("ERROR: Could not prepare the SQL statement. " . $conn->error);
        }

        $stmt->bind_param("ssiii", $username, $packageName, $amount, $duration, $duration);

        // Execute the statement and check for errors
        if ($stmt->execute() === false) {
            die("ERROR: Could not execute the SQL statement. " . $stmt->error);
        }

        $stmt->close();

        // Redirect with a success status and package name
        header("Location: investments.php?status=success&package=" . urlencode($packageName));
        exit();
    } else {
        // Redirect or show an error message if the balance is insufficient
        header("Location: investments.php?status=insufficient_balance");
        exit();
    }
} else {
    // Redirect or show an error message if the request is invalid
    header("Location: investments.php?status=error");
    exit();
}
?>
