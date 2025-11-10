<?php
include 'navbar.php';
include 'db_connect.example.php';
session_start();

// Redirect if not logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$message = "";

// Handle booking form submission
if (isset($_POST['book_event'])) {
    $user_id = $_SESSION['user_id']; // assuming this is stored during login
    $event_type = $_POST['event_type'];
    $location = $_POST['location'];
    $number = $_POST['number'];
    $checkin_date = $_POST['checkin_date'];
    $checkout_date = $_POST['checkout_date'];
    $time_slot = $_POST['time_slot'];
    $headcount = $_POST['headcount'];
    $caterer = $_POST['caterer'];

    // Generate a unique booking ID
    $booking_id = strtoupper(uniqid("VIVAH-"));

    // Insert booking record
    $stmt = $conn->prepare("INSERT INTO bookings (booking_id, user_id, event_type, location, number, checkin_date, checkout_date, time_slot, headcount, caterer) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sissssssss", $booking_id, $user_id, $event_type, $location, $number, $checkin_date, $checkout_date, $time_slot, $headcount, $caterer);

    if ($stmt->execute()) {
        $message = "✅ Booking Successful! Your Booking ID: <strong>$booking_id</strong>";
    } else {
        $message = "❌ Error: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Book Your Event | Vivah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700&family=Great+Vibes&display=swap" rel="stylesheet">

    <style>
        body {
            background: url('images/booking.jpg') no-repeat center center/cover;
            font-family: 'Poppins', sans-serif;
        }
        
        .booking-container {
            max-width: 600px;
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
        .btn-book {
            background-color: #d63384;
            border: none;
            width: 100%;
            padding: 10px;
            color: white;
            border-radius: 10px;
            font-weight: 600;
        }
        .btn-book:hover {
            background-color: #c2185b;
        }
        .form-control, .form-select {
            border-radius: 10px;
            padding: 8px 10px;
            font-size: 0.95rem;
        }
        .success-msg {
            text-align: center;
            color: green;
            font-weight: 600;
        }
    </style>
</head>
<body>

<div class="booking-container">
    <h3>Book Your Event</h3>
    <?php if ($message): ?>
        <p class="text-center <?= strpos($message, '✅') !== false ? 'text-success' : 'text-danger' ?>">
            <?= $message ?>
        </p>
    <?php endif; ?>

    <form method="POST">
        <!-- Event Type -->
        <div class="mb-3 text-start">
            <label class="form-label">Event Type</label>
            <select name="event_type" id="eventType" class="form-select" required>
                <option value="">Select Event Type</option>
                <option value="wedding">Wedding</option>
                <option value="ceremony">Ceremony</option>
                <option value="honeymoon">Honeymoon</option>
            </select>
        </div>

        <!-- Location -->
        <div class="mb-3 text-start" id="locationField" style="display:none;">
            <label class="form-label">Preferred Location</label>
            <select name="location" id="locationSelect" class="form-select" required>
                <option value="">Select Location</option>
            </select>
        </div>

        <!-- Number -->
        <div class="mb-3 text-start">
            <label class="form-label">Contact Number</label>
            <input type="text" name="number" class="form-control" pattern="[0-9]{10}" placeholder="Enter 10-digit number" required>
        </div>

        <!-- Time Slot -->
        <div class="mb-3 text-start">
            <label class="form-label">Time Slot</label>
            <select name="time_slot" class="form-select" required>
                <option value="morning">Morning (8 AM - 12 PM)</option>
                <option value="afternoon">Afternoon (12 PM - 4 PM)</option>
                <option value="evening">Evening (4 PM - 8 PM)</option>
                <option value="night">Night (8 PM - 12 AM)</option>
            </select>
        </div>

        <!-- Check-in / Check-out -->
        <div class="mb-3 text-start">
            <label class="form-label">Check-In Date</label>
            <input type="date" name="checkin_date" class="form-control" required>
        </div>
        <div class="mb-3 text-start">
            <label class="form-label">Check-Out Date</label>
            <input type="date" name="checkout_date" class="form-control" required>
        </div>

        <!-- Headcount -->
        <div class="mb-3 text-start">
            <label class="form-label">Headcount</label>
            <input type="number" name="headcount" min="1" class="form-control" required>
        </div>

        <!-- Caterer -->
        <div class="mb-3 text-start" id="catererField" style="display:none;">
            <label class="form-label">Select Caterer</label>
            <select name="caterer" id="catererSelect" class="form-select" required>
                <option value="">Select Caterer</option>
            </select>
        </div>

        <button type="submit" name="book_event" class="btn-book">Confirm Booking</button>
    </form>
</div>

<!-- Dynamic JS Logic -->
<script>
const eventType = document.getElementById('eventType');
const locationField = document.getElementById('locationField');
const locationSelect = document.getElementById('locationSelect');
const catererField = document.getElementById('catererField');
const catererSelect = document.getElementById('catererSelect');

const locationOptions = {
    wedding: ["Kolkata", "Darjeeling", "Sikkim"],
    ceremony: ["Kolkata", "US", "Canada"],
    honeymoon: ["Maldives", "Sikkim", "US"]
};

const catererOptions = {
    Kolkata: ["Royal Caterers", "TasteHub", "CityDelight"],
    Darjeeling: ["Hillside Feast", "Mountain Dine"],
    Sikkim: ["Everest Foods", "Sikkim Spices"],
    US: ["Global Bites", "Urban Feast"],
    Maldives: ["Ocean Dine", "Island Taste"],
    Canada: ["Maple Feast", "Snowbite Catering"]
};

eventType.addEventListener('change', function() {
    const selected = this.value;
    locationSelect.innerHTML = `<option value="">Select Location</option>`;
    catererSelect.innerHTML = `<option value="">Select Caterer</option>`;

    if (selected && locationOptions[selected]) {
        locationField.style.display = "block";
        locationOptions[selected].forEach(loc => {
            const opt = document.createElement("option");
            opt.value = loc.toLowerCase();
            opt.textContent = loc;
            locationSelect.appendChild(opt);
        });
    } else {
        locationField.style.display = "none";
    }
});

locationSelect.addEventListener('change', function() {
    const selectedLoc = this.options[this.selectedIndex].text;
    catererSelect.innerHTML = `<option value="">Select Caterer</option>`;

    if (selectedLoc && catererOptions[selectedLoc]) {
        catererField.style.display = "block";
        catererOptions[selectedLoc].forEach(cat => {
            const opt = document.createElement("option");
            opt.value = cat;
            opt.textContent = cat;
            catererSelect.appendChild(opt);
        });
    } else {
        catererField.style.display = "none";
    }
});
</script>

</body>
</html>
