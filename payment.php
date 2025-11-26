<?php
session_start();

// Redirect if no booking exists in session
if(!isset($_SESSION['booking'])){
    header("Location: bill.php");
    exit();
}

$booking = $_SESSION['booking'];
$total_price = $booking['total_price'];
$dish_name = $booking['dish_name'];
$quantity = $booking['quantity'];
$event_date = $booking['event_date'];
?>
<!DOCTYPE html>
<html lang="hi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment - Ramnatha Catrace-Catering & Event Booking</title>
    <link rel="stylesheet" href="assets/css/payment.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="gradient-bg min-h-screen py-8">
    <div class="container mx-auto px-4 max-w-4xl">
        <!-- Payment Page -->
        <div id="paymentPage">
            <!-- Header -->
            <div class="text-center mb-8">
                <h1 class="text-4xl font-bold text-white mb-2">🍽 Ramnath Caterers-Catering</h1>
                <p class="text-xl text-white opacity-90">& Event Booking</p>
            </div>

            <div class="grid md:grid-cols-2 gap-8">
                <!-- Order Summary -->
                <div class="bg-white rounded-2xl p-6 card-shadow">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-6 flex items-center">
                        📋 Order Summary
                    </h2>
                    
                    <div class="space-y-4 mb-6">
                        <div class="flex justify-between items-center py-3 border-b border-gray-100">
                            <div>
                                <h3 class="font-medium text-gray-800"><?php echo htmlspecialchars($dish_name); ?></h3>
                                <p class="text-sm text-gray-600"><?php echo $quantity; ?> unit(s) • Event Date: <?php echo $event_date; ?></p>
                            </div>
                            <div class="flex items-center">
                                <span class="text-gray-600 mr-1">₹</span>
                                <input type="number" value="<?php echo $total_price; ?>" class="w-24 text-right font-semibold text-gray-800 border border-gray-300 rounded px-2 py-1 focus:ring-2 focus:ring-purple-500 focus:border-transparent" readonly>
                            </div>
                        </div>
                    </div>
                    
                    <div class="border-t-2 border-gray-200 pt-4">
                        <div class="flex justify-between items-center text-xl font-bold text-gray-800">
                            <span>Total Amount:</span>
                            <span class="text-purple-600" id="totalAmount">₹<?php echo number_format($total_price, 2, '.', ','); ?></span>
                        </div>
                    </div>
                </div>

                <!-- Payment Methods -->
                <div class="bg-white rounded-2xl p-6 card-shadow">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-6 flex items-center">
                        💳 Payment Method
                    </h2>
                    
                    <div class="space-y-4 mb-6">
                        <div class="border border-gray-200 rounded-lg p-4 hover:border-purple-500 cursor-pointer transition-colors">
                            <div class="flex items-center">
                                <input type="radio" name="payment" id="upi" class="mr-3 text-purple-600">
                                <label for="upi" class="flex-1 cursor-pointer">
                                    <div class="font-medium text-gray-800">UPI Payment</div>
                                    <div class="text-sm text-gray-600">Pay using PhonePe, GPay, Paytm</div>
                                </label>
                                <span class="text-2xl">📱</span>
                            </div>
                        </div>
                        
                        <div class="border border-gray-200 rounded-lg p-4 hover:border-purple-500 cursor-pointer transition-colors">
                            <div class="flex items-center">
                                <input type="radio" name="payment" id="bank" class="mr-3 text-purple-600">
                                <label for="bank" class="flex-1 cursor-pointer">
                                    <div class="font-medium text-gray-800">Bank Transfer</div>
                                    <div class="text-sm text-gray-600">Direct bank account transfer</div>
                                </label>
                                <span class="text-2xl">🏦</span>
                            </div>
                        </div>
                        
                        <div class="border border-gray-200 rounded-lg p-4 hover:border-purple-500 cursor-pointer transition-colors">
                            <div class="flex items-center">
                                <input type="radio" name="payment" id="cash" class="mr-3 text-purple-600">
                                <label for="cash" class="flex-1 cursor-pointer">
                                    <div class="font-medium text-gray-800">Cash Payment</div>
                                    <div class="text-sm text-gray-600">Pay in cash on event day</div>
                                </label>
                                <span class="text-2xl">💵</span>
                            </div>
                        </div>
                    </div>
                    
                    <button onclick="processPayment()" class="w-full bg-gradient-to-r from-purple-600 to-blue-600 text-white font-semibold py-4 px-6 rounded-xl hover:from-purple-700 hover:to-blue-700 transform hover:scale-105 transition-all duration-200 shadow-lg">
                        💰 Proceed to Payment
                    </button>
                    
                    <p class="text-center text-sm text-gray-600 mt-4">
                        🔒 Secure payment processing • 100% safe & encrypted
                    </p>
                </div>
            </div>

            <!-- Success Message (Initially Hidden) -->
            <div id="successMessage" class="bg-green-50 border border-green-200 rounded-xl p-6 mt-8 text-center hidden">
                <div class="text-6xl mb-4">✅</div>
                <h2 class="text-2xl font-semibold text-green-700 mb-2">Payment Successful!</h2>
                <p class="text-gray-700 mb-2">Your booking has been confirmed.</p>
                <p class="text-gray-700 font-mono" id="bookingId">Booking ID: #RC-XXXX-0000</p>
                <button onclick="window.location.href='bill.php'" class="mt-4 bg-gradient-to-r from-purple-600 to-blue-600 text-white font-semibold py-2 px-6 rounded-xl hover:from-purple-700 hover:to-blue-700 transition-all duration-200 shadow-lg">
                    🧾 View Bill
                </button>
            </div>

        </div>
    </div>

<script>
function generateBookingId() {
    const now = new Date();
    const day = String(now.getDate()).padStart(2,'0');
    const month = String(now.getMonth()+1).padStart(2,'0');
    const year = String(now.getFullYear()).slice(-2);
    const randomNum = Math.floor(1000 + Math.random()*9000);
    return `#RC-${day}${month}${year}-${randomNum}`;
}

function processPayment() {
    const selectedPayment = document.querySelector('input[name="payment"]:checked');
    if(!selectedPayment){ 
        alert('कृपया पहले Payment Method select करें!'); 
        return; 
    }

    const newBookingId = generateBookingId();
    document.getElementById('bookingId').textContent = `Booking ID: ${newBookingId}`;

    // Show success message at the bottom
    document.getElementById('successMessage').classList.remove('hidden');

    // Scroll smoothly to the success message
    document.getElementById('successMessage').scrollIntoView({ behavior: 'smooth' });
}
</script>
</body>
</html>
