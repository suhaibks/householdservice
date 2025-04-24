<?php
session_start();
include "db_config.php";

$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user["password"])) {
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["username"] = $user["username"];
            header("Location: index.php");
            exit();
        } else {
            $error = "Invalid password.";
        }
    } else {
        $error = "User not found.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - Household Services</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body.auth {
            background: #e9f0fa;
            font-family: 'Segoe UI', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .form-container {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            width: 350px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #0077cc;
        }

        form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 15px;
        }

        .show-password {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            color: #333;
            margin-bottom: 12px;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #0077cc;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background: #005fa3;
        }

        .error {
            color: red;
            font-size: 14px;
            text-align: center;
            margin-top: 10px;
        }

        .admin-btn {
            margin-top: 15px;
            display: inline-block;
            padding: 10px 15px;
            background-color: #444;
            color: white;
            text-decoration: none;
            border-radius: 6px;
        }

        .admin-btn:hover {
            background-color: #222;
        }

        p {
            text-align: center;
            margin-top: 10px;
        }

        p a {
            color: #0077cc;
            text-decoration: none;
        }

        p a:hover {
            text-decoration: underline;
        }

        hr {
            border: none;
            border-top: 1px solid #ccc;
        }
    </style>
</head>
<body class="auth">
    <div class="form-container">
        <h2>User Login</h2>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required />
            <input type="password" name="password" placeholder="Password" required />
                <input type="checkbox" id="togglePassword" onclick="togglePassword()">
                <label for="togglePassword"></label>
            

            <button type="submit">Login</button>
            <p class="error"><?php echo $error; ?></p>
            <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
        </form>

        <hr style="margin: 20px 0;">

        <!-- Admin Login Button -->
        <a href="admin_login.php" class="admin-btn">Admin Login</a>
    </div>

    <script>
        function togglePassword() {
            const pwd = document.querySelector("input[name='password']");
            pwd.type = pwd.type === "password" ? "text" : "password";
        }
    </script>
</body>
</html>
