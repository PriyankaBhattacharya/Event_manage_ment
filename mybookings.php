<?php
include 'navbar.php';
include 'db_connect.example.php';
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// ✅ Use correct table name: bookings
$result = $conn->query("SELECT * FROM bookings WHERE user_id = $user_id ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>My Bookings | Vivah</title>
  <meta name="viewport" content="width=device-width,initial-scale=1" />

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

  <style>
    :root{
      --accent:#d63384;   /* Vivah pink */
      --accent-dark:#b82e6f;
      --muted:#6c757d;
      --card-bg: rgba(255,255,255,0.95);
    }


body {
  font-family: 'Poppins', sans-serif;
  background: 
    linear-gradient(rgba(255, 255, 255, 0.4), rgba(255, 255, 255, 0.4)), 
    url('images/bookings-bg.jpg') no-repeat center center fixed;
  background-size: cover;
  background-attachment: fixed;
  color: #2b2b2b;
  margin: 0;
  padding: 0;
  min-height: 100vh;
}




    /* keep navbar untouched visually but add subtle shadow */
    nav.navbar {
      box-shadow: 0 6px 20px rgba(0,0,0,0.08);
      z-index: 50;
    }

    /* page container sits neatly below navbar */
    .page-wrap{
      max-width: 1150px;
      margin: 90px auto 60px; /* leaves space for fixed/top navbar */
      padding: 24px;
    }

    .header-card{
      background: var(--card-bg);
      border-radius: 14px;
      padding: 26px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.06);
      display:flex;
      gap:20px;
      align-items:center;
      justify-content:space-between;
    }

    .header-left h1{
      font-family: 'Playfair Display', serif;
      margin:0;
      color:var(--accent);
      font-size:1.9rem;
      letter-spacing: .6px;
    }

    .header-left p{
      margin:0;
      color:var(--muted);
      font-size:0.95rem;
    }

    .summary-pill{
      background: linear-gradient(90deg,var(--accent),var(--accent-dark));
      color:white;
      padding:10px 18px;
      border-radius:999px;
      font-weight:600;
      box-shadow: 0 8px 20px rgba(214,51,132,0.18);
    }

    .content {
      margin-top:20px;
      display:grid;
      grid-template-columns: 1fr;
      gap:18px;
    }

    /* bookings table card */
    .card-panel{
      background: var(--card-bg);
      border-radius: 14px;
      padding:18px;
      box-shadow: 0 8px 25px rgba(0,0,0,0.06);
    }

    table.bookings-table thead th {
      background: var(--accent);
      color: #fff;
      border: none;
      vertical-align: middle;
      font-weight:600;
      text-transform: uppercase;
      font-size: .8rem;
      letter-spacing: 0.6px;
    }

    table.bookings-table tbody tr td{
      vertical-align: middle;
      color:#3b3b3b;
    }

    .booking-id {
      font-weight:700;
      color:var(--accent-dark);
      background: rgba(214,51,132,0.06);
      padding:6px 10px;
      border-radius:8px;
      display:inline-block;
    }

    .badge-slot {
      background: #fff3f7;
      color: var(--accent-dark);
      border-radius: 12px;
      padding:6px 10px;
      font-weight:600;
      font-size:.85rem;
      border:1px solid rgba(214,51,132,0.06);
    }

    .badge-status {
      padding:6px 12px;
      border-radius: 12px;
      font-weight:600;
      font-size:.85rem;
    }

    .status-pending{ background:#fff3cd; color:#856404; }
    .status-confirmed{ background:#d4edda; color:#155724; }
    .status-cancelled{ background:#f8d7da; color:#721c24; }

    /* responsive tweaks */
    @media (min-width:992px){
      .content{ grid-template-columns: 1fr; }
    }

    /* small helpers */
    .muted { color:var(--muted); font-size:0.95rem; }
    .table-responsive { border-radius: 12px; overflow: hidden; }
    .empty-state {
      text-align:center;
      padding:36px;
      color:var(--muted);
    }
  </style>
</head>
<body>

  <!-- Page wrapper -->
  <div class="page-wrap container">

    <!-- Header -->
    <div class="header-card">
      <div class="header-left">
        <h1>My Bookings</h1>
        <p class="muted">Track all your reservations at a glance. Booking details update in real time.</p>
      </div>

      <div class="header-right text-end">
        <div class="summary-pill">
          <?= htmlspecialchars($_SESSION['username']) ?>’s Bookings
        </div>
      </div>
    </div>

    <div class="content">

      <!-- Bookings table -->
      <div class="card-panel">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <div>
            <h5 class="mb-0" style="font-weight:700; color:#333;">Booking History</h5>
            <small class="muted">Latest bookings displayed first</small>
          </div>
          <div>
            <!-- placeholder for actions: print/export/filer -->
            <a href="#" onclick="window.print();" class="btn btn-outline-secondary btn-sm">Print</a>
          </div>
        </div>

        <div class="table-responsive">
          <table class="table bookings-table table-hover align-middle text-center mb-0">
            <thead>
              <tr>
                <th>Booking ID</th>
                <th>Event Type</th>
                <th>Location</th>
                <th>Check-In</th>
                <th>Check-Out</th>
                <th>Time Slot</th>
                <th>Headcount</th>
                <th>Caterer</th>
                <th>Status</th>
              </tr>
            </thead>

            <tbody>
              <?php if ($result && $result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                  <?php
                    // compute status class
                    $status = $row['status'] ?? 'Pending';
                    $sclass = 'status-pending';
                    if (strtolower($status) === 'confirmed') $sclass = 'status-confirmed';
                    if (strtolower($status) === 'cancelled') $sclass = 'status-cancelled';
                  ?>
                  <tr>
                    <td>
                      <div class="booking-id"><?= htmlspecialchars($row['booking_id'] ?? '—') ?></div>
                      <div class="muted" style="font-size:.8rem; margin-top:6px;"><?= 'Booked: ' . date('d M Y', strtotime($row['created_at'] ?? $row['booking_date'] ?? date('Y-m-d'))); ?></div>
                    </td>
                    <td><?= ucfirst(htmlspecialchars($row['event_type'] ?? '—')) ?></td>
                    <td><?= ucfirst(htmlspecialchars($row['location'] ?? '—')) ?></td>
                    <td><?= htmlspecialchars($row['checkin_date'] ?? '—') ?></td>
                    <td><?= htmlspecialchars($row['checkout_date'] ?? '—') ?></td>
                    <td><span class="badge-slot"><?= ucfirst(htmlspecialchars($row['time_slot'] ?? '—')) ?></span></td>
                    <td><?= htmlspecialchars($row['headcount'] ?? '—') ?></td>
                    <td><?= htmlspecialchars($row['caterer'] ?? '—') ?></td>
                    <td><span class="badge-status <?= $sclass ?>"><?= htmlspecialchars($status) ?></span></td>
                  </tr>
                <?php endwhile; ?>
              <?php else: ?>
                <tr>
                  <td colspan="9" class="empty-state">
                    <div style="font-size:1.1rem; font-weight:600; margin-bottom:6px;">No bookings found</div>
                    <div class="muted">You have not made any bookings yet. Explore <a href="events.php">events</a> to make your first reservation.</div>
                  </td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>

    </div>
  </div>

  <!-- Bootstrap JS (optional) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
