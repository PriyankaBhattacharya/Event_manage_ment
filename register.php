<?php
include 'db_connect.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>

    <!-- ✅ Move Google Font and Navbar CSS here -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700&family=Great+Vibes&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    /* Include navbar style from navbar.php */
    .custom-navbar {
      background-color: #b78ca4;
      padding: 0.7rem 0;
      font-family: 'Great Vibes', cursive;
    }
    .custom-navbar .navbar-brand {
      display: flex;
      align-items: center;
      color: #fff;
      font-family: 'Playfair Display', serif;
      font-size: 1.5rem;
      font-weight: 700;
      text-decoration: none;
    }
    .custom-navbar .navbar-brand img {
      height: 45px;
      margin-right: 10px;
      border-radius: 50%;
    }
    .custom-navbar .nav-link {
      color: #fff !important;
      font-weight: 500;
      text-transform: uppercase;
      letter-spacing: 0.2px;
      margin: 0 4px;
      transition: all 0.3s ease;
      font-family: 'Playfair Display', serif;
    }
    .custom-navbar .nav-link:hover {
      color: #f1f1f1 !important;
      text-decoration: underline;
    }
    .custom-navbar .navbar-nav {
      align-items: center;
    }

    /* Existing page style */
    body {
        background: url('images/register-bg.jpg') no-repeat center center/cover;
        font-family: 'Poppins', sans-serif;
    }
    .register-container {
        max-width: 500px;
        margin: 120px auto;
        background: rgba(255, 255, 255, 0.9);
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 8px 30px rgba(0,0,0,0.1);
    }
    h3 {
        text-align: center;
        color: #d63384;
        font-weight: 700;
    }
    .btn-register {
        background-color: #d63384;
        border: none;
        width: 100%;
        padding: 10px;
        color: white;
        border-radius: 10px;
        font-weight: 600;
    }
    .btn-register:hover {
        background-color: #c2185b;
    }
    .form-control {
        border-radius: 10px;
        padding: 6px 10px;
        font-size: 0.95rem;
    }
    .login-text {
        text-align: center;
        margin-top: 15px;
    }
    </style>
</head>
<body>

<?php include 'navbar.php'; ?>

<?php
$message = "";
$admin_secret_code = "knobolbo!";

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];
    $event_type = $_POST['event_type'] ?? null;
    $location = $_POST['location'] ?? null;
    $admin_code = $_POST['admin_code'] ?? "";

    $check = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $check_result = $check->get_result();

    if ($check_result->num_rows > 0) {
        $message = "❌ Email already registered!";
    } else {
        if ($role == 'admin' && $admin_code !== $admin_secret_code) {
            $message = "❌ Invalid admin secret code!";
        } else {
            $sql = "INSERT INTO users (username, email, password, role, event_type, location) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssss", $username, $email, $password, $role, $event_type, $location);
            if ($stmt->execute()) {
                $message = "✅ Registration successful! <a href='login.php'>Login now</a>";
            } else {
                $message = "❌ Error: " . $stmt->error;
            }
        }
    }
}
?>

<div class="register-container">
    <h3>Register</h3>
    <p class="text-center text-danger"><?= $message ?></p>

    <form method="POST">
        <div class="mb-3 text-start">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control" required>
        </div>

        <div class="mb-3 text-start">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3 text-start">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="mb-3 text-start">
            <label class="form-label">Role</label>
            <select name="role" id="roleSelect" class="form-control" required>
                <option value="">Select Role</option>
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
        </div>

        <div id="userFields" style="display: none;">
            <div class="mb-3 text-start">
                <label class="form-label">Event Type</label>
                <select name="event_type" class="form-control">
                    <option value="wedding">Wedding</option>
                    <option value="ceremony">Ceremony</option>
                    <option value="honeymoon">Honeymoon</option>
                </select>
            </div>

            <div class="mb-3 text-start">
                <label class="form-label">Preferred Location</label>
                <select name="location" class="form-control">
                    <option value="kolkata">Kolkata</option>
                    <option value="darjeeling">Darjeeling</option>
                    <option value="sikkim">Sikkim</option>
                    <option value="us">US</option>
                    <option value="maldives">Maldives</option>
                    <option value="canada">Canada</option>
                </select>
            </div>
        </div>

        <div id="adminField" style="display: none;">
            <div class="mb-3 text-start">
                <label class="form-label">Enter Admin Secret Code</label>
                <input type="password" name="admin_code" class="form-control" placeholder="Enter secret code">
            </div>
        </div>

        <button type="submit" name="register" class="btn-register">Register</button>
    </form>

    <div class="login-text">
        Already have an account? <a href="login.php">Login here</a>
    </div>
</div>

<script>
const roleSelect = document.getElementById('roleSelect');
const userFields = document.getElementById('userFields');
const adminField = document.getElementById('adminField');

roleSelect.addEventListener('change', function() {
    if (this.value === 'user') {
        userFields.style.display = 'block';
        adminField.style.display = 'none';
    } else if (this.value === 'admin') {
        userFields.style.display = 'none';
        adminField.style.display = 'block';
    } else {
        userFields.style.display = 'none';
        adminField.style.display = 'none';
    }
});
</script>

</body>
</html>
