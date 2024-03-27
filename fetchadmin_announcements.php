<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSO Announcements</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
      body {
        font-family: Arial, sans-serif; /* Specify your preferred font family */
        background-color: #f4f4f7; /* Set background color */
        margin: 0; /* Remove default margin */
        padding: 0; /* Remove default padding */
      }
      .container {
        background-color: #f4f4f7; /* Transparent background */
        padding-top: 0px;
        display: absolute;
        flex-direction: column;
        align-items: center;
      }
      .announcement {
        background-color: #fff;
        padding: 25px;
        margin-bottom: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 90%; /* Adjust as needed */
      }
      .announcement img {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        margin-right: 10px;
      }
      .announcement p {
        margin-bottom: 10px;
      }
      
    </style>
</head>
<body>

<nav>
    <div class="container">
        <div class="navbar">
            <h2>KEMU SECURITY SYSTEM</h2>
            <ul>
            <li><a href="index.php"><i class="fas fa-home"></i> Home</a></li>
            <li><a href="visitors_records.php"><i class="fas fa-book"></i> Visitors-records</a></li>
            <li><a href="incidents.php"><i class="fas fa-exclamation-triangle"></i> Incidents</a></li>
            <li><a href="updates.php"><i class="fas fa-bullhorn"></i>Updates</a></li>
            <li><a href="contact.php"><i class="fas fa-address-book"></i> Contacts</a></li>
            <li><a href="about.php"><i class="fas fa-info-circle"></i> About</a></li> 
            </ul>
        </div>
    </div>
</nav>

<div class="container">
<img src="kmu.jpeg" alt="KMU Logo" style="width: 15%; display: block; margin: 0 auto; padding-top: 0px; border-radius: 50%;">

    <?php
        // PHP code to fetch and display all announcements
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "alpha"; // Database name

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch all announcements from the database
        $sql = "SELECT * FROM announcements ORDER BY announcement_date DESC"; // Removed the LIMIT clause
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<div class='announcement'>";
                echo "<div style='display: flex; align-items: center;'>"; // Flex container for image and username
                echo "<img src='kmu.jpeg' alt='Profile Icon'>";
                echo "<p><strong> Chief Security Officer (CSO)</strong></p>"; // Username CSO in bold
                echo "</div>";
                echo "<p>" . $row["announcement_content"] . "</p>";
                echo "<p> " . $row["announcement_date"] . "</p>"; // Display date and time
                echo "<div class=''>";
                echo "<a href='#'></a> <a href='#'></a>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "No announcements available.";
        }

        $conn->close();
    ?>
</div>

</body>
</html>
