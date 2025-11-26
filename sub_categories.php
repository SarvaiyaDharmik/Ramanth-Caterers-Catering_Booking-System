<?php include("includes/header.php"); ?>

<?php
$category = isset($_GET['category']) ? $_GET['category'] : 'breakfast';
$title = ucfirst($category) . " Sub-Categories";
?>

<head>
  <meta charset="UTF-8">
  <title><?php echo $title; ?></title>
  <link rel="stylesheet" href="assets/css/sub_categories.css">
</head>

<body>
  <div class="menu-container">
    <h2><?php echo $title; ?></h2>
    <section class="sub-categories">
      <div class="sub-card">
        <a href="items.php?category=<?php echo $category; ?>&sub=gujarati">
          <img src="assets/images/gujarati_image.jpeg" alt="Gujarati">
          <h4>Gujarati</h4>
        </a>
      </div>

      <div class="sub-card">
        <a href="items.php?category=<?php echo $category; ?>&sub=punjabi">
          <img src="assets/images/punjabi_image.jpeg" alt="Punjabi">
          <h4>Punjabi</h4>
        </a>
      </div>

      <div class="sub-card">
        <a href="items.php?category=<?php echo $category; ?>&sub=Chinese">
          <img src="assets/images/Chinese_image.jpeg" alt="Chinese">
          <h4>Chinese</h4>
        </a>
      </div>

      <div class="sub-card">
        <a href="items.php?category=<?php echo $category; ?>&sub=South Indian">
          <img src="assets/images/South_Indian_image.jpeg" alt="South Indian">
          <h4>South Indian</h4>
        </a>
      </div>
    </section>
    <a href="menu.php" class="back-btn">⬅ Back to Menu</a>
  </div>
</body>
</html>
