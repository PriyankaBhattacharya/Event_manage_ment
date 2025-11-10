<?php
include 'navbar.php';
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contact Planner | Wedding Sutra</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: linear-gradient(135deg,#f8bbd0,#fff0f6); font-family: 'Poppins', sans-serif; }
        .contact-container {
            margin: 120px auto;
            max-width: 700px;
            background: #fff;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }
        h2 { text-align: center; color: #d63384; margin-bottom: 30px; }
        .btn-primary { background-color: #d63384; border: none; }
        .btn-primary:hover { background-color: #b82e6f; }
    </style>
</head>
<body>
<div class="contact-container">
    <h2>Contact Your Event Planner</h2>
    <form method="POST" action="#">
        <div class="mb-3">
            <label class="form-label">Your Name</label>
            <input type="text" class="form-control" placeholder="Enter your name" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Your Email</label>
            <input type="email" class="form-control" placeholder="Enter your email" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Message</label>
            <textarea class="form-control" rows="4" placeholder="Tell us your dream plan..." required></textarea>
        </div>
        <button type="submit" class="btn btn-primary w-100">Send Message</button>
    </form>
</div>
</body>
</html>
