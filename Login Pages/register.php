<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if password and confirm password match
    if ($password !== $confirm_password) {
        echo "Passwords do not match.";
        exit();
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    // Insert user into the database
    $sql = $conn->prepare("INSERT INTO users (username, email, mobile, password) VALUES (?, ?, ?, ?)");
    $sql->bind_param("ssss", $username, $email, $mobile, $hashed_password);
    
    if ($sql->execute()) {
        // Display success message and redirect
        echo "<script>
                alert('Registration successful! You can now log in.');
                window.location.href = 'login.html';
              </script>";
    } else {
        echo "Error registering user: " . $conn->error;
    }

    $conn->close();
}
?>
