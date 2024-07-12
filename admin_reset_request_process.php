<?php
// Include the database connection file
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];

    // Check if the username exists
    $stmt = $conn->prepare("SELECT * FROM admins WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        // Generate a secure reset token
        $reset_token = bin2hex(random_bytes(50));
        $token_expiry = date("Y-m-d H:i:s", strtotime('+1 hour'));

        // Store the token and expiry in the database
        $stmt = $conn->prepare("UPDATE admins SET reset_token = ?, token_expiry = ? WHERE username = ?");
        $stmt->bind_param("sss", $reset_token, $token_expiry, $username);
        $stmt->execute();

        // Here you would send an email with the reset link containing the token
        // For simplicity, we'll just display the link
        echo "Password reset link: <a href='admin_reset_password.php?token=$reset_token'>Reset Password</a>";
    } else {
        echo "Username not found.";
    }
}
?>
