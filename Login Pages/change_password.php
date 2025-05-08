<?php
session_start();

// Database connection details
$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "login_system";

$conn = new mysqli($servername, $db_username, $db_password, $dbname);

// Check the database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data from POST request
$username = $_POST['username'];
$current_password = $_POST['current_password'];
$new_password = $_POST['new_password'];

// Check if the username exists
$sql = $conn->prepare("SELECT * FROM users WHERE username = ?");
$sql->bind_param("s", $username);
$sql->execute();
$result = $sql->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    // Verify the current password entered by the user
    if (password_verify($current_password, $user['password'])) {
        // Hash the new password
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        // Update the password in the database
        $update_sql = $conn->prepare("UPDATE users SET password = ? WHERE username = ?");
        $update_sql->bind_param("ss", $hashed_password, $username);

        if ($update_sql->execute()) {
            // Password change success
            echo "Password changed successfully!";
            // Password change success
             header("Location: success.html"); // Redirect to a success page
             exit();

        } else {
            // Error updating password
            echo "Error updating password: " . $conn->error;
        }
    } else {
        // Current password is incorrect
        echo "Current password is incorrect.";
    }
} else {
    // User not found
    echo "User not found.";
}

$conn->close();
?>
