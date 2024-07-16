<?php
// Database connection
include('db_connection.php');

// Fetch user data along with account balance
$query = "SELECT users.id, users.username, users.phone_number, accounts.accountBalance 
          FROM users 
          LEFT JOIN accounts ON users.username = accounts.username";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

// Handle delete user action
if (isset($_POST['delete_user'])) {
    $user_id = $_POST['user_id'];
    
    // Perform the delete query
    $delete_query = "DELETE FROM users WHERE id = $user_id";
    $delete_result = mysqli_query($conn, $delete_query);

    if ($delete_result) {
        echo "<script>alert('User deleted successfully');</script>";
        // Redirect or reload the page after deletion
        echo "<script>window.location.href = 'admin_users.php';</script>";
    } else {
        echo "<script>alert('Failed to delete user');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manage Users</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Font Awesome CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: darkgrey;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            overflow-x: hidden;
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
        .container {
            margin-left: 0;
            padding: 20px;
            max-width: 50%;
            width: 100%;
            transition: margin-left 0.3s ease;
        }
        .container.shifted {
            margin-left: 200px;
        }
        .admin-name {
            position: flex;
            top: 20px;
            left: 220px;
            color: black;
            font-weight: bold;
            font-size: 25px;
            font-family: Arial, sans-serif;
        }
     
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: darkgrey;
    transition: margin-left 0.3s ease;
}

.container {
    padding: 20px;
    transition: margin-left 0.3s ease;
    animation: flipInY 1.5s ease forwards;
    opacity: 0;
}

@keyframes flipInY {
    0% {
        opacity: 0;
        transform: perspective(400px) rotateY(90deg);
    }
    100% {
        opacity: 1;
        transform: perspective(400px) rotateY(0deg);
    }
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

th, td {
    padding: 10px;
    text-align: left;
    border: 1px solid #ddd;
}

th {
    background-color: #444;
    color: #fff;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #ddd;
}

.status-active {
    color: green;
}

.status-matured {
    color: red;
}

.status-pending {
    color: orange;
}

footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background: #444;
            text-align: center;
            padding: 0.01rem;
            z-index: 999;
        }
        footer p {
            justify-content: center;
            margin: 0;
        }
        footer a {
            color: green;
            text-decoration: underline;
            font-weight: bold;
        }
        .actions button {
            margin-right: 5px;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .actions button.delete {
            background-color: #f44336;
            color: white;
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

        <h2>ADMIN PANEL</h2>
        <ul>
            <li><a href="admin_dashboard.php"><i class="fas fa-home icon"></i>Dashboard</a></li>
            <li><a href="admin_activation.php"><i class="fas fa-users icon"></i>Accounts Activation</a></li>
            <li><a href="admin_users.php"><i class="fas fa-users icon"></i>Manage Users</a></li>
            <li><a href="admin_deposits.php"><i class="fas fa-money-bill-alt icon"></i>Manage Deposits</a></li>
            <li><a href="admin_withdrawals.php"><i class="fas fa-credit-card icon"></i>Manage Withdrawals</a></li>
            <li><a href="admin_investments.php"><i class="fas fa-chart-line icon"></i>Manage Investments</a></li>
            <li><a href="admin_logout.php"><i class="fas fa-sign-out-alt icon"></i>Logout</a></li>
        </ul>
    </nav>
    <!-- Main Content -->
<div class="container" id="container">

<div class="image" style="text-align: center; margin-top: 20px;">
    <img src="images/alpha.webp" class="image2" alt="avatar" style="width: 60px; height: 60px; border-radius: 50%; border: 2px solid #444;">
</div>

<head>
    <style>
        .centered-heading {
            text-align: center;
        }
    </style>
</head>
<body>
    <h2 class="centered-heading">Manage Users</h2>
</body>

    <table>
        <tr>
            <th>Serial No</th>
            <th>Username</th>
            <th>Phone Number</th>
            <th>A/C Balance</th> <!-- Add Balance Column Header -->
            <th>Actions</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['phone_number']; ?></td>
                <td><?php echo $row['accountBalance'] !== null ? $row['accountBalance'] : '0.00'; ?></td> <!-- Display Balance Value -->
                <td class="actions">
                    <form method="post" style="display:inline;">
                        <input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
                        <button type="submit" name="delete_user" class="delete">Delete</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>

    <footer>
        <p>&copy; 2024 Your Website. All rights reserved. | Designed by <a href="#">Your Name</a></p>
    </footer>
    <script>
            function toggleNavbar() {
        const navbar = document.getElementById('navbar');
        const container = document.querySelector('.container');
        const menuIcon = document.querySelector('.menu-icon');
        const isOpen = navbar.classList.contains('show');
        
        if (isOpen) {
            navbar.classList.remove('show');
            container.style.marginLeft = '0';
            menuIcon.style.left = '10px';
        } else {
            navbar.classList.add('show');
            container.style.marginLeft = '200px';
            menuIcon.style.left = '210px';
        }
    }
    </script>
</body>
</html>
