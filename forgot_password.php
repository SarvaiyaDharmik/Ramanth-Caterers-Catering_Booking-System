<?php
session_start();
include("includes/db.php");

$resetMsg = "";
$errorMsg = "";

// Handle password reset
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $newPassword = trim($_POST['new_password']);
    $confirmPassword = trim($_POST['confirm_password']);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMsg = "Please enter a valid email.";
    } elseif ($newPassword !== $confirmPassword) {
        $errorMsg = "Passwords do not match!";
    } else {
        $sql = "SELECT * FROM registrations WHERE email=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows === 1) {
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $update = "UPDATE registrations SET password=? WHERE email=?";
            $updStmt = $conn->prepare($update);
            $updStmt->bind_param("ss", $hashedPassword, $email);

            if ($updStmt->execute()) {
                $resetMsg = "✅ Password updated successfully! You can now login.";
            } else {
                $errorMsg = "Failed to update password!";
            }
            $updStmt->close();
        } else {
            $errorMsg = "Email not found!";
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
<title>Reset Password - Ramnath Catrace</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/login_form.css">
</head>
<body class="bg-light">

<div class="container pt-5">
  <div class="row justify-content-center">
    <div class="col-md-5">
      <div class="card shadow-sm mt-5">
        <div class="card-body p-4">
          <h3 class="card-title mb-3 text-center">Reset Your Password</h3>

          <?php if (!empty($resetMsg)) echo "<div class='alert alert-success'>$resetMsg</div>"; ?>
          <?php if (!empty($errorMsg)) echo "<div class='alert alert-danger'>$errorMsg</div>"; ?>

          <form method="POST">
            <div class="mb-3">
              <label>Email</label>
              <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
              <label>New Password</label>
              <input type="password" name="new_password" class="form-control" required>
            </div>
            <div class="mb-3">
              <label>Confirm New Password</label>
              <input type="password" name="confirm_password" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-warning w-100">Reset Password</button>
          </form>

          <div class="mt-3 text-center">
            <a href="login_form.php">Back to Login</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>
