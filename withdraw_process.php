<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are filled
    if (isset($_POST["phone_number"]) && isset($_POST["withdraw_amount"])) {
        // Get form data
        $phone_number = $_POST["phone_number"];
        $withdraw_amount = $_POST["withdraw_amount"];

        // Validate input data (you can add more validations as needed)
        if (!empty($phone_number) && !empty($withdraw_amount) && is_numeric($withdraw_amount) && $withdraw_amount > 0) {
            // Assuming you have a database connection established
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "alpha";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Check if the user exists in the database
            $check_user_sql = "SELECT id, account_balance FROM users WHERE phone_number = ?";
            $stmt = $conn->prepare($check_user_sql);
            $stmt->bind_param("s", $phone_number);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                // User exists, update account balance with withdrawal
                $user_data = $result->fetch_assoc();
                $user_id = $user_data["id"];
                $account_balance = $user_data["account_balance"];

                if ($account_balance >= $withdraw_amount) {
                    // Sufficient balance, proceed with withdrawal
                    $withdraw_sql = "INSERT INTO withdrawals (user_id, withdrawal_amount) VALUES (?, ?)";
                    $stmt = $conn->prepare($withdraw_sql);
                    $stmt->bind_param("id", $user_id, $withdraw_amount);

                    if ($stmt->execute()) {
                        // Update account balance after withdrawal
                        $new_balance = $account_balance - $withdraw_amount;
                        $update_balance_sql = "UPDATE users SET account_balance = ? WHERE id = ?";
                        $stmt = $conn->prepare($update_balance_sql);
                        $stmt->bind_param("di", $new_balance, $user_id);

                        if ($stmt->execute()) {
                            // Withdrawal successful
                            echo '<script>alert("Withdrawal Successful"); window.location.href = "withdraw.php";</script>';
                            exit; // Prevent further execution
                        } else {
                            echo "Error updating account balance: " . $conn->error;
                        }
                    } else {
                        echo "Error recording withdrawal: " . $conn->error;
                    }
                } else {
                    echo "Insufficient balance for withdrawal";
                }
            } else {
                echo "User not found";
            }

            // Close statement and connection
            $stmt->close();
            $conn->close();
        } else {
            echo "Invalid input data";
        }
    } else {
        echo "Missing required fields";
    }
} else {
    echo "Form not submitted";
}
?>
