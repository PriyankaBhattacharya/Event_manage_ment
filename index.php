<?php include('navbar.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vivah | Home</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700&family=Great+Vibes&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Playfair Display', serif;
      overflow-x: hidden;
    }

    /* ===== Hero Section ===== */
    .hero {
      background: url('images/main.jpg') no-repeat center center/cover;
      height: 100vh;
      position: relative;
      display: flex;
      justify-content: center;
      align-items: center;
      color: white;
      text-align: center;
    }

    .hero::before {
      content: "";
      position: absolute;
      inset: 0;
      background: rgba(0, 0, 0, 0.45);
      z-index: 1;
    }

    .hero-content {
      position: relative;
      z-index: 2;
    }

    .hero-content h1 {
      font-size: 8rem; /* 🔥 Made Bigger */
      font-weight: 700;
      letter-spacing: 4px;
      text-shadow: 3px 3px 10px rgba(0,0,0,0.7);
      color: #fff;
      font-family: 'Great Vibes', cursive; /* Elegant touch */
    }

    .hero-content h5 {
      font-family: 'Playfair Display', serif;
      font-size: 1.6rem;
      margin-bottom: 0.5rem;
      color: #f8f9fa;
    }

    /* ===== Event Section ===== */
    .event-section {
      display: flex;
      flex-wrap: wrap;
      margin: 0;
    }

    .event-box {
      flex: 1;
      position: relative;
      height: 60vh;
      min-width: 300px;
      background-size: cover;
      background-position: center;
      overflow: hidden;
    }

    .event-overlay {
      position: absolute;
      inset: 0;
      background: rgba(0, 0, 0, 0.45);
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      color: #fff;
      text-align: center;
      transition: 0.4s;
    }

    .event-overlay:hover {
      background: rgba(0, 0, 0, 0.6);
      transform: scale(1.02);
    }

    .event-overlay h3 {
      font-size: 2rem;
      font-weight: 700;
      letter-spacing: 2px;
    }

    .event-overlay p {
      font-family: 'Great Vibes', cursive;
      font-size: 1.3rem;
    }
  </style>
</head>

<body>

  <!-- Hero Section -->
  <section class="hero">
    <div class="hero-content">
      <h5>Welcome To</h5>
      <h1>Vivah</h1> <!-- 💎 Main Text Enlarged -->
      <h5>Elegant • Timeless • Memorable</h5>
      <h5>Making Every Event Magical</h5>
      <h5>Weave A Perfect Dream</h5>
    </div>
  </section>

  <!-- Ceremony / Wedding / Honeymoon Section -->
  <section class="event-section">
    <div class="event-box" style="background-image: url('images/ceremony.jpg');">
      <div class="event-overlay">
        <h3>CEREMONY</h3>
        <p>PLANNING</p>
      </div>
    </div>

    <div class="event-box" style="background-image: url('images/wedding.jpg');">
      <div class="event-overlay">
        <h3>WEDDINGS</h3>
        <p>LOCATIONS</p>
      </div>
    </div>

    <div class="event-box" style="background-image: url('images/honeymoon.jpg');">
      <div class="event-overlay">
        <h3>HONEYMOON</h3>
        <p>DESTINATIONS</p>
      </div>
    </div>
  </section>

  <!-- About Us Section -->
  <section id="about" 
           style="background: url('images/about-bg.jpg') center/cover no-repeat fixed; 
                  position: relative; 
                  padding: 120px 0;">

    <div style="background: rgba(0, 0, 0, 0.2); position: absolute; inset: 0;"></div>

    <div class="container position-relative" style="z-index: 2;">
      <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
          <div class="p-5 bg-white bg-opacity-90 shadow-lg rounded-4 text-center">
            <h2 class="fw-bold mb-2" style="font-family: 'Playfair Display', serif; color:#343a40;">
              About Us
            </h2>
            <h5 class="text-muted mb-4" style="font-family: 'Great Vibes', cursive;">SINCE 2011</h5>
            <div style="font-size: 1.5rem; color:#d4af37;">&#10070;</div>

            <p class="mt-4" style="font-size: 1rem; color:#555; line-height: 1.9;">
              Vivah started in the year <strong>2025</strong>. Priyanka Bhattacharya — a dreamer — planned to pursue the life of a wedding planner 
              and founded <strong>Vivah</strong> with A, one of her first employees.
            </p>

            <p style="font-size: 1rem; color:#555; line-height: 1.9;">
              <em>“Vivah is the best wedding planner in Kolkata.”</em> The Kolkata-based wedding planners provide 
              a one-stop solution for wedding-related events across India. 
              Our team brings equal style and detail to every event — from décor and consulting 
              to coordinating every moment from the first dance to the last goodbye.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
