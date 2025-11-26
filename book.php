<?php
include 'includes/db.php';
session_start();

// Fetch dynamic dishes/events from items table
$dishes = [];
$result = $conn->query("SELECT id, item_name, price FROM items");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $dishes[] = $row;
    }
}

// Handle booking form submission
if (isset($_POST['submit_booking'])) {
    $full_name = $_POST['name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone'];
    $dish_id = $_POST['dish_id'];
    $quantity = (int)$_POST['quantity'];
    $event_date = $_POST['event_date']; // comes in YYYY-MM-DD from input[type=date]
    $additional_details = $_POST['message'];

    // ✅ Ensure event_date is in correct format for MySQL DATE
    $event_date = date("Y-m-d", strtotime($event_date));

    // Get dish name and price
    $dish_query = $conn->query("SELECT item_name, price FROM items WHERE id='$dish_id'");
    if ($dish_query && $dish_query->num_rows > 0) {
        $dish_row = $dish_query->fetch_assoc();
        $dish_name = $dish_row['item_name'];
        $dish_price = $dish_row['price'];
        $total_price = $dish_price * $quantity;

        // Insert booking into database
        $stmt = $conn->prepare("INSERT INTO booking_form (full_name, email, phone_number, dish_id, quantity, event_date, comments, total_amount) 
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssisssd", $full_name, $email, $phone_number, $dish_id, $quantity, $event_date, $additional_details, $total_price);

        if ($stmt->execute()) {
            // Save booking info in session for payment.php
            $_SESSION['booking'] = [
                'full_name' => $full_name,
                'email' => $email,
                'dish_id' => $dish_id,
                'dish_name' => $dish_name,
                'quantity' => $quantity,
                'total_price' => $total_price,
                'event_date' => $event_date
            ];
            header("Location: payment.php");
            exit();
        } else {
            $error = "Error submitting booking. Please try again.";
        }
        $stmt->close();
    } else {
        $error = "Invalid dish selected.";
    }
}

// Include the header with navbar
include 'includes/header.php';
?>

<div class="container mt-5 pt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h3>Book Now</h3>
                </div>
                <div class="card-body">
                    <?php if (isset($error)): ?>
                        <div class="alert alert-danger"><?= $error ?></div>
                    <?php endif; ?>

                    <form action="" method="POST">
                        <div class="mb-3">
                            <label>Full Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Phone Number</label>
                            <input type="tel" name="phone" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Select Dish/Event</label>
                            <select name="dish_id" class="form-control" required>
                                <option value="" disabled selected>Select your option</option>
                                <?php foreach ($dishes as $dish): ?>
                                    <option value="<?= $dish['id'] ?>"><?= $dish['item_name'] ?> (₹<?= $dish['price'] ?>)</option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label>Quantity</label>
                            <input type="number" name="quantity" class="form-control" min="1" value="1" required>
                        </div>

                        <div class="mb-3">
                            <label>Event Date</label>
                            <input type="date" name="event_date" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Additional Details</label>
                            <textarea name="message" class="form-control" rows="4" placeholder="Provide additional details"></textarea>
                        </div>

                        <div class="text-center">
                            <button type="submit" name="submit_booking" class="btn btn-success">Submit Booking</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
