<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database credentials
    $servername = "localhost"; // Change this if your database is hosted on a different server
    $username = "root"; // Change this to your database username
    $password = ""; // Change this to your database password
    $dbname = "alpha"; // Change this to your database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Define variables and initialize with empty values
    $username = $password = "";

    // Processing form data when form is submitted
    $username = $_POST["username"];
    $password = $_POST["psw"];

    // Prepare a SELECT statement to check if the user exists
    $sql = "SELECT * FROM users WHERE username = ?";
    
    if ($stmt = $conn->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("s", $param_username);

        // Set parameters
        $param_username = $username;

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            // Get result set
            $result = $stmt->get_result();
            
            // Check if username exists and verify password
            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                if (password_verify($password, $row["password"])) {
                    // Password is correct, start a new session
                    session_start();

                    // Store data in session variables
                    $_SESSION["username"] = $username;
                    
                    // Redirect user to homepage
                    header("location: home_page.php");
                } else {
                    // Password is not valid, redirect back to login page with error
                    header("location: user_login.php?error=invalid");
                }
            } else {
                // Username doesn't exist, redirect back to login page with error
                header("location: user_login.php?error=invalid");
            }
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }

        // Close statement
        $stmt->close();
    }

    // Close connection
    $conn->close();
}
?>