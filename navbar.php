<?php
if (session_status() === PHP_SESSION_NONE) {

}
?>

<!-- Google Font for "Red-String" style -->
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700&display=swap" rel="stylesheet">

<style>
/* Navbar styling to match the uploaded example */
.custom-navbar {
  background-color: #b78ca4; /* soft mauve/pink tone */
  padding: 0.7rem 0;
  font-family: 'Great Vibes', cursive; /* matching Red-String font */
}
.custom-navbar .navbar-brand {
  display: flex;
  align-items: center;
  color: #fff;
  font-family: 'Great Vibes', cursive; /* matching website name font */
  font-size: 1.5rem;
  font-weight: 700;
  text-decoration: none;
}
.custom-navbar .navbar-brand img {
  height: 45px;
  margin-right: 10px;

  /* ✅ Make the logo circular */
  width: 45px;
  border-radius: 50%;
  object-fit: cover;
  border: 2px solid #fff; /* optional white border for clean look */
}
.custom-navbar .nav-link {
  color: #fff !important;
  font-weight: 500;
  text-transform: uppercase;
  letter-spacing: 0.2px;
  margin: 0 4px;
  transition: all 0.3s ease;
  font-family: 'Playfair Display', serif; /* navbar button font */
}
.custom-navbar .nav-link:hover {
  color: #f1f1f1 !important;
  text-decoration: underline;
}
.custom-navbar .navbar-nav {
  align-items: center;
}
</style>



<nav class="navbar navbar-expand-lg custom-navbar">
  <div class="container">
    <!-- Left side logo and website name -->
    <a class="navbar-brand" href="index.php">
      <img src="images/logo.png" alt="Logo">
      Vivah
    </a>

    <!-- Mobile toggle -->
    <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Menu items -->
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
        <!-- <li class="nav-item"><a class="nav-link" href="">About Us</a></li> -->
        <li class="nav-item"><a class="nav-link" href="events.php">Events</a></li>
        <!-- <li class="nav-item"><a class="nav-link" href="#">Catering</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Gallery</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Media</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Blog</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Contacts</a></li> -->
        <li class="nav-item"><a class="nav-link" href="locations.php">Location</a></li>
        <li class="nav-item"><a class="nav-link" href="bookings.php">Booking</a></li> 
        <!-- Existing PHP session links -->
        <?php if (isset($_SESSION['username'])): ?>
          <?php if ($_SESSION['role'] == 'admin'): ?>
            <li class="nav-item"><a class="nav-link" href="admin_dashboard.php">Dashboard</a></li>
          <?php else: ?>
            <li class="nav-item"><a class="nav-link" href="user_dashboard.php">Dashboard</a></li>
          <?php endif; ?>
          <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
        <?php else: ?>
          <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
          <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
          
          <li class="nav-item"><a class="nav-link" href="user_dashboard.php">User</a></li> 
          <li class="nav-item"><a class="nav-link" href="admin_dashboard.php">Admin</a></li>  
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
