<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSO Announcements</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* CSS styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: darkgrey;
        }

        
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 40px;
            background-color: #444;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            
          
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

        ::after,
        ::before {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        .navbar ul li a::after {
            position: absolute;
            content: "";
            bottom: 0;
            left: 50%;
            width: 0%;
            height: 2px;
            background-color: rgb(245, 243, 243);
            transition: 0.4s ease-out;
            align-items: center;
        }

        .navbar ul li a:hover::after {
            left: 0;
        }

        nav {
            position: fixed;
            width: 100%;
            top: 0;
            height: 10vh;
        }

        .container {
            background-color:lavender;
            width: 48%; /* Adjust as needed */
            margin-top: 70px;
            padding: 10px;
        }

        .container-left {
            order: 1; /* Ensure chat section is on the left */
        }

        .container-right {
            order: 2; /* Ensure Normal announcements are on the right */
        }

        .navbar ul {
            display: flex;
            list-style-type: none;
            top: 0;
        }

        .navbar ul li {
            padding: .5rem;
            margin: .5rem;
        }

        .navbar ul li a {
            text-decoration: none;
            color: rgb(250, 246, 246);
            font-size: 1rem;
            font-weight: bold;
        }

        .navbar h2 {
            font-size: 1.5rem;
            padding: 0.5px;
            margin: 1.5rem;
            font-family: Arial, sans-serif;
            color: rgb(250, 245, 245);
        }

        .announcements {
            margin-top: 20px;
            max-height: 70vh;
            overflow-y: auto;
            padding-right: 15px;
        }

        .announcement {
            margin-bottom: 10px;
            padding: 10px;
            background-color: #f2f2f2;
            border-radius: 5px;
        }

        .chat {
            max-height: 50vh;
            overflow-y: auto;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-top: 20px;
        }

        #message-input {
            width: calc(100% - 80px);
            padding: 5px;
            margin-top: 10px;
        }

        .container.container-left input[name="title"] {
    width: 100%; /* Adjust as needed */
    padding: 12px;
    margin-bottom: 20px;
    border: 2px solid #007bff;
    border-radius: 8px;
    box-sizing: border-box;
    transition: border-color 0.3s ease-in-out;
}


        button {
            width: 70px;
            padding: 5px;
            margin-top: 10px;
        }

        #footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background: lavender;
            text-align: center;
            padding: 0.1rem;
        }

        .footer p {
            justify-content: center;
        }

        .footer a {
            color: green;
            text-decoration: underline;
            font-weight: bold;
        }

        .profile-picture {
            width: 50px; /* Adjust size as needed */
            height: 50px; /* Adjust size as needed */
            border-radius: 50%; /* Makes the image round */
            overflow: hidden; /* Ensures the image stays within the circular boundary */
            margin-right: 10px; /* Adds spacing between the profile picture and announcement content */
        }

        .profile-picture img {
            width: 100%; /* Ensures the image fills the circular boundary */
            height: 100%; /* Ensures the image fills the circular boundary */
            object-fit: cover; /* Covers the circular boundary with the image */
        }

        .reply-button {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 5px 10px;
            cursor: pointer;
        }

        .reply-button:hover {
            background-color: #0056b3;
        }

        .reply-form {
            display: none;
            margin-top: 10px;
        }

        .reply-form textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            margin-top: 5px;
        }

        .show-reply-form {
            display: block;
        }

        .container.container-left {
            margin-top: 80px;
        }

        .container.container-left h2 {
            font-size: 1.5rem;
            margin-bottom: 10px;
            color: #333;
        }

        .container.container-left form {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .container.container-left input,
        .container.container-left textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 2px solid #007bff;
            border-radius: 8px;
            box-sizing: border-box;
            transition: border-color 0.3s ease-in-out;
        }

        .container.container-left input:focus,
        .container.container-left textarea:focus {
            border-color: #0056b3;
        }

        .container.container-left button {
            padding: 12px 24px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        .container.container-left button:hover {
            background-color: #0056b3;
        }

        .container-left,
        .container-right {
            width: 50%;
            float: left;
            padding: 10px;
            box-sizing: border-box;
        }
            /* CSS styles for the submit button */
            .reply-form button[type="submit"] {
                padding: 8px 16px; /* Adjust padding as needed */
                background-color: #007bff;
                color: #fff;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                transition: background-color 0.3s ease-in-out;
            }

            .reply-form button[type="submit"]:hover {
                background-color: #0056b3;
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

    <div class="container container-left">
    <h2>Chat Section</h2>
    <form action="n_announcement.php" method="POST">
        <input type="text" name="title" placeholder="Title" required>
        <textarea name="content" placeholder="Your message" required></textarea>
        <button type="submit">Send</button>
    </form>
</div>


         
        </div>
    </div>

    <div class="container container-right">
        <h2>Investors Chat Section</h2>
        <div class="announcements" id="announcement-container">
            <!-- Include PHP code to fetch announcements -->
           <?php
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

// Handle reply form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['reply_content']) && isset($_POST['announcement_id'])) {
    $replyContent = $_POST['reply_content'];
    $announcementId = $_POST['announcement_id'];

    // Insert reply into the database
    $stmt = $pdo->prepare("INSERT INTO announcement_replies (announcement_id, reply_content) VALUES (:announcement_id, :reply_content)");
    $stmt->bindParam(':announcement_id', $announcementId);
    $stmt->bindParam(':reply_content', $replyContent);
    $stmt->execute();
}

// Fetch announcements from the database
$stmt = $pdo->prepare("SELECT * FROM normal_announcements ORDER BY created_at DESC");
$stmt->execute();
$announcements = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Display announcements
foreach ($announcements as $announcement) {
    echo '<div class="announcement">';
    echo '<div class="profile-picture">';
    echo '<img src="images/jmtech.jpg" alt="Profile Picture">';
    echo '</div>';
    echo '<div class="announcement-content">';
    echo '<h3>' . $announcement['title'] . '</h3>';
    echo '<p>' . $announcement['content'] . '</p>';
    echo '<p>Date: ' . $announcement['created_at'] . '</p>'; // Display date and time
    echo '<button class="reply-button" onclick="toggleReplyForm(this)">Reply</button>';
    echo '<div class="reply-form">';
    echo '<form action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '" method="POST">';
    echo '<input type="hidden" name="announcement_id" value="' . $announcement['id'] . '">';
    echo '<textarea name="reply_content" placeholder="Write your reply here"></textarea>';
    echo '<button type="submit">Submit</button>';
    echo '</form>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
}
?>




<div class="announcements" id="announcement-container">
    <?php
    // Fetch announcements from the database
    $stmt = $pdo->prepare("SELECT * FROM normal_announcements ORDER BY created_at DESC");
    $stmt->execute();
    $announcements = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Display announcements
    foreach ($announcements as $announcement) {
        echo '<div class="announcement">';
        echo '<div class="profile-picture">';
        echo '<img src="images/jmtech.jpg" alt="Profile Picture">';
        echo '</div>';
        echo '<div class="announcement-content">';
        echo '<h3>' . $announcement['title'] . '</h3>';
        echo '<p>' . $announcement['content'] . '</p>';
        echo '<p>Date: ' . $announcement['created_at'] . '</p>'; // Display date and time

        // Fetch and display replies for this announcement
        $replyStmt = $pdo->prepare("SELECT * FROM announcement_replies WHERE announcement_id = :announcement_id ORDER BY created_at ASC");
        $replyStmt->bindParam(':announcement_id', $announcement['id']);
        $replyStmt->execute();
        $replies = $replyStmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($replies as $reply) {
            echo '<div class="reply">';
            echo '<div class="profile-picture">';
            echo '<img src="images/jmtt.jpg" alt="Profile Picture">';
            echo '</div>';
            echo '<div class="reply-content">';
            echo '<p>' . $reply['reply_content'] . '</p>';
            echo '<p>Reply Date: ' . $reply['created_at'] . '</p>'; // Display reply date and time
            echo '</div>';
            echo '</div>';
        }

        echo '<button class="reply-button" onclick="toggleReplyForm(this)">Reply</button>';
        echo '<div class="reply-form">';
        echo '<form action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '" method="POST">';
        echo '<input type="hidden" name="announcement_id" value="' . $announcement['id'] . '">';
        echo '<textarea name="reply_content" placeholder="Write your reply here"></textarea>';
        echo '<button type="submit">Submit</button>';
        echo '</form>';
        echo '</div>';

        echo '</div>'; // .announcement-content
        echo '</div>'; // .announcement
    }
    ?>
</div>


        </div>
    </div>

    <footer id="footer">
        <div class="footer">
            <p><span>Company.<strong>All Rights Reserved.</strong>Designed By <a href="jmtech.php">JMTech</a></span></p>
        </div>
    </footer>

    <script>
        function toggleReplyForm(button) {
            const replyForm = button.nextElementSibling;
            replyForm.classList.toggle('show-reply-form');
        }
    </script>
</body>

</html>
