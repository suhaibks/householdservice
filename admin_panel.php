<?php
session_start();
include "db_config.php";

if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

// Update status if admin marks as completed
if (isset($_GET['complete_id'])) {
    $id = $_GET['complete_id'];
    $conn->query("UPDATE bookings SET status='Completed' WHERE id=$id");
}

$query = "
    SELECT b.id, u.username, s.category, b.booking_date, b.status 
    FROM bookings b
    JOIN users u ON b.user_id = u.id
    JOIN services s ON b.service_id = s.id
    ORDER BY b.booking_date DESC
";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
    body {
        font-family: 'Segoe UI', sans-serif;
        background-color: #f4f6f9;
        padding: 30px;
    }

    h2 {
        text-align: center;
        color: #333;
        margin-bottom: 30px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background: white;
        box-shadow: 0 4px 8px rgba(0,0,0,0.05);
        border-radius: 10px;
        overflow: hidden;
    }

    th, td {
        padding: 14px 20px;
        text-align: left;
    }

    th {
        background-color: #0077cc;
        color: white;
        font-weight: 600;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tr:hover {
        background-color: #f1f1f1;
    }

    .btn {
        padding: 6px 12px;
        background-color: #0077cc;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 14px;
        text-decoration: none;
    }

    .btn:hover {
        background-color: #005fa3;
    }

    .logout-btn {
        margin-top: 30px;
        display: inline-block;
        padding: 10px 20px;
        background-color: #0077cc;
        color: white;
        border-radius: 6px;
        text-decoration: none;
        font-weight: 500;
    }

    .logout-btn:hover {
        background-color: #005fa3;
    }

    .admin-panel-container {
        max-width: 1000px;
        margin: auto;
    }
</style>
</head>
<body>
    <div class="admin-panel-container">
    <h2>Welcome, Admin!</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>User</th>
            <th>Service</th>
            <th>Date</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['category']; ?></td>
                <td><?php echo $row['booking_date']; ?></td>
                <td><?php echo $row['status']; ?></td>
                <td>
                    <?php if ($row['status'] == 'Pending') { ?>
                        <a href="admin_panel.php?complete_id=<?php echo $row['id']; ?>" class="btn">Mark Completed</a>
                    <?php } else { echo "—"; } ?>
                </td>
            </tr>
        <?php } ?>
    </table>
    <h2 style="margin-top: 60px;">Feedback</h2><br>
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Message</th>
        <th>Submitted</th>
    </tr>
    <?php
    $messages = $conn->query("SELECT * FROM messages ORDER BY submitted_at DESC");
    while ($msg = $messages->fetch_assoc()) {
        echo "<tr>
            <td>{$msg['id']}</td>
            <td>{$msg['name']}</td>
            <td>{$msg['email']}</td>
            <td>{$msg['message']}</td>
            <td>{$msg['submitted_at']}</td>
        </tr>";
    }
    ?>
</table>


    <a href="logout.php" class="logout-btn">Logout</a>
</div>

</body>
</html>
