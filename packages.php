<?php
include 'includes/db.php';
session_start();
?>
<!DOCTYPE html>
<html lang="hi">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Catering Packages - Ramnatha Catrace-Catering & Event Booking</title>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="assets/css/packages.css">
</head>
<body class="gradient-bg min-h-screen py-8">

<!-- Nav Bar -->
<nav class="bg-white shadow-lg rounded-xl p-4 mb-8 mx-auto max-w-7xl flex justify-between items-center">
    <div class="text-2xl font-bold text-purple-600">Ramnath Caterers-Catering</div>
    <div class="space-x-4">
        <a href="index.php" class="text-gray-700 hover:text-purple-600">Home</a>
        <a href="menu.php" class="text-gray-700 hover:text-purple-600">Menu</a>
        <a href="packages.php" class="text-gray-700 hover:text-purple-600">Packages</a>
        <a href="ourteam.php" class="text-gray-700 hover:text-purple-600">Our Team</a>
        <a href="gallery.php" class="text-gray-700 hover:text-purple-600">Gallery</a>
        <a href="testimonials.php" class="text-gray-700 hover:text-purple-600">Testimonials</a>
        <a href="contact_form.php" class="text-gray-700 hover:text-purple-600">Contact</a>
        <a href="logout.php" class="text-red-600 font-semibold hover:text-red-700">Logout</a>
    </div>
</nav>

<div class="container mx-auto px-4 max-w-7xl">

<!-- Header -->
<div class="text-center mb-12">
    <h1 class="text-5xl font-bold text-white mb-4">🍽️ Ramnatha Catrace-Catering</h1>
    <p class="text-2xl text-white opacity-90 mb-2">& Event Booking</p>
    <p class="text-lg text-white opacity-80">Choose Your Perfect Catering Package</p>
</div>

