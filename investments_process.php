<?php
// Start or resume the session
session_start();

// Check if the user is logged in (you may need to modify this based on your authentication system)
if (!isset($_SESSION['username'])) {
    // Redirect the user to the login page or handle the case where the user is not logged in
    header("Location: login.php");
    exit();
}

// Database connection details for "alpha" database
$servername = "localhost";
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$database = "alpha";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the logged-in user's username from the session
$username = $_SESSION['username'];

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $package_name = isset($_POST['package_name']) ? $_POST['package_name'] : '';
    $amount = $_POST['amount'];
    $duration = $_POST['duration'];

    // Check if the investment amount is less than the minimum for the selected package
    $min_investment = 0; // Default minimum investment

    if ($package_name == 'Silver Package') {
        $min_investment = 500;
    } elseif ($package_name == 'Bronze Package') {
        $min_investment = 1000;
    } elseif ($package_name == 'Gold Package') {
        $min_investment = 2000;
    } elseif ($package_name == 'Executive Package') {
        $min_investment = 5000;
    }

    if ($amount < $min_investment) {
        // Display the pop-up message
        echo '<script>alert("Minimum investment is ' . $min_investment . ' for ' . $package_name . '");</script>';
        // Redirect to the same page after 2 seconds
        echo '<script>setTimeout(function(){ window.location.href = "investments.php"; }, 2000);</script>';
        // Exit the script
        exit();
    }

    // Calculate the maturity date based on the current date and investment duration
    $maturity_date = date('Y-m-d', strtotime("+$duration days"));

    // Prepare and execute the SQL statement to insert data into the investments table
    $sql = "INSERT INTO investments (package_name, amount, duration, username, maturity_date) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sdiss", $package_name, $amount, $duration, $username, $maturity_date); // Corrected type definition string

    // Check if the statement executed successfully
    if ($stmt->execute()) {
        // Redirect to a success page or display a success message
        header("Location: success.php");
        exit();
    } else {
        // Handle the error, such as displaying an error message or redirecting to an error page
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>

<!-- JavaScript code for pop-up message and redirection -->
<script>
    // Display the pop-up message
    alert("Minimum investment is <?php echo $min_investment; ?> for <?php echo $package_name; ?>");
    // Redirect to the same page after 2 seconds
    setTimeout(function() {
        window.location.href = "investments.php";
    }, 2000);
</script>
