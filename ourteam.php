<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "ramnath_database";

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch team members ordered by id ascending or created_at if you want latest first
$sql = "SELECT * FROM team_members ORDER BY id ASC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Our Team - Ramnath Caterers Catering</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* Body and page setup */
body {
  background: linear-gradient(to right, #7c3aed, #3b82f6);
  min-height: 100vh;
  display: flex;
  flex-direction: column;
  align-items: center;
  margin: 0;
  padding-top: 80px; /* for fixed navbar */
  font-family: Arial, sans-serif;
  color: #333;
}

/* Navbar */
nav {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  background: white;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
  padding: 1rem 2rem;
  display: flex;
  justify-content: space-between;
  align-items: center;
  z-index: 50;
}

nav ul {
  list-style: none;
  display: flex;
  gap: 1.5rem;
  margin: 0;
  padding: 0;
  flex-wrap: wrap;
}

nav a {
  text-decoration: none;
  color: #4c1d95;
  font-weight: 600;
  transition: color 0.3s;
  white-space: nowrap;
}

nav a:hover {
  color: #7c3aed;
}

/* Logo */
.logo {
  white-space: nowrap;
}

/* Page header */
.page-header {
  text-align: center;
  color: white;
  margin-bottom: 3rem;
  padding: 0 1rem;
}

.page-header h1 {
  font-size: 2.5rem;
  font-weight: 700;
  margin-bottom: 0.5rem;
}

.page-header p {
  font-size: 1.1rem;
  opacity: 0.85;
}

/* Team container grid */
.team-container {
  width: 90%;
  max-width: 1200px; /* Corrected max-width for grid layout */
  margin: 0 auto 4rem;
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  gap: 2rem;
  padding: 0 1rem;
}

/* Each member card */
.member-card {
  background: white;
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 2rem 1.5rem 1.5rem;
  text-align: center;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.member-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
}

/* Member images */
.member-card img {
  width: 150px;
  height: 150px;
  object-fit: cover;
  border-radius: 50%;
  margin-bottom: 1rem;
  border: 4px solid #7c3aed;
}

/* Member name */
.member-card h2 {
  font-size: 1.3rem;
  color: #7c3aed;
  margin: 0.5rem 0 0.25rem;
  font-weight: 700;
}

/* Member role */
.member-card h3 {
  font-size: 1.1rem;
  color: #4c1d95;
  margin: 0.25rem 0 1rem;
  font-weight: 600;
  text-transform: uppercase;
}

/* Contact info */
.member-card p {
  color: #555;
  font-size: 0.95rem;
  margin: 0.15rem 0;
  word-wrap: break-word;
  max-width: 100%;
}

/* Responsive adjustments */
@media (max-width: 400px) {
  .member-card {
    padding: 1.5rem 1rem 1rem;
  }
  .member-card img {
    width: 120px;
    height: 120px;
  }
  .page-header h1 {
    font-size: 2rem;
  }
  .page-header p {
    font-size: 1rem;
  }
}

  </style>
</head>
<body>

<nav>
  <div class="logo text-2xl font-bold text-purple-700">Ramnath Caterers</div>
  <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="menu.php">Menu</a></li>
      <li><a href="packages.php">Packages</a></li>
      <li><a href="ourteam.php">Our Team</a></li>
      <li><a href="gallery.php">Gallery</a></li>
      <li><a href="testimonials.php">Testimonials</a></li>
      <li><a href="contact_form.php">Contact</a></li>
      <li><a href="logout.php" style="background:#ef4444; color:white; padding:0.5rem 1rem; border-radius:8px;">Logout</a></li>
  </ul>
</nav>

<div class="page-header text-center text-white mb-8">
  <h1 class="text-4xl font-bold mb-2">Meet Our Team</h1>
  <p class="text-lg">The heart of Ramnatha Catrace Catering</p>
</div>

<div class="team-container">
<?php if ($result && $result->num_rows > 0): ?>
    <?php while ($row = $result->fetch_assoc()): ?>
        <div class="member-card">
            <img src="<?php echo 'assets/uploads/' . htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['full_name']); ?>" />
            <h2><?php echo htmlspecialchars($row['full_name']); ?></h2>
            <h3><?php echo htmlspecialchars($row['role']); ?></h3>
            <p>Mobile: <?php echo htmlspecialchars($row['mobile_no']); ?></p>
            <p>Email: <?php echo htmlspecialchars($row['email']); ?></p>
        </div>
    <?php endwhile; ?>
<?php else: ?>
    <p style="color:white; text-align:center; width: 100%;">No team members found. Add members from the admin panel.</p>
<?php endif; ?>
</div>

</body>
</html>