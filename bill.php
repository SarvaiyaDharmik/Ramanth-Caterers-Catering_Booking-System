<?php
include 'includes/db.php';
session_start();

// Fetch latest booking
$bookingQuery = $conn->query("SELECT * FROM booking_form ORDER BY id DESC LIMIT 1");
$booking = $bookingQuery->fetch_assoc();

// Safety check
if (!$booking) {
    die("⚠ No booking found.");
}

// Fetch dish/event name & price
$dishQuery = $conn->query("SELECT * FROM items WHERE id = " . (int)$booking['dish_id']);
$dish = $dishQuery->fetch_assoc();

$dish_name   = $dish['dish_name'] ?? $dish['item_name'] ?? $dish['name'] ?? "Unknown Item";
$dish_price  = $dish['price'] ?? 0;
$total_amount = $booking['total_amount'] ?? ($dish_price * $booking['quantity']);

// ✅ Format event date in dd-mm-yyyy
$event_date = !empty($booking['event_date']) ? date("d-m-Y", strtotime($booking['event_date'])) : "N/A";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shree Ramnath Caterers Bill</title>

  <!-- ✅ Internal CSS -->
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 20px;
      background: #f8f9fa;
      color: #333;
    }
    h2, h4 {
      text-align: center;
      margin-bottom: 10px;
    }
    .details {
      margin: 20px 0;
      font-size: 16px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 15px;
    }
    th, td {
      border: 1px solid #ddd;
      padding: 10px;
      text-align: center;
    }
    th {
      background: #007bff;
      color: white;
    }
    .total {
      margin-top: 20px;
      font-size: 18px;
      font-weight: bold;
      text-align: right;
    }
    .sign {
      margin-top: 40px;
      text-align: right;
      font-style: italic;
    }
    .finish-btn {
      text-align: center;
      margin-top: 30px;
    }
    .finish-btn button {
      background-color: #28a745;
      color: #fff;
      border: none;
      padding: 12px 25px;
      font-size: 16px;
      font-weight: bold;
      border-radius: 8px;
      cursor: pointer;
      transition: 0.3s;
    }
    .finish-btn button:hover {
      background-color: #1e7e34;
    }
  </style>
</head>
<body>
  <h2>Shree Ramnath Caterers</h2>
  <h4>Specialist in Pure Veg Food | Mo: 9978362636</h4>

  <div class="details">
    <div><strong>Name:</strong> <?php echo htmlspecialchars($booking['full_name']); ?></div>
    <div><strong>Date:</strong> <?php echo $event_date; ?></div>
  </div>

  <table>
    <tr>
      <th>No.</th>
      <th>Item</th>
      <th>Rate</th>
      <th>Qty</th>
      <th>Amount</th>
    </tr>
    <tr>
      <td>1</td>
      <td><?php echo htmlspecialchars($dish_name); ?></td>
      <td>₹<?php echo number_format($dish_price, 2); ?></td>
      <td><?php echo (int)$booking['quantity']; ?></td>
      <td>₹<?php echo number_format($total_amount, 2); ?></td>
    </tr>
  </table>

  <div class="total">Total: ₹<?php echo number_format($total_amount, 2); ?></div>

  <div class="sign">Signature: ____________________</div>

  <div class="finish-btn">
    <button id="thankBtn">Submit</button>
  </div>

  <!-- ✅ Internal JS -->
  <script>
    document.getElementById('thankBtn').addEventListener('click', () => {
        window.location.href = 'thankyou.php';
    });
  </script>
</body>
</html>
