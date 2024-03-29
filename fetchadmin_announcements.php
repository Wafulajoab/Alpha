<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CEO Announcements</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
         body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: darkgrey;
        }
        .navbar {
            background-color: #444;
            padding: 20px 0;
            text-align: center;
            position: fixed; /* Fixed positioning */
            top: 0; /* Fixed to the top */
            width: 100%; /* Full width */
         
        }
        .navbar a {
            color: #fff;
            text-decoration: none;
            margin: 0 20px;
            border-radius: 25px;
        }
        .navbar .icon {
            font-size: 20px;
            margin-right: 5px;
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
            <h2>ALPHA FINANCE</h2>
            <ul>
            <a href="home_page.php"><i class="fas fa-home icon"></i>Home</a>
            <a href="deposits.php"><i class="fas fa-money-bill-alt icon"></i>Deposit</a>
            <a href="summary.php"><i class="fas fa-file-alt"></i>Summary</a>
            <a href="investments.php"><i class="fas fa-chart-line icon"></i>Invest</a>
            <a href="updates.php"><i class="fas fa-bullhorn"></i>Updates</a>
            <a href="withdraw.php"><i class="fas fa-money-check-alt icon"></i>Cashout</a>
            <a href="profile.php"><i class="fas fa-user icon"></i>Profile</a>
            </ul>
        </div>
    </div>
</nav>
<!-- 
<div class="container">
<img src="images/aplha.webp" alt="avatar" style="width: 10%; display: block; margin: 0 auto; padding-top: 0px; border-radius: 50%;"> -->

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
        $sql = "SELECT * FROM announcements ORDER BY created_at DESC"; // Use the correct column name
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<div class='announcement'>";
                echo "<div style='display: flex; align-items: center;'>"; // Flex container for image and username
                echo "<img src='images/aplha.webp' alt='Profile Icon'>";
                echo "<p><strong> Chief Executive Officer (CEO)</strong></p>"; // Username CSO in bold
                echo "</div>";
                echo "<p>" . $row["announcement_content"] . "</p>";
                echo "<p> " . $row["created_at"] . "</p>"; // Display date and time
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
