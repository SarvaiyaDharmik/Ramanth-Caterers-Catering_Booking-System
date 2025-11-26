<?php 
include(__DIR__ . "/includes/header.php");
include(__DIR__ . "/includes/db.php");

$category = isset($_GET['category']) ? $_GET['category'] : '';
$sub = isset($_GET['sub']) ? $_GET['sub'] : '';

$title = ucfirst($sub) . " " . ucfirst($category) . " Items";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo htmlspecialchars($title); ?></title>
  <link rel="stylesheet" href="assets/css/item.css">
</head>
<body>
  <div class="menu-container">
    <h2><?php echo htmlspecialchars($title); ?></h2>
    
    <section class="items-grid">
      <?php
      if (!$conn) {
          echo "<p style='color:red; text-align:center;'>Database connection failed.</p>";
      } else {
          $sql = "SELECT * FROM items WHERE category = ? AND sub_category = ?";
          $stmt = $conn->prepare($sql);

          if ($stmt) {
              $stmt->bind_param("ss", $category, $sub);
              $stmt->execute();
              $result = $stmt->get_result();

              if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                      ?>
                      <div class="item-card">
                        <img src="assets/images/<?php echo htmlspecialchars($row['image']); ?>" 
                             alt="<?php echo htmlspecialchars($row['item_name']); ?>">
                        <h4><?php echo htmlspecialchars($row['item_name']); ?></h4>
                        <p>₹<?php echo htmlspecialchars($row['price']); ?></p>
                        <a href="book.php" class="order-btn">Order Now</a>
                      </div>
                      <?php
                  }
              } else {
                  echo "<p style='text-align:center;'>No items found for this selection.</p>";
              }
              $stmt->close();
          } else {
              echo "<p style='color:red; text-align:center;'>Query preparation failed.</p>";
          }
      }
      ?>
    </section>

    <!-- ✅ Centered Back Button -->
    <div class="back-btn-container">
      <a href="sub_categories.php?category=<?php echo urlencode($category); ?>" class="back-btn">
        ⬅ Back to Sub-Categories
      </a>
    </div>
  </div>
</body>
</html>
