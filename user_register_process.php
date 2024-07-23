<?php
session_start();

// Database credentials
$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "alpha";

// Create a connection
$conn = new mysqli($servername, $db_username, $db_password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to validate form data
function validateFormData($data)
{
    return htmlspecialchars(stripslashes(trim($data)));
}

// Function to redirect with error
function redirectWithError($error)
{
    $_SESSION['error'] = $error;
    header("Location: user_register.php");
    exit();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and validate form data
    $username = validateFormData($_POST["username"]);
    $phone_number = validateFormData($_POST["phone_number"]);
    $password = validateFormData($_POST["psw"]);
    $confirm_password = validateFormData($_POST["psw-confirm"]);

    // Validate username, phone number, and password
    if (empty($username) || empty($phone_number) || empty($password)) {
        redirectWithError("All fields are required");
    } elseif (strlen($username) < 4) {
        redirectWithError("Username must have at least 4 characters");
    } elseif (!preg_match('/^\d{10}$/', $phone_number)) {
        redirectWithError("Phone number must have exactly 10 digits");
    } elseif (strlen($password) < 6) {
        redirectWithError("Password must have at least 6 characters");
    } elseif ($password !== $confirm_password) {
        redirectWithError("Passwords do not match");
    }

    // Check if username already exists
    $sql = "SELECT id FROM users WHERE username = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->close();
            redirectWithError("Username already exists. Please choose a different username.");
        }
        $stmt->close();
    }

    // Insert user into the database
    $sql = "INSERT INTO users (username, phone_number, password) VALUES (?, ?, ?)";
    if ($stmt = $conn->prepare($sql)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bind_param("sss", $username, $phone_number, $hashed_password);

        if ($stmt->execute()) {
            // Get the last inserted ID
            $user_id = $stmt->insert_id;

            // Generate referral link
            $referral_link = "https://yourwebsite.com/register?ref=" . urlencode($username) . $user_id;

            // Store the referral link and username in the session
            $_SESSION['referral_link'] = $referral_link;
            $_SESSION['username'] = $username;

            // Check if the user was referred by someone
            if (isset($_GET['ref'])) {
                $referrer = validateFormData($_GET['ref']);
                $referral_level = 1; // Direct referral

                // Insert referral information
                $sql = "INSERT INTO referrals (referrer_username, referred_username, referral_level) VALUES (?, ?, ?)";
                if ($stmt = $conn->prepare($sql)) {
                    $stmt->bind_param("ssi", $referrer, $username, $referral_level);
                    $stmt->execute();
                    $stmt->close();
                }
            }

            // Redirect to account activation or login page after successful registration
            $_SESSION['success'] = "Registration successful. Please login.";
            header("Location: account_activation.php");
            exit();
        } else {
            redirectWithError("Oops! Something went wrong. Please try again later.");
        }
    }

    // Close connection
    $conn->close();
}
?>
