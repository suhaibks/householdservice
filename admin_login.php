<?php
session_start();
include "db_config.php";

$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = "SELECT * FROM admin WHERE username='$username'";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        $admin = $result->fetch_assoc();
        if (password_verify($password, $admin["password"])) {
    $_SESSION["admin"] = $admin["username"];
    header("Location: admin_panel.php");
    exit();
} else {
    $error = "Wrong password.";
}

    } else {
        $error = "Admin not found.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login - EasyHome</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="auth">
    <div class="form-container">
        <h2>Admin Login</h2>
        <form method="POST">
            <input type="text" name="username" placeholder="Admin Username" required />
            <input type="password" name="password" placeholder="Password" required />
            <button type="submit">Login</button>
            <p class="error"><?php echo $error; ?></p>
        </form>
    </div>
</body>
</html>
