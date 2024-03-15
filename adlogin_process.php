<?php
session_start();

// Database connection parameters
$host = 'localhost'; // or your database host
$dbname = 'alpha'; // Changed database name to alpha
$username = 'root'; // Replace with your database username
$password = ''; // Replace with your database password

// Connect to the database
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get username and password from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and execute the SQL statement
    $stmt = $pdo->prepare("SELECT * FROM admins WHERE username = ?");
    $stmt->execute([$username]);
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verify password
    if ($admin && password_verify($password, $admin['password'])) {
        // Password is correct, set session variables and redirect to admin dashboard
        $_SESSION['admin_id'] = $admin['id']; // Assuming id is the primary key of admins table
        $_SESSION['admin_username'] = $admin['username'];
        header("Location: admin_dashboard.php");
        exit();
    } else {
        // Invalid username or password, redirect back to login page with error message
        $_SESSION['login_error'] = "Invalid username or password";
        header("Location: admin_login.php");
        exit();
    }
} else {
    // If the form is not submitted, redirect back to login page
    header("Location: admin_login.php");
    exit();
}
?>
