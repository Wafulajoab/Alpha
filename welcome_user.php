<?php
session_start();
?>

<header>
    <h1>Welcome, <?php echo isset($_SESSION["username"]) ? $_SESSION["username"] : "User"; ?>!</h1>
</header>

<main>
    <p>This is the user's dashboard. You can add your content here.</p>
    <p>Click <a href="home_page.php">here</a> to go to the home page.</p>
</main>
