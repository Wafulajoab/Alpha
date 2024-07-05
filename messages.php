<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "alpha";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sanitize input data
function sanitizeData($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Process sending a message
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['send'])) {
    $sender = $_SESSION['username'];
    $receiver = sanitizeData($_POST['receiver']);
    $message = sanitizeData($_POST['message']);

    $stmt = $conn->prepare("INSERT INTO messages (sender, receiver, message) VALUES (?, ?, ?)");
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("sss", $sender, $receiver, $message);

    if ($stmt->execute()) {
        // Redirect to the same page to prevent duplicate form submissions
        header("Location: messages.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Retrieve messages for the logged-in user
$loggedInUser = $_SESSION['username'];
$stmt = $conn->prepare("SELECT * FROM messages WHERE sender = ? OR receiver = ? ORDER BY timestamp DESC");
if ($stmt === false) {
    die("Prepare failed: " . $conn->error);
}
$stmt->bind_param("ss", $loggedInUser, $loggedInUser);
$stmt->execute();
$result = $stmt->get_result();

$messages = [];
while ($row = $result->fetch_assoc()) {
    $messages[] = $row;
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>
    <!-- Font Awesome CSS for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: darkgrey;
            transition: margin-left 0.3s ease;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            margin-left: 40%;
            transition: margin-left 0.3s ease;
        }

        .navbar {
            position: fixed;
            top: 0;
            left: -200px;
            width: 200px;
            height: 100vh;
            background-color: #444;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 0;
            transition: left 0.3s ease;
        }

        .navbar.show {
            left: 0;
        }

        .navbar.show ~ .container {
            margin-left: 200px;
        }

        .menu-icon {
            color: white;
            font-size: 40px;
            margin-right: 10px;
            cursor: pointer;
            position: absolute;
            top: 10px;
            left: 10px;
            z-index: 1000;
            transition: left 0.3s ease;
        }

        .navbar {
            position: fixed;
            top: 0;
            left: -200px;
            width: 200px;
            height: 100vh;
            background-color: #444;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 0;
            transition: left 0.3s ease;
            overflow-y: auto; /* Added for scrollbar */
        }
        .navbar.show {
            left: 0;
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
            padding: .2rem;
            margin: .2rem 0;
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
        .thank-you-message {
            display: none;
            position: fixed;
            top: 50%;
            right: 20px;
            transform: translateY(-50%);
            font-size: 40px;
            color: #fff;
            text-align: center;
            padding: 10px;
            background-color: rgba(0, 0, 0, 0.7);
            border-radius: 10px;
            animation: colorChange 5s infinite;
        }

        @keyframes colorChange {
            0% { color: red; }
            25% { color: yellow; }
            50% { color: green; }
            75% { color: blue; }
            100% { color: red; }
        }

        footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background: #444;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            z-index: 999;
        }

        footer p {
            margin: 0;
        }

        footer a {
            color: green;
            text-decoration: underline;
            font-weight: bold;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input, .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-group button {
            width: 100%;
            padding: 10px;
            background-color: #8a2be2;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-group button:hover {
            background-color: #5f04b4;
        }

        .messages {
            margin-top: 20px;
        }

        .message {
            border-bottom: 1px solid #ccc;
            padding: 10px 0;
        }

        .message p {
            margin: 5px 0;
        }

        .message strong {
            color: #333;
        }
    </style>
</head>
<body>

 <!-- Menu Icon -->
 <i class="fas fa-bars menu-icon" onclick="toggleNavbar()"></i>

<!-- Navigation Bar -->
<nav class="navbar" id="navbar">
<div class="image" style="text-align: center; margin-top: 20px;">
         <img src="images/alpha.webp" class="image2" alt="avatar" style="width: 60px; height: 60px; border-radius: 50%; border: 2px solid #444;">
            </div>
    <h2>ALPHA FINANCE</h2>
    <ul>
        <li><a href="home_page.php"><i class="fas fa-home icon"></i>Dashboard</a></li>
        <li><a href="deposits.php"><i class="fas fa-money-bill-alt icon"></i>Deposit</a></li>
        <li><a href="summary.php"><i class="fas fa-file-alt icon"></i>Summary</a></li>
        <li><a href="investments.php"><i class="fas fa-chart-line icon"></i>Invest</a></li>
        <li><a href="active_investments.php"><i class="fas fa-chart-line icon"></i>Active Investments</a></li>
        <li><a href="withdraw.php"><i class="fas fa-credit-card icon"></i>Withdrawals</a></li>
        <li><a href="messages.php"><i class="fas fa-envelope icon"></i>Messages</a></li>
        <li><a href="referral.php"><i class="fas fa-user-friends icon"></i>Referral</a></li>
        <li><a href="logout.php"><i class="fas fa-sign-out-alt icon"></i>Logout</a></li>
 </ul>
 <br>
</nav>


<div class="thank-you-message" id="thankYouMessage">
    Thank you, <?php echo $_SESSION['username']; ?>,
    <br>For entrusting us with your funds and investing with us,<br> We are glad you are part of us!
</div>
<br><br>
<div class="container">
    <h2>Send Message</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form-group">
            <label for="receiver">Receiver:</label>
            <input type="text" id="receiver" name="receiver" required>
        </div>
        <div class="form-group">
            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="4" required></textarea>
        </div>
        <div class="form-group">
            <button type="submit" name="send">Send</button>
        </div>
    </form>

    <h2>Messages</h2>
    <div class="messages">
        <?php if (count($messages) > 0): ?>
            <?php foreach ($messages as $msg): ?>
                <div class="message">
                    <p><strong>From:</strong> <?php echo $msg['sender']; ?></p>
                    <p><strong>To:</strong> <?php echo $msg['receiver']; ?></p>
                    <p><?php echo $msg['message']; ?></p>
                    <p><small><strong>Time:</strong> <?php echo $msg['timestamp']; ?></small></p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No messages found.</p>
        <?php endif; ?>
    </div>
</div>

<footer>
        <p>Company. <strong>All Rights Reserved.</strong> Designed By <a href="jmtech.php">JMTech</a></p>
    </footer>

    

    <script>
function toggleNavbar() {
    var navbar = document.getElementById('navbar');
    var thankYouMessage = document.getElementById('thankYouMessage');
    var container = document.querySelector('.container');
    var menuIcon = document.querySelector('.menu-icon');
    var isOpen = navbar.classList.contains('show');
    
    navbar.classList.toggle('show');
    
    if (isOpen) {
        navbar.classList.remove('show');
        container.style.marginLeft = '0';
        menuIcon.style.left = '10px';
        thankYouMessage.style.display = 'none';
    } else {
        navbar.classList.add('show');
        container.style.marginLeft = '200px';
        menuIcon.style.left = '210px';
        thankYouMessage.style.display = 'block';
    }
}
</script>

</body>
</html>
