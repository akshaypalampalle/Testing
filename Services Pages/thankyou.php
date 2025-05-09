<?php
session_start();
$booking = $_SESSION['booking'] ?? null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Thank You</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      background: #f0f4f8;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    .container {
      background: #ffffff;
      padding: 40px;
      border-radius: 12px;
      text-align: center;
      box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15);
      max-width: 600px;
      width: 90%;
    }

    .checkmark {
      font-size: 4rem;
      color: #28a745;
      margin-bottom: 20px;
    }

    h1 {
      color: #28a745;
      font-size: 2.5rem;
      margin-bottom: 10px;
    }

    p {
      font-size: 1.2rem;
      color: #333;
      margin-bottom: 20px;
    }

    .details {
      background-color: #f8f9fa;
      padding: 20px;
      border-radius: 8px;
      margin-bottom: 30px;
      text-align: left;
    }

    .details h3 {
      margin-bottom: 10px;
      color: #007bff;
    }

    .details ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .details li {
      padding: 5px 0;
      border-bottom: 1px solid #ddd;
    }

    .btn-group {
      display: flex;
      justify-content: center;
      gap: 15px;
      flex-wrap: wrap;
    }

    .btn {
      display: inline-block;
      padding: 12px 25px;
      background-color: #007bff;
      color: #fff;
      text-decoration: none;
      border-radius: 6px;
      transition: background-color 0.3s ease;
      font-weight: bold;
    }

    .btn:hover {
      background-color: #0056b3;
    }

    .btn.print {
      background-color: #28a745;
    }

    .btn.print:hover {
      background-color: #1e7e34;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="checkmark">✅</div>
    <h1>Thank You!</h1>
    <p>Your booking has been successfully submitted.<br> We will get in touch with you shortly.</p>

    <?php if ($booking): ?>
      <div class="details">
        <h3>Booking Details:</h3>
        <ul>
          <li><strong>Name:</strong> <?= htmlspecialchars($booking['name']) ?></li>
          <li><strong>Phone:</strong> <?= htmlspecialchars($booking['phone']) ?></li>
          <li><strong>Email:</strong> <?= htmlspecialchars($booking['email']) ?></li>
          <li><strong>Service Booked:</strong> <?= htmlspecialchars($booking['service']) ?></li>
          <li><strong>Address:</strong> <?= htmlspecialchars($booking['address']) ?></li>
          <li><strong>Date:</strong> <?= htmlspecialchars($booking['date']) ?></li>
          <li><strong>Time:</strong> <?= htmlspecialchars($booking['time']) ?></li>
        </ul>
      </div>
    <?php else: ?>
      <p>No booking data found.</p>
    <?php endif; ?>

    <div class="btn-group">
      <a href="../index.html" class="btn">Return to Home</a>
      <button onclick="window.print()" class="btn print">Print Receipt</button>
    </div>
  </div>
</body>
</html>
