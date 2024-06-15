<?php
$host = 'localhost'; // or your database host
$dbname = 'alpha'; // Changed database name to alpha
$username = 'root'; // Replace with your database username
$password = ''; // Replace with your database password


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
