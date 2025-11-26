<?php include("includes/header.php"); ?>
<head>
  <meta charset="UTF-8">
  <title>Menu</title>
  <link rel="stylesheet" href="assets/css/menu.css">
</head>
<body>
 
  <div class="menu-container">
    <section class="menu-categories">
      <div class="category-card">
        <a href="sub_categories.php?category=breakfast">
          <img src="assets/images/breakfast1.jpg" alt="Breakfast">
          <h3>Breakfast</h3>
        </a>
      </div>

      <div class="category-card">
        <a href="sub_categories.php?category=lunch">
          <img src="assets/images/lunch.jpeg" alt="Lunch">
          <h3>Lunch</h3>
        </a>
      </div>

      <div class="category-card">
        <a href="sub_categories.php?category=dinner">
          <img src="assets/images/dinner.jpeg" alt="Dinner">
          <h3>Dinner</h3>
        </a>
      </div>
    </section>
       <a href="index.php" class="back-btn">⬅ Back</a>
  </div>
  <script src="assets/js/menu.js"></script>

</body>
</html>
