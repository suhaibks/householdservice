<?php
include "includes/header.php";
include "db_config.php";

$success = "";
$allow_form = isset($_SESSION['user_id']); // Only allow form if user is logged in

if ($_SERVER["REQUEST_METHOD"] == "POST" && $allow_form) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $stmt = $conn->prepare("INSERT INTO messages (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);
    $stmt->execute();
    $success = "Message sent successfully!";
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Contact Us - EasyHome</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            background: #f4f6f9;
            font-family: 'Segoe UI', sans-serif;
        }

        .contact-container {
            max-width: 800px;
            margin: 50px auto;
            background: #fff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #0077cc;
        }

        .contact-info {
            margin-bottom: 30px;
            line-height: 1.6;
            font-size: 16px;
            color: #333;
        }

        form input, form textarea {
            width: 100%;
            padding: 12px;
            margin-top: 10px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 15px;
        }

        form button {
            width: 100%;
            padding: 12px;
            background: #0077cc;
            color: white;
            border: none;
            border-radius: 6px;
            margin-top: 15px;
            font-size: 16px;
            cursor: pointer;
        }

        form button:hover {
            background: #005fa3;
        }

        .success-msg {
            text-align: center;
            color: green;
            margin-top: 15px;
        }

        footer {
            margin-top: 40px;
        }
    </style>
</head>
<body>

<div class="contact-container">
    <h2>Contact Us</h2>
    <div class="contact-info">
        <p><strong>Email:</strong> support@easyhome.com</p>
        <p><strong>Phone:</strong> +91-9876543210</p>
        <p><strong>Address:</strong> 123, Home Services Lane, Bengaluru, India</p>
    </div>
    <h2>Feedback Form</h2>
    <?php if ($allow_form): ?>
    <form method="POST">
        <input type="text" name="name" placeholder="Your Name" required />
        <input type="email" name="email" placeholder="Your Email" required />
        <textarea name="message" rows="5" placeholder="Your Message" required></textarea>
        <button type="submit">Send Message</button>
        <?php if (!empty($success)) echo "<p class='success-msg'>$success</p>"; ?>
    </form>
<?php else: ?>
    <p style="color: red; font-weight: bold; margin-top: 20px;">
        You must be logged in to send a message. <a href="login.php">Login here</a>.
    </p>
<?php endif; ?>

</div>

<?php include "includes/footer.php"; ?>
</body>
</html>
