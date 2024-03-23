<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "alpha";

// Create connection
$connection = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}


$query = "SELECT * FROM active_investments";
$result = mysqli_query($connection, $query);

if (mysqli_num_rows($result) > 0) {
    echo '<table border="1">
            <tr>
                <th>Investor Name</th>
                <th>Package Name</th>
                <th>Investment Amount</th>
                <th>Investment Duration</th>
                <th>Start Date</th>
            </tr>';
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>
                <td>' . $row['investor_name'] . '</td>
                <td>' . $row['package_name'] . '</td>
                <td>' . $row['investment_amount'] . '</td>
                <td>' . $row['investment_duration'] . ' days</td>
                <td>' . $row['start_date'] . '</td>
              </tr>';
    }
    echo '</table>';
} else {
    echo 'No active investments found.';
}
?>
