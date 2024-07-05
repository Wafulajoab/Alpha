<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    // Retrieve form data
    $username = $_POST["username"];
    $phone_number = $_POST["phone_number"];
    $password = $_POST["psw"];
    $confirm_password = $_POST["psw-confirm"];

    // Validate username, phone number, and password
    if (empty($username) || empty($phone_number) || empty($password)) {
        echo "<script>alert('All fields are required');</script>";
        header("Location: user_register.php");
        exit();
    } elseif (strlen($username) < 4) {
        echo "<script>alert('Username must have at least 4 characters');</script>";
        header("Location: user_register.php");
        exit();
    } elseif (!preg_match('/^\d{10}$/', $phone_number)) {
        echo "<script>alert('Phone number must have exactly 10 digits');</script>";
        header("Location: user_register.php");
        exit();
    } elseif (strlen($password) < 6) {
        echo "<script>alert('Password must have at least 6 characters');</script>";
        header("Location: user_register.php");
        exit();
    } elseif ($password != $confirm_password) {
        echo "<script>alert('Passwords do not match');</script>";
        header("Location: user_register.php");
        exit();
    }

    // Check if username already exists
    $sql = "SELECT id FROM users WHERE username = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $param_username);
        $param_username = $username;

        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            echo "<script>alert('Username already exists. Please choose a different username.');</script>";
            header("Location: user_register.php");
            exit();
        }

        $stmt->close();
    }

    // Prepare an INSERT statement
    $sql = "INSERT INTO users (username, phone_number, password) VALUES (?, ?, ?)";
    if ($stmt = $conn->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("sss", $param_username, $param_phone_number, $param_password);

        // Set parameters
        $param_username = $username;
        $param_phone_number = $phone_number;
        $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

        // Attempt to execute the prepared statement
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
                $referrer = $_GET['ref'];
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
            $_SESSION['error'] = "Oops! Something went wrong. Please try again later.";
            header("Location: user_register.php");
            exit();
        }
    }

    // Close connection
    $conn->close();
}
?>
