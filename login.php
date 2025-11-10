<?php
include 'navbar.php'; // ✅ Navbar included
include 'db_connect.example.php';
session_start();

$message = "";

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['username'] = $user['username'];

            if ($user['role'] == 'admin') {
                header("Location: admin_dashboard.php");
            } else {
                header("Location: user_dashboard.php");
            }
            exit();
        } else {
            $message = "Invalid password!";
        }
    } else {
        $message = "User not found!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login | Wedding Sutra</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700&family=Great+Vibes&display=swap" rel="stylesheet">

    <style>
        body {
            background: url('images/login-bg.jpg') no-repeat center center/cover;
            font-family: 'Playfair Display', serif;
            color: #333;
            min-height: 100vh;
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* ✅ Fix navbar at top */
        nav.navbar {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 5;
        }

        /* Dark overlay */
        body::before {
            content: "";
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.45);
            z-index: 0;
        }

        .login-container {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 420px;
            background: rgba(255, 255, 255, 0.92);
            border-radius: 20px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
            padding: 40px 35px;
            backdrop-filter: blur(6px);
            margin-top: 100px; /* ✅ Adjust spacing below navbar */
        }

        .login-container h3 {
            font-family: 'Great Vibes', cursive;
            font-size: 2.8rem;
            color: #d63384;
            text-align: center;
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: 600;
            font-size: 1rem;
            color: #444;
        }

        .form-control {
            border-radius: 10px;
            padding: 10px;
            font-size: 1rem;
        }

        .btn-success {
            background-color: #d63384;
            border: none;
            border-radius: 10px;
            padding: 10px;
            font-weight: 600;
            font-size: 1.1rem;
            transition: 0.3s;
        }

        .btn-success:hover {
            background-color: #b82e6f;
            transform: scale(1.03);
        }

        .login-container a {
            color: #d63384;
            text-decoration: none;
            font-weight: 500;
        }

        .login-container a:hover {
            text-decoration: underline;
        }

        .text-danger {
            color: #c2185b !important;
            font-size: 0.95rem;
        }

        .mt-3 {
            text-align: center;
        }
    </style>
</head>

<body>

    <!-- ✅ Navbar stays fixed on top (already included above) -->

    <div class="login-container">
        <h3>Login</h3>
        <p class="text-center text-danger"><?= $message ?></p>

        <form method="POST">
            <div class="mb-3 text-start">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
            </div>
            <div class="mb-3 text-start">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
            </div>
            <button type="submit" name="login" class="btn btn-success w-100">Login</button>
            <p class="mt-3">Don't have an account? <a href="register.php">Register here</a></p>
        </form>
    </div>

</body>
</html>
