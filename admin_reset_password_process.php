<?php
// Include the database connection file
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if 'token', 'psw', and 'psw-confirm' are set in the POST request
    if (!isset($_POST['token']) || !isset($_POST['psw']) || !isset($_POST['psw-confirm'])) {
        echo "Invalid request. Missing required fields.";
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
        exit();
    }

    $token = $_POST['token'];
    $password = $_POST['psw'];
    $password_confirm = $_POST['psw-confirm'];

    if (empty($password) || empty($password_confirm)) {
        echo "Please fill in all fields.";
        exit();
    }

    if ($password !== $password_confirm) {
        echo "Passwords do not match.";
        exit();
    }

    if (strlen($password) < 8 || !preg_match('/[a-z]/', $password) || !preg_match('/[A-Z]/', $password) || !preg_match('/[0-9]/', $password) || !preg_match('/[\W]/', $password)) {
        echo "Password must be at least 8 characters long and include at least one uppercase letter, one lowercase letter, one number, and one special character.";
        exit();
    }

    // Hash the new password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Validate the token and check expiry
    $stmt = $conn->prepare("SELECT * FROM admins WHERE reset_token = ? AND token_expiry > NOW()");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        // Update the password
        $stmt = $conn->prepare("UPDATE admins SET password = ?, reset_token = NULL, token_expiry = NULL WHERE reset_token = ?");
        $stmt->bind_param("ss", $hashed_password, $token);
        $stmt->execute();

        echo "Password has been reset successfully.";
    } else {
        echo "Invalid or expired token.";
    }
}
?>
