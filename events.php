<?php include('navbar.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Our Events | Wedding Sutra</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700&family=Great+Vibes&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Playfair Display', serif;
      background-color: #f9f9f9;
    }

    .event-section {
      padding: 80px 20;
    }

    .event {
      display: flex;
      flex-wrap: wrap;
      align-items: center;
      margin-bottom: 100px;
    }

    .event img {
      width: 100%;
      border-radius: 25px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.2);
    }

    .event-content {
      padding: 50px;
    }

    .event h2 {
      font-family: 'Great Vibes', cursive;
      color: #d63384;
      font-size: 2.5rem;
      margin-bottom: 15px;
    }

    .event p {
      color: #555;
      line-height: 1.8;
    }

    .book-btn {
      margin-top: 20px;
      background-color: #d63384;
      color: white;
      padding: 10px 25px;
      border-radius: 10px;
      text-decoration: none;
      font-weight: 600;
      transition: background 0.3s;
    }

    .book-btn:hover {
      background-color: #b31c6b;
      color: #fff;
    }

    .bg-section {
      background: url('images/event-bg.jpg') no-repeat center center/cover;
      background-attachment: fixed;
      padding: 120px 0;
      color: white;
      text-align: center;
      position: relative;
    }

    .bg-section::before {
      content: "";
      position: absolute;
      inset: 0;
      background: rgba(0, 0, 0, 0.45);
    }

    .bg-section h1 {
      position: relative;
      z-index: 2;
      font-size: 3rem;
      font-weight: 700;
      font-family: 'Playfair Display', serif;
    }
  </style>
</head>

<body>

  <!-- Hero Section -->
  <div class="bg-section">
    <h1>Our Special Events</h1>
  </div>

  <!-- Events -->
  <section class="event-section container">

    <!-- Ceremony -->
    <div class="event">
      <div class="col-md-6">
        <img src="images/ceremony.jpg" alt="Ceremony">
      </div>
      <div class="col-md-6 event-content">
        <h2>Ceremony</h2>
        <p>
          Every ceremony is a beautiful beginning — a blend of traditions, laughter, and love.  
          From décor to music, we craft your perfect start to forever.
        </p>
        <a href="register.php" class="book-btn">Book Now</a>
      </div>
    </div>

    <!-- Wedding -->
    <div class="event flex-row-reverse">
      <div class="col-md-6">
        <img src="images/wedding.jpg" alt="Wedding">
      </div>
      <div class="col-md-6 event-content">
        <h2>Wedding</h2>
        <p>
          The moment you say "I do" deserves the most enchanting setting.  
          We design unforgettable weddings filled with beauty, joy, and elegance.
        </p>
        <a href="register.php" class="book-btn">Book Now</a>
      </div>
    </div>

    <!-- Honeymoon -->
    <div class="event">
      <div class="col-md-6">
        <img src="images/honeymoon.jpg" alt="Honeymoon">
      </div>
      <div class="col-md-6 event-content">
        <h2>Honeymoon</h2>
        <p>
          Celebrate your love in a dreamy escape — from the Maldives to the Darjeeling mountains.  
          Let us plan the perfect honeymoon just for you.
        </p>
        <a href="register.php" class="book-btn">Book Now</a>
      </div>
    </div>

  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
