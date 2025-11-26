<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Contact Us - Ramnath Catrace</title>
<script src="https://cdn.tailwindcss.com"></script>
<style>
body {
    background: #f8f9fa;
    font-family: 'Poppins', sans-serif;
    margin: 0;
    padding: 0;
}
.contact-box {
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    padding: 2rem;
    margin: 40px auto;
    max-width: 800px;
}
.contact-box h1, .contact-box h2 {
    text-align: center;
}
.form-group {
    margin-bottom: 1.2rem;
}
input, textarea {
    width: 100%;
    padding: 0.9rem;
    border: 1px solid #ddd;
    border-radius: 8px;
}
button {
    width: 100%;
    background: #007bff;
    color: white;
    border: none;
    padding: 1rem;
    border-radius: 8px;
    cursor: pointer;
}
button:hover {
    background: #0056b3;
}
.contact-footer {
    text-align: center;
    margin: 20px auto 40px;
    font-size: 0.95rem;
    color: #555;
}
</style>
</head>
<body>

<nav class="bg-white shadow-lg rounded-xl p-4 mb-8 mx-auto max-w-7xl flex justify-between items-center">
    <div class="text-2xl font-bold text-purple-600">Ramnath Caterers-Catering</div>
    <div class="space-x-4">
        <a href="index.php" class="text-gray-700 hover:text-purple-600">Home</a>
        <a href="menu.php" class="text-gray-700 hover:text-purple-600">Menu</a>
        <a href="packages.php" class="text-gray-700 hover:text-purple-600">Packages</a>
        <a href="ourteam.php" class="text-gray-700 hover:text-purple-600">Our Team</a>
        <a href="gallery.php" class="text-gray-700 hover:text-purple-600">Gallery</a>
        <a href="testimonials.php" class="text-gray-700 hover:text-purple-600">Testimonials</a>
        <a href="contact_form.php" class="text-gray-700 hover:text-purple-600 font-semibold">Contact</a>
        <a href="logout.php" class="text-red-600 font-semibold hover:text-red-700">Logout</a>
    </div>
</nav>

<section class="hero text-center bg-blue-600 text-white py-12">
    <h1 class="text-3xl font-bold mb-2">Contact Us</h1>
    <p>We’d love to hear from you! Fill out the form below.</p>
</section>

<div class="contact-box">
    <h1>Contact Form</h1>
    <h2>Send a Message</h2>

<form action="submit_form.php" method="POST">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="message">Message</label>
            <textarea name="message" rows="5" required></textarea>
        </div>

        <div class="form-group">
            <button type="submit">Send Message</button>
        </div>
    </form>
</div>

<footer class="contact-footer">
    <p>Your message will be sent to <strong>sarvaiyadharmik8906@gmail.com</strong></p>
</footer>

<script>
document.querySelector('input[name="name"]').addEventListener('input', function(){
    this.value = this.value.replace(/[^a-zA-Z ]/g, '');
});
</script>

</body>
</html>
