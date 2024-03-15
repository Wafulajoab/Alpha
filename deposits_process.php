<?php
session_start();

// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "alpha";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate the deposit amount and phone number
    $amount = $_POST['amount'];
    $phone_number = $_POST['phone_number'];

    // Perform any additional validation here if needed

    // Redirect to M-Pesa for pin validation and record the deposit
    redirectToMpesa($amount, $phone_number, $conn);
}

// Function to redirect to M-Pesa for pin validation and record the deposit
function redirectToMpesa($amount, $phone_number, $conn) {
    // Implement your logic here to integrate with M-Pesa API or payment gateway for STK push

    // Construct the request parameters for STK push
    $params = [
        'amount' => $amount,
        'phone_number' => $phone_number,
        // Add any other required parameters here
    ];

    // Generate the M-Pesa URL based on the parameters
    $mpesaUrl = generateMpesaUrl($params);

    // Insert the deposit record into the database
    if (recordDeposit($amount, $phone_number, $conn)) {
        // Redirect the user to the generated M-Pesa URL
        header("Location: $mpesaUrl");
        exit();
    } else {
        // Handle the error if database insertion fails
        $_SESSION['error'] = "Failed to record the deposit. Please try again.";
        header("Location: deposits.php");
        exit();
    }
}

// Function to generate M-Pesa STK push URL
function generateMpesaUrl($params) {
    // Placeholder function for generating M-Pesa URL
    // This will depend on the API or payment gateway you are using
    // Example:
    // $url = "https://example.com/mpesa/stk_push?" . http_build_query($params);
    // Replace this with your actual implementation
    
    // For demonstration purposes, return a sample URL
    $url = "https://example.com/mpesa/stk_push?" . http_build_query($params);
    return $url;
}

// Function to record the deposit in the database
function recordDeposit($amount, $phone_number, $conn) {
    // Prepare the INSERT statement
    $sql = "INSERT INTO deposits (amount, phone_number) VALUES (?, ?)";
    
    // Prepare the statement
    $stmt = $conn->prepare($sql);
    
    // Bind the parameters and execute the statement
    $stmt->bind_param("is", $amount, $phone_number);
    $result = $stmt->execute();
    
    // Close the statement
    $stmt->close();

    return $result;
}
?>
