<?php
session_start();
include("includes/db.php");

$successMsg = $errorMsg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $password = trim($_POST['password']);
    $confirmPassword = trim($_POST['confirmPassword']);
    $termsChecked = isset($_POST['terms']);

    // VALIDATION
    if (!preg_match("/^[a-zA-Z ]+$/", $firstName)) {
        $errorMsg = "First name can contain English letters only.";
    }
    elseif (!preg_match("/^[a-zA-Z ]+$/", $lastName)) {
        $errorMsg = "Last name can contain English letters only.";
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMsg = "Invalid email address.";
    }
    elseif (!preg_match("/^[0-9]{7,15}$/", $phone)) {
        $errorMsg = "Phone number must be numeric (7-15 digits).";
    }
    elseif (strlen($password) < 6) {
        $errorMsg = "Password must be at least 6 characters long.";
    }
    elseif ($password !== $confirmPassword) {
        $errorMsg = "Passwords do not match.";
    }
    elseif (!$termsChecked) {
        $errorMsg = "You must agree to the terms and conditions.";
    }

    // IF no validation errors
    if (empty($errorMsg)) {

        // Check duplicate email
        $checkStmt = $conn->prepare("SELECT email FROM registrations WHERE email=?");
        $checkStmt->bind_param("s", $email);
        $checkStmt->execute();
        $checkStmt->store_result();

        if ($checkStmt->num_rows > 0) {
            $errorMsg = "This email is already registered. Please login instead.";
        } else {

            // INSERT DATA
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $conn->prepare("INSERT INTO registrations 
                (first_name, last_name, email, phone, password) 
                VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $firstName, $lastName, $email, $phone, $hashedPassword);

            if ($stmt->execute()) {
                header("Location: login_form.php?msg=registered");
                exit();
            } else {
                $errorMsg = "Database error: " . $stmt->error;
            }
            $stmt->close();
        }

        $checkStmt->close();
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Catrace Catering - Registration</title>
<link rel="stylesheet" href="assets/css/registraction_form.css">

<!-- LIVE VALIDATION SCRIPT -->
<script>
document.addEventListener("DOMContentLoaded", function () {

    // FIRST NAME - Only A-Z allowed
    document.querySelector("input[name='firstName']").addEventListener("input", function () {
        this.value = this.value.replace(/[^A-Za-z ]/g, "");
    });

    // LAST NAME - Only A-Z allowed
    document.querySelector("input[name='lastName']").addEventListener("input", function () {
        this.value = this.value.replace(/[^A-Za-z ]/g, "");
    });

    // PHONE - Only numbers allowed
    document.querySelector("input[name='phone']").addEventListener("input", function () {
        this.value = this.value.replace(/[^0-9]/g, "");
    });

});
</script>

</head>
<body>

<div class="hero-section">
    <div class="overlay"></div>
    <h2 class="title">REGISTRATION FORM</h2>
</div>

<div class="form-container">
    <div class="form-card">
        <h2 class="form-heading">CREATE ACCOUNT</h2>

        <?php if (!empty($successMsg)) echo "<div class='success'>$successMsg</div>"; ?>
        <?php if (!empty($errorMsg)) echo "<div class='error'>$errorMsg</div>"; ?>

        <form method="post" action="">

            <label>First Name</label>
            <input type="text" name="firstName" required>

            <label>Last Name</label>
            <input type="text" name="lastName" required>

            <label>Email Address</label>
            <input type="email" name="email" required>

            <label>Phone Number</label>
            <input type="tel" name="phone" required maxlength="15">

            <label>Password</label>
            <input type="password" name="password" required minlength="6">

            <label>Confirm Password</label>
            <input type="password" name="confirmPassword" required minlength="6">

            <div class="terms">
                <input type="checkbox" name="terms" required> I agree to the Terms & Conditions
            </div>

            <button type="submit" class="submit-button">Register</button>

            <div class="form-footer">
                <p>Already have an account? <a href="login_form.php">Login here</a></p>
            </div>
        </form>
    </div>
</div>

<footer class="footer">
    <p>&copy; 2025 Ramnath Catrace Catering. All Rights Reserved.</p>
</footer>

</body>
</html>
