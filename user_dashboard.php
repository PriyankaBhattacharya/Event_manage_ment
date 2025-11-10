<?php
include 'navbar.php';
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'user') {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Dashboard | Wedding Sutra</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #fce4ec, #f8bbd0);
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            color: #333;
        }

        /* Keep your navbar exactly as it is */
        .navbar {
            box-shadow: 0 4px 15px rgba(0,0,0,0.15);
        }

        /* Dashboard section starts just below navbar */
        .dashboard-container {
            max-width: 1100px;
            margin: 120px auto 60px; /* space below navbar */
            background: rgba(255,255,255,0.9);
            border-radius: 20px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
            padding: 50px;
            backdrop-filter: blur(8px);
        }

        h2 {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            color: #d63384;
            text-align: center;
            margin-bottom: 20px;
        }

        p {
            text-align: center;
            font-size: 1.1rem;
            color: #555;
        }

        /* Dashboard cards */
        .dashboard-options {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 25px;
            margin-top: 40px;
        }

        .option-card {
            background: white;
            border-radius: 15px;
            text-align: center;
            padding: 30px 20px;
            box-shadow: 0 6px 15px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .option-card:hover {
            transform: translateY(-7px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }

        .option-card h5 {
            color: #d63384;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .option-card p {
            color: #666;
            font-size: 0.95rem;
        }

        .option-card a {
            display: inline-block;
            margin-top: 10px;
            padding: 8px 18px;
            border-radius: 8px;
            background-color: #d63384;
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: 0.3s;
        }

        .option-card a:hover {
            background-color: #b82e6f;
        }
    </style>
</head>
<body>

<!-- 🔹 Your existing navbar stays untouched -->
<nav class="navbar navbar-dark bg-primary">
    <div class="container">
        <span class="navbar-text text-white fs-5">Welcome, <?= $_SESSION['username'] ?></span>
        <a href="logout.php" class="btn btn-light">Logout</a>
    </div>
</nav>

<!-- 🔹 Beautiful Dashboard Section -->
<div class="dashboard-container">
    <h2>User Dashboard</h2>
    <p>Welcome to your personal event hub! Browse, plan, and manage your bookings effortlessly.</p>

    <div class="dashboard-options">
        <div class="option-card">
            <h5>🎉 Browse Events</h5>
            <p>Explore wedding, ceremony, and honeymoon packages crafted for you.</p>
            <a href="events.php">View Events</a>
        </div>

        <div class="option-card">
            <h5>📝 My Bookings</h5>
            <p>Check your active and completed event registrations.</p>
            <a href="mybookings.php">View Bookings</a>
        </div>

        <div class="option-card">
            <h5>💌 Contact Planner</h5>
            <p>Get personalized help from our expert event planners.</p>
            <a href="contact.php">Contact Us</a>
        </div>

        <div class="option-card">
            <h5>📍 Locations</h5>
            <p>Discover breathtaking destinations for your dream celebration.</p>
            <a href="locations.php">Explore Locations</a>
        </div>
    </div>
</div>

</body>
</html>
