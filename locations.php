<?php include('navbar.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Wedding Sutra | Locations</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700&family=Great+Vibes&display=swap" rel="stylesheet">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

  <style>
    body {
      font-family: 'Playfair Display', serif;
      background-color: #fff;
      color: #222;
      margin: 0;
      overflow-x: hidden;
    }

    /* Hero */
    .hero-section {
      background: url('images/locations-bg.jpg') center/cover no-repeat;
      height: 80vh;
      display: flex;
      justify-content: center;
      align-items: center;
      color: white;
      text-align: center;
      position: relative;
    }
    .hero-section::before {
      content: "";
      position: absolute;
      inset: 0;
      background: rgba(0,0,0,0.4);
    }
    .hero-section h1 {
      position: relative;
      z-index: 1;
      font-size: 3.5rem;
      font-weight: 700;
      letter-spacing: 2px;
      text-transform: uppercase;
    }

    /* Section Title */
    .section-title {
      text-align: center;
      margin: 10px 0 40px;
    }
    .section-title h2 {
      font-size: 3rem;
      color: #d63384;
      font-weight: 700;
    }
    .section-title p {
      font-family: 'Great Vibes', cursive;
      font-size: 1.8rem;
      color: #555;
      margin-top: -10px;
    }

    /* Horizontal section layout */
    .location-row {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      align-items: stretch;
      width: 100%;
    }

    .location-card {
      position: relative;
      flex: 1 1 33.333%;
      height: 90vh;
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
      color: #fff;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      overflow: hidden;
      transition: transform 0.4s ease, box-shadow 0.4s ease;
    }

    .location-card::before {
      content: "";
      position: absolute;
      inset: 0;
      background: rgba(0,0,0,0.55);
      z-index: 1;
      transition: background 0.3s ease;
    }

    .location-card:hover::before {
      background: rgba(0,0,0,0.65);
    }

    .location-card:hover {
      transform: scale(1.02);
      box-shadow: 0 10px 25px rgba(0,0,0,0.3);
    }

    .location-content {
      position: relative;
      z-index: 2;
      padding: 20px;
      max-width: 80%;
    }

    .location-content h3 {
      font-size: 2.2rem;
      font-weight: 700;
      margin-bottom: 10px;
      animation: fadeInDown 1s ease;
    }

    .location-content p {
      font-size: 1.1rem;
      line-height: 1.6;
      color: #eee;
      animation: fadeIn 1.3s ease;
    }

    .book-btn {
      display: inline-block;
      margin-top: 25px;
      background-color: #d63384;
      color: white;
      border: none;
      padding: 10px 25px;
      border-radius: 30px;
      font-weight: 600;
      text-transform: uppercase;
      transition: 0.3s;
      text-decoration: none;
      animation: fadeInUp 1.5s ease;
    }

    .book-btn:hover {
      background-color: #c2185b;
      transform: translateY(-3px);
    }

    /* Animations */
    @keyframes fadeInUp {
      from { opacity: 0; transform: translateY(40px); }
      to { opacity: 1; transform: translateY(0); }
    }
    @keyframes fadeInDown {
      from { opacity: 0; transform: translateY(-40px); }
      to { opacity: 1; transform: translateY(0); }
    }
    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }

    /* Responsive */
    @media (max-width: 992px) {
      .location-card { flex: 1 1 100%; height: 70vh; }
    }
  </style>
</head>
<body>

  <!-- Hero -->
  <section class="hero-section">
    <h1>Our Beautiful Locations</h1>
  </section>

  <!-- Ceremony Spots -->
  <div class="section-title" data-aos="fade-up">
    <h2>Ceremony Spots</h2>
    <p>Where vows meet the divine</p>
  </div>
  <div class="location-row">
    <div class="location-card" style="background-image: url('images/triyuginarayan1.jpg');" data-aos="fade-up">
      <div class="location-content">
        <h3>Triyuginarayan Temple</h3>
        <p>The sacred site where Lord Shiva married Goddess Parvati — perfect for a divine beginning.</p>
        <a href="register.php" class="book-btn">Book Now</a>
      </div>
    </div>
    <div class="location-card" style="background-image: url('images/varanasi1.jpg');" data-aos="fade-up" data-aos-delay="200">
      <div class="location-content">
        <h3>Varanasi Ghat</h3>
        <p>Say your vows beside the holy Ganges, surrounded by blessings and eternal peace.</p>
        <a href="register.php" class="book-btn">Book Now</a>
      </div>
    </div>
    <div class="location-card" style="background-image: url('images/jodhpur1.jpg');" data-aos="fade-up" data-aos-delay="400">
      <div class="location-content">
        <h3>Jodhpur Palace</h3>
        <p>Royal charm, grand halls, and majestic architecture — a regal setting for your ceremony.</p>
        <a href="register.php" class="book-btn">Book Now</a>
      </div>
    </div>
  </div>

  <!-- Wedding Spots -->
  <div class="section-title" data-aos="fade-up">
    <h2>Wedding Spots</h2>
    <p>Where elegance meets celebration</p>
  </div>
  <div class="location-row">
    <div class="location-card" style="background-image: url('images/kolkata1.jpg');" data-aos="zoom-in">
      <div class="location-content">
        <h3>Kolkata</h3>
        <p>The City of Joy — celebrate your big day in cultural charm and architectural grandeur.</p>
        <a href="register.php" class="book-btn">Book Now</a>
      </div>
    </div>
    <div class="location-card" style="background-image: url('images/darjeeling1.jpg');" data-aos="zoom-in" data-aos-delay="200">
      <div class="location-content">
        <h3>Darjeeling</h3>
        <p>Tea gardens, misty hills, and mountain skies — a breathtaking place for a fairytale wedding.</p>
        <a href="register.php" class="book-btn">Book Now</a>
      </div>
    </div>
    <div class="location-card" style="background-image: url('images/goa1.jpg');" data-aos="zoom-in" data-aos-delay="400">
      <div class="location-content">
        <h3>Goa</h3>
        <p>Sunsets and seaside ceremonies — dance to the waves and celebrate love by the ocean.</p>
        <a href="register.php" class="book-btn">Book Now</a>
      </div>
    </div>
  </div>

  <!-- Honeymoon Spots -->
  <div class="section-title" data-aos="fade-up">
    <h2>Honeymoon Spots</h2>
    <p>Where love finds its forever</p>
  </div>
  <div class="location-row">
    <div class="location-card" style="background-image: url('images/maldives1.jpg');" data-aos="fade-up">
      <div class="location-content">
        <h3>Maldives</h3>
        <p>Turquoise waters and white sands — your paradise awaits for romance under the stars.</p>
        <a href="register.php" class="book-btn">Book Now</a>
      </div>
    </div>
    <div class="location-card" style="background-image: url('images/swiss1.jpg');" data-aos="fade-up" data-aos-delay="200">
      <div class="location-content">
        <h3>Switzerland</h3>
        <p>Snowy peaks and cozy chalets — a dreamy escape in the heart of Europe.</p>
        <a href="register.php" class="book-btn">Book Now</a>
      </div>
    </div>
    <div class="location-card" style="background-image: url('images/bali1.jpg');" data-aos="fade-up" data-aos-delay="400">
      <div class="location-content">
        <h3>Bali</h3>
        <p>Tropical bliss and ocean cliffs — where love and tranquility intertwine beautifully.</p>
        <a href="register.php" class="book-btn">Book Now</a>
      </div>
    </div>
  </div>

  <script>
    AOS.init({
      duration: 1000,
      once: true,
      easing: 'ease-in-out'
    });
  </script>
</body>
</html>
