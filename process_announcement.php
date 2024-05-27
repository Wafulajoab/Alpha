<?php
// Database connection
$servername = "localhost";
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "alpha"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form data is set and not empty
if (isset($_POST['announcement_content']) && !empty($_POST['announcement_content'])) {
    $announcement_content = $_POST['announcement_content'];

    // Check if file was uploaded without errors
if(isset($_FILES["file"]) && $_FILES["file"]["error"] == 0){
    $file_name = $_FILES["file"]["name"];
    $file_tmp = $_FILES["file"]["tmp_name"];
    $file_type = $_FILES["file"]["type"];
    $file_size = $_FILES["file"]["size"];

    // Specify the directory where you want to save uploaded files
    $upload_dir = "uploads/";

    // Move the uploaded file to the specified directory
    if(move_uploaded_file($file_tmp, $upload_dir . $file_name)){
        echo "File uploaded successfully.";
        // You can save the file information to the database if needed
    }else{
        echo "Error uploading file.";
    }
}else{
    echo "No file uploaded or an error occurred.";
}

    // Check if file was uploaded successfully
    if (isset($_FILES['file']['name']) && !empty($_FILES['file']['name'])) {
        // If you want to allow file uploads
        $file = $_FILES['file']['name'];

        // Move uploaded file to desired location (optional)
        $target_dir = "uploads/"; // Specify the directory where you want to store the uploaded files
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
    } else {
        // Handle case where file input is empty
        $file = "";
    }

    // Prepare SQL statement
    $sql = "INSERT INTO announcements (announcement_content, file) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Bind parameters and execute the statement
        $stmt->bind_param("ss", $announcement_content, $file);
        if ($stmt->execute()) {
            echo "Announcement created successfully";
            header("Location: admin_announcements.php");
            exit(); // Ensure script execution stops after redirection
        } else {
            echo "Error executing SQL statement: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error preparing SQL statement: " . $conn->error;
    }
} else {
    echo "Error: Announcement content is empty or not provided.";
}

$conn->close();
?>
