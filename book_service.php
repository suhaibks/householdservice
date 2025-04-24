<?php
include "includes/header.php";
include "db_config.php";
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Handle booking form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $service_id = $_POST['service_id'];
    $booking_date = $_POST['booking_date'];

    $stmt = $conn->prepare("INSERT INTO bookings (user_id, service_id, booking_date) VALUES (?, ?, ?)");
    $stmt->bind_param("iis", $user_id, $service_id, $booking_date);
    
    if ($stmt->execute()) {
        $success = "Service booked successfully!";
    } else {
        $success = "Failed to book service. Please try again.";
    }
}

// Fetch service details using service_id from URL
$service_id = $_GET['service_id'] ?? null;
$service = null;

if ($service_id) {
    $result = $conn->query("SELECT * FROM services WHERE id = $service_id");
    $service = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Book Service - EasyHome</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .booking-container {
            background: #fff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            max-width: 600px;
            margin: 30px auto;
        }

        .booking-container img {
            width: 100%;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 15px;
        }

        .booking-container h3 {
            margin: 0 0 10px;
        }

        .booking-container form input[type="date"],
        .booking-container form button {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            font-size: 15px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }

        .booking-container form button {
            background-color: #0077cc;
            color: white;
            border: none;
            cursor: pointer;
        }

        .booking-container form button:hover {
            background-color: #005fa3;
        }

        .success-msg {
            color: green;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <main>
        <div class="booking-container">
            <?php if ($service): ?>
                <img src="images/<?php echo $service['image']; ?>" alt="<?php echo $service['category']; ?>">
                <h3><?php echo $service['category']; ?></h3>
                <p><?php echo $service['description']; ?></p>
                <p><strong>Price:</strong> ₹<?php echo $service['price']; ?></p>
                
                <form method="POST">
                    <input type="hidden" name="service_id" value="<?php echo $service['id']; ?>">
                    <label for="booking_date">Select Booking Date:</label>
                    <?php $today = date("Y-m-d"); ?>
                    <input type="date" name="booking_date" min="<?php echo $today; ?>" required>

                    <button type="submit">Confirm Booking</button>
                    <?php if (!empty($success)): ?>
                        <p class="success-msg"><?php echo $success; ?></p>
                    <?php endif; ?>
                </form>
            <?php else: ?>
                <p>Service not found.</p>
            <?php endif; ?>
        </div>
    </main>

    <?php include "includes/footer.php"; ?>
</body>
</html>