<!-- Packages Section -->
<div id="packagesPage">
    <div class="grid lg:grid-cols-3 md:grid-cols-2 gap-8 mb-12">

        <!-- Basic Package -->
        <div class="package-card bg-white rounded-3xl p-8 card-shadow relative">
            <div class="text-center mb-6">
                <div class="text-4xl mb-4">🥘</div>
                <h3 class="text-2xl font-bold text-gray-800 mb-2">Basic Package</h3>
                <p class="text-gray-600">Perfect for Small Events</p>
                <div class="mt-4">
                    <span class="text-3xl font-bold text-blue-600">₹18,000</span>
                    <span class="text-gray-500"> / 50-100 guests</span>
                </div>
            </div>
            <div class="space-y-3 mb-8">
                <div class="flex items-center"><span class="text-green-500 mr-3">✅</span><span class="text-gray-700">Traditional Indian Menu (4 items)</span></div>
                <div class="flex items-center"><span class="text-green-500 mr-3">✅</span><span class="text-gray-700">Rice & Roti/Naan</span></div>
                <div class="flex items-center"><span class="text-green-500 mr-3">✅</span><span class="text-gray-700">Basic Service Staff</span></div>
                <div class="flex items-center"><span class="text-green-500 mr-3">✅</span><span class="text-gray-700">Disposable Plates & Cutlery</span></div>
                <div class="flex items-center"><span class="text-green-500 mr-3">✅</span><span class="text-gray-700">Sweet Dish</span></div>
                <div class="flex items-center"><span class="text-red-500 mr-3">❌</span><span class="text-gray-400">Decoration</span></div>
                <div class="flex items-center"><span class="text-red-500 mr-3">❌</span><span class="text-gray-400">Live Counters</span></div>
            </div>
            <a href="book.php?package_name=Basic%20Package&price=18000" class="w-full inline-block bg-blue-600 text-white font-semibold py-3 px-6 rounded-xl hover:bg-blue-700 transform hover:scale-105 transition-all duration-200 text-center">Book Basic Package</a>
        </div>

        <!-- Premium Package -->
        <div class="package-card bg-white rounded-3xl p-8 card-shadow relative border-4 border-purple-500">
            <div class="absolute -top-4 left-1/2 transform -translate-x-1/2">
                <span class="bg-purple-500 text-white px-4 py-2 rounded-full text-sm font-semibold">Most Popular</span>
            </div>
            <div class="text-center mb-6">
                <div class="text-4xl mb-4">🍛</div>
                <h3 class="text-2xl font-bold text-gray-800 mb-2">Premium Package</h3>
                <p class="text-gray-600">Ideal for Medium Events</p>
                <div class="mt-4">
                    <span class="text-3xl font-bold text-purple-600">₹45,000</span>
                    <span class="text-gray-500"> / 100-200 guests</span>
                </div>
            </div>
            <div class="space-y-3 mb-8">
                <div class="flex items-center"><span class="text-green-500 mr-3">✅</span><span class="text-gray-700">Extended Menu (7 items)</span></div>
                <div class="flex items-center"><span class="text-green-500 mr-3">✅</span><span class="text-gray-700">Rice, Roti & Special Breads</span></div>
                <div class="flex items-center"><span class="text-green-500 mr-3">✅</span><span class="text-gray-700">Professional Service Staff</span></div>
                <div class="flex items-center"><span class="text-green-500 mr-3">✅</span><span class="text-gray-700">Steel Plates & Cutlery</span></div>
                <div class="flex items-center"><span class="text-green-500 mr-3">✅</span><span class="text-gray-700">Multiple Sweet Dishes</span></div>
                <div class="flex items-center"><span class="text-green-500 mr-3">✅</span><span class="text-gray-700">Basic Decoration</span></div>
                <div class="flex items-center"><span class="text-green-500 mr-3">✅</span><span class="text-gray-700">Welcome Drinks</span></div>
            </div>
            <a href="book.php?package_name=Premium%20Package&price=45000" class="w-full inline-block bg-purple-600 text-white font-semibold py-3 px-6 rounded-xl hover:bg-purple-700 transform hover:scale-105 transition-all duration-200 text-center">Book Premium Package</a>
        </div>

        <!-- Luxury Package -->
        <div class="package-card bg-white rounded-3xl p-8 card-shadow relative">
            <div class="text-center mb-6">
                <div class="text-4xl mb-4">👑</div>
                <h3 class="text-2xl font-bold text-gray-800 mb-2">Luxury Package</h3>
                <p class="text-gray-600">Ultimate for Large Events</p>
                <div class="mt-4">
                    <span class="text-3xl font-bold text-yellow-600">₹85,000</span>
                    <span class="text-gray-500"> / 200+ guests</span>
                </div>
            </div>
            <div class="space-y-3 mb-8">
                <div class="flex items-center"><span class="text-green-500 mr-3">✅</span><span class="text-gray-700">Premium Menu (10+ items)</span></div>
                <div class="flex items-center"><span class="text-green-500 mr-3">✅</span><span class="text-gray-700">Live Cooking Stations</span></div>
                <div class="flex items-center"><span class="text-green-500 mr-3">✅</span><span class="text-gray-700">Expert Chef Team</span></div>
                <div class="flex items-center"><span class="text-green-500 mr-3">✅</span><span class="text-gray-700">Premium Crockery & Cutlery</span></div>
                <div class="flex items-center"><span class="text-green-500 mr-3">✅</span><span class="text-gray-700">Dessert Counter</span></div>
                <div class="flex items-center"><span class="text-green-500 mr-3">✅</span><span class="text-gray-700">Full Event Decoration</span></div>
                <div class="flex items-center"><span class="text-green-500 mr-3">✅</span><span class="text-gray-700">Photography Support</span></div>
            </div>
            <a href="book.php?package_name=Luxury%20Package&price=85000" class="w-full inline-block bg-gradient-to-r from-yellow-500 to-orange-500 text-white font-semibold py-3 px-6 rounded-xl hover:from-yellow-600 hover:to-orange-600 transform hover:scale-105 transition-all duration-200 text-center">Book Luxury Package</a>
        </div>

    </div> <!-- End Grid -->
</div> <!-- End Packages Page -->

</div>
<script src="assets/js/package-script.js"></script>
</body>
</html>