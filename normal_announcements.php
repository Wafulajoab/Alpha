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
            background: darkgrey;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
        }

        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 200px;
            height: 100vh;
            background-color: #444;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 10px;
        }

        .navbar a {
            color: #fff;
            text-decoration: none;
            margin: 10px 0;
            border-radius: 25px;
        }

        .navbar .icon {
            font-size: 20px;
            margin-right: 15px;
        }

        .navbar ul {
            display: flex;
            flex-direction: column;
            list-style-type: none;
            padding: 0;
        }

        .navbar ul li {
            padding: .5rem;
            margin: .5rem 0;
        }

        .navbar ul li a {
            text-decoration: none;
            color: rgb(250, 246, 246);
            font-size: 1rem;
            font-weight: bold;
            display: flex;
            align-items: center;
        }

        .navbar h2 {
            font-size: 1.5rem;
            padding: 0.5px;
            margin: 1.5rem 0;
            font-family: Arial, sans-serif;
            color: rgb(250, 245, 245);
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

        .main-content {
            margin-left: 200px;
            display: flex;
            flex: 1;
            padding: 10px;
            box-sizing: border-box;
        }

        .container {
            background-color: lavender;
            width: 50%;
            margin: 10px;
            padding: 10px;
            box-sizing: border-box;
        }

        .container-left {
            order: 1;
        }

        .container-right {
            order: 2;
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
            width: 50px;
            height: 50px;
            border-radius: 50%;
            overflow: hidden;
            margin-right: 10px;
        }

        .profile-picture img {
            width: 100%;
            height: 100%;
            object-fit: cover;
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

    </style>
</head>

<body>
    <!-- Navigation Bar -->
    <nav class="navbar">
        <h2>ALPHA FINANCE</h2>
        <ul>
            <li><a href="home_page.php"><i class="fas fa-home icon"></i>Home</a></li>
            <li><a href="deposits.php"><i class="fas fa-money-bill-alt icon"></i>Deposit</a></li>
            <li><a href="summary.php"><i class="fas fa-file-alt icon"></i>Summary</a></li>
            <li><a href="investments.php"><i class="fas fa-chart-line icon"></i>Invest</a></li>
            <li><a href="updates.php"><i class="fas fa-bullhorn icon"></i>Updates</a></li>
            <li><a href="withdraw.php"><i class="fas fa-money-check-alt icon"></i>Cashout</a></li>
            <li><a href="profile.php"><i class="fas fa-user icon"></i>Profile</a></li>
        </ul>
    </nav>

    <div class="main-content">
        <div class="container container-left">
            <h2>Chat Section</h2>
            <form action="n_announcement.php" method="POST">
                <input type="text" name="title" placeholder="Title" required>
                <textarea name="content" placeholder="Your message" required></textarea>
                <button type="submit">Send</button>
            </form>
        </div>

        <div class="container container-right">
            <h2>Normal Announcements</h2>
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
    $insertReplyQuery = "INSERT INTO replies (announcement_id, content, timestamp) VALUES (?, ?, NOW())";
    $stmt = $pdo->prepare($insertReplyQuery);
    $stmt->execute([$announcementId, $replyContent]);
}

// Fetch announcements from the database
$query = "SELECT * FROM announcements ORDER BY created_at DESC"; // Use the correct column here
$stmt = $pdo->query($query);
$announcements = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($announcements as $announcement) {
    $title = isset($announcement['title']) ? htmlspecialchars($announcement['title']) : 'No title';
    $content = isset($announcement['content']) ? htmlspecialchars($announcement['content']) : 'No content';
    $timestamp = isset($announcement['created_at']) ? htmlspecialchars($announcement['created_at']) : 'No timestamp'; // Use the correct column here
    $id = isset($announcement['id']) ? $announcement['id'] : 0;

    echo "<div class='announcement'>";
    echo "<h3>$title</h3>";
    echo "<p>$content</p>";
    echo "<p class='timestamp'>$timestamp</p>";
    echo "<button class='reply-button' onclick='toggleReplyForm($id)'>Reply</button>";
    echo "<div class='reply-form' id='reply-form-$id'>";
    echo "<form action='' method='POST'>";
    echo "<input type='hidden' name='announcement_id' value='$id'>";
    echo "<textarea name='reply_content' placeholder='Write your reply...' required></textarea>";
    echo "<button type='submit'>Submit Reply</button>";
    echo "</form>";
    echo "</div>";

    // Fetch replies for the current announcement
    $repliesQuery = "SELECT * FROM replies WHERE announcement_id = ? ORDER BY timestamp ASC";
    $repliesStmt = $pdo->prepare($repliesQuery);
    $repliesStmt->execute([$id]);
    $replies = $repliesStmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<div class='replies'>";
    foreach ($replies as $reply) {
        $replyContent = isset($reply['content']) ? htmlspecialchars($reply['content']) : 'No reply content';
        $replyTimestamp = isset($reply['timestamp']) ? htmlspecialchars($reply['timestamp']) : 'No reply timestamp';
        echo "<div class='reply'>";
        echo "<p>$replyContent</p>";
        echo "<p class='timestamp'>$replyTimestamp</p>";
        echo "</div>";
    }
    echo "</div>";

    echo "</div>";
}
?>


            </div>
        </div>
    </div>

    <div id="footer">
        <footer class="footer">
            <p>&copy; 2023 <a href="#">ALPHA FINANCE</a>. All rights reserved.</p>
        </footer>
    </div>

    <script>
        // JavaScript code
        function toggleReplyForm(announcementId) {
            var form = document.getElementById('reply-form-' + announcementId);
            if (form.classList.contains('show-reply-form')) {
                form.classList.remove('show-reply-form');
            } else {
                form.classList.add('show-reply-form');
            }
        }
    </script>
</body>

</html>
