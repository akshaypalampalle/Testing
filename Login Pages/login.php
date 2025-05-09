
<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "servicehub";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$username = $_POST['username'];
$password = $_POST['password'];

// Check if username exists
$sql = $conn->prepare("SELECT * FROM users WHERE username = ?");
$sql->bind_param("s", $username);
$sql->execute();
$result = $sql->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    // Verify the password
    if (password_verify($password, $user['password'])) {
        header("Location: ../index.html");
        
    } else {
        echo "Invalid password.";
    }
    
} else {
    echo "User not found.";
}

$conn->close();
?>
