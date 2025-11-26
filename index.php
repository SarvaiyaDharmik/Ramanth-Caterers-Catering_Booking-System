<?php
session_start();
include("includes/db.php");

// Redirect logic: agar user session na hoy to
if (!isset($_SESSION['email'])) {
    // Check DB: registered users count
    $result = $conn->query("SELECT COUNT(*) AS c FROM registrations");
    $row = $result->fetch_assoc();

    if ($row['c'] > 0) {
        // Agar user already registered → login page
         header("Location: registraction_form.php");
        
    } else {
        // Agar DB empty → registration page
        header("Location: login_form.php");
       
    }
    exit();
}

include("includes/header.php");
?>

<!-- Hero Carousel -->
<div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="assets/images/home_page1.png" class="d-block w-100 banner-img" alt="banner">
    </div>
  </div>
</div>

<!-- Quick Links -->
<section class="services py-4">
  <div class="container">
    <h2 class="text-center mb-4">Our Services</h2>
    <div class="row text-center">
      <div class="col-md-4">
        <h4>🍽️ Our Menu</h4>
        <p>Explore our variety of dishes</p>
        <a href="menu.php" class="btn btn-outline-primary">View Menu</a>
      </div>
      <div class="col-md-4">
        <h4>🎉 Event Packages</h4>
        <p>Perfect for weddings, birthdays & more</p>
        <a href="packages.php" class="btn btn-outline-success">View Packages</a>
      </div>
      <div class="col-md-4">
        <h4>🧾 Book Now</h4>
        <p>Reserve catering for your event</p>
        <a href="book.php" class="btn btn-outline-danger">Book Now</a>
      </div>
    </div>
  </div>
</section>

<!-- About Section -->
<section class="about py-5 bg-light">
  <div class="container text-center">
    <h2 class="mb-4">Why Choose Ramnath Catrace?</h2>
    <p>
      Welcome, <strong><?php echo htmlspecialchars($_SESSION['user_name']); ?></strong>!<br>
      Experienced team, delicious food, and seamless event management.<br>
      We’ve served <strong>100+ happy events</strong> across Gujarat!
    </p>
  </div>
</section>

<?php include("includes/footer.php"); ?>
