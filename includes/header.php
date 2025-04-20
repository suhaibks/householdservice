<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}
?>

<header>
    <div class="logo">EasyHome Services</div>
    <nav>
        <a href="home.php">Home</a>
        <a href="services.php">Services</a>
        
        <a href="orders.php">Orders</a>
        <a href="about.php">About</a>
        <a href="contact.php">Contact</a>
    </nav>
    <div class="profile">
        <button onclick="toggleDropdown()" class="profile-btn"><?php echo $_SESSION['username']; ?> ▼</button>
        <div id="dropdown" class="dropdown-content">
            <a href="logout.php">Logout</a>
        </div>
    </div>
</header>
<script src="js/profile_dropdown.js"></script>
