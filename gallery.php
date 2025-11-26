<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Gallery - Ramnatha Catrace Catering</title>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="assets/css/gallery.css">
</head>
<body class="bg-gray-900 min-h-screen">

<!-- Nav Bar -->
<nav class="bg-white shadow-lg rounded-xl p-4 mb-8 mx-auto max-w-7xl flex justify-between items-center">
    <div class="text-2xl font-bold text-purple-600">Ramnath Caterers-Catering</div>
    <div class="space-x-4">
        <a href="index.php" class="text-gray-700 hover:text-purple-600">Home</a>
        <a href="menu.php" class="text-gray-700 hover:text-purple-600">Menu</a>
        <a href="packages.php" class="text-gray-700 hover:text-purple-600">Packages</a>
        <a href="ourteam.php" class="text-gray-700 hover:text-purple-600">Our Team</a>
        <a href="gallery.php" class="text-gray-700 hover:text-purple-600">Gallery</a>
        <a href="contact_form.php" class="text-gray-700 hover:text-purple-600">Contact</a>
        <a href="testimonials.php" class="text-gray-700 hover:text-purple-600">Testimonials</a>
        <a href="logout.php" class="text-red-600 font-semibold hover:text-red-600">Logout</a>
    </div>
</nav>

<h1 class="text-4xl font-bold text-white mt-6 text-center">Our Gallery</h1>
<p class="text-white opacity-80 mb-6 text-center">Memories we’ve created with our amazing events</p>

<div class="max-w-6xl mx-auto px-4">
    <!-- Grid layout: 3 items per row -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">

        <div class="gallery-card bg-white rounded-lg shadow-lg overflow-hidden">
            <img src="assets/images/wedding_event.jpg" alt="Event 1" class="w-full h-48 object-cover">
            <div class="p-3 font-semibold text-gray-800">Wedding Event</div>
        </div>

        <div class="gallery-card bg-white rounded-lg shadow-lg overflow-hidden">
            <img src="assets/images/birthday_party.jpg" alt="Event 2" class="w-full h-48 object-cover">
            <div class="p-3 font-semibold text-gray-800">Birthday Party</div>
        </div>

        <div class="gallery-card bg-white rounded-lg shadow-lg overflow-hidden">
            <img src="assets/images/corporate_event.jpeg" alt="Event 3" class="w-full h-48 object-cover">
            <div class="p-3 font-semibold text-gray-800">Corporate Event</div>
        </div>

        <div class="gallery-card bg-white rounded-lg shadow-lg overflow-hidden">
            <img src="assets/images/reception_night.jpg" alt="Event 4" class="w-full h-48 object-cover">
            <div class="p-3 font-semibold text-gray-800">Reception Night</div>
        </div>

        <div class="gallery-card bg-white rounded-lg shadow-lg overflow-hidden">
            <img src="assets/images/outdoor_catering.jpeg" alt="Event 5" class="w-full h-48 object-cover">
            <div class="p-3 font-semibold text-gray-800">Outdoor Catering</div>
        </div>

        <div class="gallery-card bg-white rounded-lg shadow-lg overflow-hidden">
            <img src="assets/images/engagement_ceremony.jpeg" alt="Event 6" class="w-full h-48 object-cover">
            <div class="p-3 font-semibold text-gray-800">Engagement Ceremony</div>
        </div>

        <div class="gallery-card bg-white rounded-lg shadow-lg overflow-hidden">
            <img src="assets/images/Anniversary_Celebration.jpg" alt="Event 7" class="w-full h-48 object-cover">
            <div class="p-3 font-semibold text-gray-800">Anniversary Celebration</div>
        </div>

        <div class="gallery-card bg-white rounded-lg shadow-lg overflow-hidden">
            <img src="assets/images/Baby_Shower.jpg" alt="Event 8" class="w-full h-48 object-cover">
            <div class="p-3 font-semibold text-gray-800">Baby Shower</div>
        </div>

        <div class="gallery-card bg-white rounded-lg shadow-lg overflow-hidden">
            <img src="assets/images/Haldi_Mehndi_Function.jpg" alt="Event 9" class="w-full h-48 object-cover">
            <div class="p-3 font-semibold text-gray-800">Haldi Mehndi Function</div>
        </div>

        <div class="gallery-card bg-white rounded-lg shadow-lg overflow-hidden">
            <img src="assets/images/Sangeet_Night.jpeg" alt="Event 10" class="w-full h-48 object-cover">
            <div class="p-3 font-semibold text-gray-800">Sangeet Night</div>
        </div>

        <div class="gallery-card bg-white rounded-lg shadow-lg overflow-hidden">
            <img src="assets/images/College_Fest.jpg" alt="Event 11" class="w-full h-48 object-cover">
            <div class="p-3 font-semibold text-gray-800">College Fest</div>
        </div>

        <div class="gallery-card bg-white rounded-lg shadow-lg overflow-hidden">
            <img src="assets/images/Award_Ceremony.jpg" alt="Event 12" class="w-full h-48 object-cover">
            <div class="p-3 font-semibold text-gray-800">Award Ceremony</div>
        </div>

    </div>
</div>

<script src="assets/js/gallery.js"></script>

</body>
</html>
