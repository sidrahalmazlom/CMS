<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$role = $_SESSION['role'];
$name = $_SESSION['name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - SidrahTech</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="admin-page">

   <?php require_once 'includes/sidebar.php'; ?>

    <div class="main-content">
        <div class="welcome-card">
            <h2>Welcome, <?php echo htmlspecialchars($name); ?></h2>
            <p>You are logged in as:</p>
            <span class="role-tag"><?php echo htmlspecialchars($role); ?></span>

            <?php if ($role === 'Admin'): ?>
                <p style="margin-top:20px;">As an Admin, you can manage all content and control user accounts.</p>
            <?php else: ?>
                <p style="margin-top:20px;">As an Editor, you can manage Services and Jobs listed on the website.</p>
            <?php endif; ?>
        </div>
    </div>

</body>
</html>