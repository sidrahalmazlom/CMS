<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
require_once '../config/db.php';

if (isset($_GET['delete'])) {
    $stmt = $conn->prepare("DELETE FROM Message WHERE id = ?");
    $stmt->bind_param("i", $_GET['delete']);
    $stmt->execute();
    header("Location: messages.php");
    exit();
}

$messages = $conn->query("SELECT * FROM Message ORDER BY date_sent DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Messages - SidrahTech</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="admin-page">
    <div class="sidebar">
        <h2>SidrahTech</h2>
        <a href="dashboard.php">Dashboard Home</a>
        <a href="manage_services.php">Manage Services</a>
        <a href="manage_jobs.php">Manage Jobs</a>
        <a href="messages.php">Messages</a>
        <?php if ($_SESSION['role'] === 'Admin'): ?>
            <a href="manage_users.php">Manage Users</a>
        <?php endif; ?>
        <a href="logout.php" style="color:#ff8080;">Log Out</a>
    </div>

    <div class="main-content">
        <h2>Contact Messages</h2>
        <?php if ($messages->num_rows === 0): ?>
            <p>No messages yet.</p>
        <?php endif; ?>
        <?php while ($row = $messages->fetch_assoc()): ?>
            <div class="card message-card">
                <strong><?php echo htmlspecialchars($row['name']); ?></strong>
                (<?php echo htmlspecialchars($row['email']); ?>)<br>
                <small><?php echo $row['date_sent']; ?></small>
                <p><?php echo nl2br(htmlspecialchars($row['content'])); ?></p>
                <a class="action" href="messages.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('Delete this message?');">Delete</a>
            </div>
        <?php endwhile; ?>
    </div>
</body>
</html>