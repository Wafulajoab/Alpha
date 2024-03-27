<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection file
    $servername = "localhost";
    $username = "root"; // Your database username
    $password = ""; // Your database password
    $dbname = "alpha"; // Your database name

    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        die();
    }

    // Validate and sanitize input data
    $title = isset($_POST['title']) ? $_POST['title'] : '';
    $content = isset($_POST['content']) ? $_POST['content'] : '';

    // Check if title and content are not empty
    if (!empty($title) && !empty($content)) {
        // Prepare and execute SQL query to insert data into database
        $stmt = $pdo->prepare("INSERT INTO normal_announcements (title, content) VALUES (:title, :content)");
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);

        if ($stmt->execute()) {
            // Data inserted successfully
            echo "Announcement inserted successfully";
            // Redirect to the same page
            header("Location: n_announcement.php");
            exit(); // Ensure script execution stops after redirection
        } else {
            // Error inserting data
            echo "Error: Unable to insert announcement";
        }
    } else {
        // Handle empty form fields
        echo "Error: Title and content cannot be empty";
    }
} else {
    // Redirect to the form if accessed directly
    header("Location: normal_announcements.php");
    exit();
}
?>
