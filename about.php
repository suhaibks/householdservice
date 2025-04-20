<?php include "includes/header.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <title>About Us - EasyHome</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            background: #f4f6f9;
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 0;
        }

        .about-container {
            max-width: 900px;
            margin: 50px auto;
            background: #fff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }

        .about-container h2 {
            text-align: center;
            color: #0077cc;
            font-size: 28px;
            margin-bottom: 20px;
        }

        .about-container p {
            font-size: 16px;
            line-height: 1.8;
            margin-bottom: 16px;
            color: #333;
        }

        footer {
            background-color: #f8f8f8;
            text-align: center;
            padding: 15px;
            border-top: 1px solid #ccc;
            color: #444;
            font-size: 14px;
            margin-top: 40px;
        }
    </style>
</head>
<body>

    <div class="about-container">
        <h2>About This Project</h2>
        <p>
            This website was created as part of a <strong>college mini project</strong> to demonstrate web development skills and practical implementation of a full-stack system.
        </p>
        <p>
            It replicates a real-world household services platform, allowing users to sign up, book verified professionals, and track service requests. The project also includes a secure admin panel to manage bookings.
        </p>
        <p>
            <strong>Technologies Used:</strong> HTML, CSS, JavaScript, PHP, MySQL. The backend is built using PHP with MySQL for database management, and the project runs locally using XAMPP and Apache NetBeans.
        </p>
        <p>
            This project highlights the integration of user authentication, dynamic content, service-based workflows, and admin control — all within a clean, responsive design.
        </p>
    </div>

    <?php include "includes/footer.php"; ?>
</body>
</html>
