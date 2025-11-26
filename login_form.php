<?php
session_start();
include("includes/db.php");

$successMsg = "";
$errorMsg = "";

// Show success message after registration
if (isset($_GET['msg']) && $_GET['msg'] === "registered") {
    $successMsg = "✅ Registration successful! Please login.";
}

// Handle login
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $emailInput = trim($_POST['email']);
    $passwordInput = trim($_POST['password']);

    if (!filter_var($emailInput, FILTER_VALIDATE_EMAIL)) {
        $errorMsg = "Please enter a valid email address.";
    } else {
        $sql = "SELECT * FROM registrations WHERE email=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $emailInput);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows === 1) {
            $user = $result->fetch_assoc();
            if (password_verify($passwordInput, $user['password'])) {
                $_SESSION['email'] = $user['email'];
                $_SESSION['user_name'] = $user['first_name'] . " " . $user['last_name'];
                $_SESSION['user_id'] = $user['id'];
                header("Location: index.php");
                exit();
            } else {
                $errorMsg = "Invalid email or password!";
            }
        } else {
            $errorMsg = "Invalid email or password!";
        }
        $stmt->close();
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login - Ramnath Catrace</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/login_form.css">
</head>
<body class="bg-light">

<div class="container pt-5">
  <div class="row justify-content-center">
    <div class="col-md-5">
      <div class="card shadow-sm mt-5">
        <div class="card-body p-4">
          <h3 class="card-title mb-3 text-center">Login Here</h3>

          <?php if (!empty($successMsg)) echo "<div class='alert alert-success'>$successMsg</div>"; ?>
          <?php if (!empty($errorMsg)) echo "<div class='alert alert-danger'>$errorMsg</div>"; ?>

          <form method="POST">
            <div class="mb-3">
              <label>Email</label>
              <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
              <label>Password</label>
              <input type="password" name="password" class="form-control" required>
            </div>

            <div class="mb-3 text-center">
              <a href="forgot_password.php">Forgot Password?</a>
            </div>

            <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
          </form>

          <!-- Admin Login Button -->
          <div class="mt-3 text-center">
            <a href="./admin/admin_login.php" class="btn btn-dark w-100">Login as Admin</a>
          </div>

          <div class="mt-3 text-center">
            <p>Don't have an account? <a href="registraction_form.php">Register here</a></p>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>
