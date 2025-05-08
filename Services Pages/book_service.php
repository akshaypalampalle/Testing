<?php
session_start(); // Start session to store booking data

$host = "localhost";
$username = "root";
$password = "";
$dbname = "servicehub";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = htmlspecialchars($_POST['name']);
$phone = htmlspecialchars($_POST['phone']);
$email = htmlspecialchars($_POST['email']);
$service = htmlspecialchars($_POST['service']);
$address = htmlspecialchars($_POST['address']);
$date = $_POST['date'];
$time = $_POST['time'];

$sql = "INSERT INTO bookings (name, phone, email, service, address, date, time)
        VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssss", $name, $phone, $email, $service, $address, $date, $time);

if ($stmt->execute()) {
    // Save booking data to session
    $_SESSION['booking'] = [
        'name' => $name,
        'phone' => $phone,
        'email' => $email,
        'service' => $service,
        'address' => $address,
        'date' => $date,
        'time' => $time
    ];
    header("Location: thankyou.php");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
