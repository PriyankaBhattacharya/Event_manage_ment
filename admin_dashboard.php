<?php
include 'navbar.php';
include 'db_connect.example.php';
session_start();

// ✅ Security Check
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

// ✅ Fetch Users
$user_sql = "SELECT id, username, email, role FROM users ORDER BY id DESC";
$user_result = $conn->query($user_sql);

// ✅ Fetch Bookings
$booking_sql = "
    SELECT b.id, u.username, b.event_type, b.location, b.event_date 
    FROM booking b 
    JOIN users u ON b.user_id = u.id 
    ORDER BY b.id DESC
";
$booking_result = $conn->query($booking_sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Dashboard | Wedding Sutra</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Playfair+Display:wght@600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #fce4ec, #f8bbd0);
            margin: 0;
            padding: 0;
        }

        nav.navbar {
            position: relative;
            z-index: 10;
        }

        .dashboard-container {
            padding: 60px 20px;
        }

        h2 {
            font-family: 'Playfair Display', serif;
            color: #c2185b;
            font-weight: 600;
            margin-bottom: 30px;
            text-align: center;
        }

        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 6px 25px rgba(0, 0, 0, 0.1);
            transition: 0.3s ease;
            background: #fff;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }

        .card-body h5 {
            color: #d63384;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .card-body p {
            color: #555;
            font-size: 0.95rem;
        }

        .table-container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            padding: 25px;
            margin-top: 40px;
            box-shadow: 0 6px 25px rgba(0, 0, 0, 0.1);
        }

        table th {
            background: #d63384;
            color: white;
        }

        .btn-action {
            border-radius: 8px;
            font-size: 0.9rem;
            padding: 5px 12px;
        }

        footer {
            text-align: center;
            padding: 20px 0;
            color: #444;
            background: #f8f9fa;
            margin-top: 50px;
            border-top: 1px solid #ddd;
        }
    </style>
</head>

<body>
    <!-- Navbar (Unchanged as requested) -->
    <nav class="navbar navbar-dark bg-dark">
        <div class="container d-flex justify-content-between align-items-center">
            <span class="navbar-text text-white fs-5">
                Welcome, <?= $_SESSION['username'] ?> (Admin)
            </span>
            <a href="logout.php" class="btn btn-danger">Logout</a>
        </div>
    </nav>

    <!-- Dashboard Content -->
    <div class="container dashboard-container">
        <h2>Admin Dashboard</h2>
        <p class="text-center text-secondary mb-5">Real-time overview of your users and event bookings.</p>

        <!-- Dashboard Cards -->
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card text-center p-3">
                    <div class="card-body">
                        <h5>📅 Manage Events</h5>
                        <p>Create, update, and delete event listings and packages.</p>
                        <a href="manage_events.php" class="btn btn-outline-danger btn-action">Go to Events</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-center p-3">
                    <div class="card-body">
                        <h5>👥 View Users</h5>
                        <p>See registered users and manage their access levels.</p>
                        <a href="view_users.php" class="btn btn-outline-danger btn-action">View Users</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-center p-3">
                    <div class="card-body">
                        <h5>📊 Bookings</h5>
                        <p>Track all event bookings and confirm their status.</p>
                        <a href="manage_bookings.php" class="btn btn-outline-danger btn-action">Manage Bookings</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- ✅ Real-Time User List -->
        <div class="table-container">
            <h4 class="mb-4 text-center text-dark">Registered Users</h4>
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($user_result->num_rows > 0) {
                            $i = 1;
                            while ($user = $user_result->fetch_assoc()) {
                                echo "<tr>
                                    <td>{$i}</td>
                                    <td>{$user['username']}</td>
                                    <td>{$user['email']}</td>
                                    <td><span class='badge bg-" . ($user['role'] == 'admin' ? 'danger' : 'success') . "'>{$user['role']}</span></td>
                                </tr>";
                                $i++;
                            }
                        } else {
                            echo "<tr><td colspan='4' class='text-center text-muted'>No users found.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- ✅ Real-Time Booking Details -->
        <div class="table-container">
            <h4 class="mb-4 text-center text-dark">Event Bookings</h4>
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>User</th>
                            <th>Event Type</th>
                            <th>Location</th>
                            <th>Event Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($booking_result->num_rows > 0) {
                            $i = 1;
                            while ($book = $booking_result->fetch_assoc()) {
                                echo "<tr>
                                    <td>{$i}</td>
                                    <td>{$book['username']}</td>
                                    <td>{$book['event_type']}</td>
                                    <td>{$book['location']}</td>
                                    <td>{$book['event_date']}</td>
                                </tr>";
                                $i++;
                            }
                        } else {
                            echo "<tr><td colspan='5' class='text-center text-muted'>No bookings found.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <footer>
        © 2025 Wedding Sutra | Admin Panel
    </footer>
</body>
</html>
