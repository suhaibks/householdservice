<?php
include "db_config.php";

$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $dob = $_POST["dob"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT);

    $stmt = $conn->prepare("INSERT INTO users (username, dob, email, address, password) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $username, $dob, $email, $address, $password);

    if ($stmt->execute()) {
        $message = "Signup successful! <a href='index.php'>Login</a>";
    } else {
        $message = "Error: Email already exists.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup - Household Services</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="auth">
    <div class="form-container">
        <h2>Signup</h2>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required />
            <input type="date" name="dob" required />
            <input type="email" name="email" placeholder="Email" required />
            <textarea name="address" placeholder="Address" required></textarea>
            <input type="password" name="password" placeholder="Password" required />
            <label><input type="checkbox" onclick="togglePassword()"></label>
            <button type="submit">Signup</button>
            <p class="error"><?php echo $message; ?></p>
            <p>Already have an account? <a href="index.php">Login</a></p>
        </form>
    </div>

    <script>
        function togglePassword() {
            const pwd = document.querySelector("input[name='password']");
            pwd.type = pwd.type === "password" ? "text" : "password";
        }
    </script>
</body>
</html>
