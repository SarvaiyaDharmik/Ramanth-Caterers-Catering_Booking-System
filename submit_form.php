<?php
include 'includes/db.php'; // Database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Correct table name
    $stmt = $conn->prepare("INSERT INTO contact_messages (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);

    if ($stmt->execute()) {
        echo "<script>alert('Message sent successfully!'); window.location.href='contact_form.php';</script>";
    } else {
        echo "<script>alert('Error: ".$stmt->error."'); window.location.href='contact_form.php';</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
