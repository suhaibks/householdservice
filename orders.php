<?php
include "includes/header.php";
include "db_config.php";

$user_id = $_SESSION['user_id'];
$query = "
    SELECT b.*, s.category, s.description 
    FROM bookings b 
    JOIN services s ON b.service_id = s.id 
    WHERE b.user_id = $user_id
    ORDER BY b.booking_date DESC
";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Orders - EasyHome</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            background: #f4f6f9;
            font-family: 'Segoe UI', sans-serif;
        }

        h2 {
            text-align: center;
            margin-top: 30px;
            color: #333;
        }

        .orders-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
            padding: 40px 20px;
        }

        .order-card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            padding: 20px;
            width: 300px;
            transition: transform 0.2s ease;
        }

        .order-card:hover {
            transform: translateY(-5px);
        }

        .order-card h3 {
            margin-top: 0;
            color: #0077cc;
        }

        .order-card p {
            margin: 8px 0;
            font-size: 15px;
        }

        .status-completed {
            color: green;
            font-weight: bold;
        }

        .status-pending {
            color: #e67e22;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h2>Your Orders</h2>
    <div class="orders-container">
        <?php while ($row = $result->fetch_assoc()) { ?>
            <div class="order-card">
                <h3><?php echo $row['category']; ?></h3>
                <p><?php echo $row['description']; ?></p>
                <p><strong>Date:</strong> <?php echo $row['booking_date']; ?></p>
                <p><strong>Status:</strong> 
                    <span class="<?php echo $row['status'] === 'Completed' ? 'status-completed' : 'status-pending'; ?>">
                        <?php echo $row['status']; ?>
                    </span>
                </p>
            </div>
        <?php } ?>
    </div>

    <?php include "includes/footer.php"; ?>
</body>
</html>
