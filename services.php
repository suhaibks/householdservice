<?php
include "includes/header.php";
include "db_config.php";

$result = $conn->query("SELECT * FROM services");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Services - EasyHome</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .card {
            background: #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card img {
            width: 100%;
            
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .btn {
            background: #0077cc;
            color: #fff;
            padding: 8px 14px;
            border-radius: 6px;
            text-decoration: none;
            margin-top: 10px;
        }

        .btn:hover {
            background: #005fa3;
        }

        h2 {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <main style="padding: 20px;">
        <h2>Available Services</h2>
        <div class="grid">
            <?php while ($row = $result->fetch_assoc()) { ?>
                <div class="card">
                    <img src="images/<?php echo $row['image']; ?>" alt="<?php echo $row['category']; ?>">
                    <h3><?php echo $row['category']; ?></h3>
                    <p><?php echo $row['description']; ?></p>
                    <p><strong>₹<?php echo $row['price']; ?></strong></p>
                    <a href="book_service.php?service_id=<?php echo $row['id']; ?>" class="btn">Book Now</a>
                </div>
            <?php } ?>
        </div>
    </main>

    <?php include "includes/footer.php"; ?>
</body>
</html>
