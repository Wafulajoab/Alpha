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

$user_id = 123; // Replace with the actual user ID from your session or form data

// Check activation status
$sql = "SELECT activation_status FROM transactions WHERE user_id = ? ORDER BY id DESC LIMIT 1";
$stmt = $pdo->prepare($sql);
$stmt->execute([$user_id]);
$transaction = $stmt->fetch(PDO::FETCH_ASSOC);

$status = $transaction ? $transaction['activation_status'] : 'pending';

echo json_encode(['status' => $status]);
