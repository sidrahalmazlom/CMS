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
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #0d1b2a;
            color: #f0f4f8;
            display: flex;
            min-height: 100vh;
        }
        .sidebar {
            width: 220px;
            background: rgba(255, 255, 255, 0.06);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-right: 1px solid rgba(173, 216, 255, 0.2);
            padding: 25px 15px;
        }
        .sidebar h2 {
            font-size: 1.1rem;
            color: #cfe2ff;
            margin-top: 0;
        }
        .sidebar a {
            display: block;
            color: rgba(255,255,255,0.85);
            text-decoration: none;
            padding: 10px 12px;
            border-radius: 8px;
            margin-bottom: 6px;
            font-size: 0.9rem;
        }
        .sidebar a:hover {
            background: rgba(255,255,255,0.1);
        }
        .main-content {
            flex: 1;
            padding: 40px;
        }
        .welcome-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(173, 216, 255, 0.25);
            border-radius: 14px;
            padding: 25px 30px;
            max-width: 500px;
        }
        .role-tag {
            display: inline-block;
            background: rgba(52, 120, 246, 0.3);
            border: 1px solid rgba(173, 216, 255, 0.4);
            padding: 3px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            margin-top: 8px;
        }
        .logout {
            margin-top: 30px;
            color: #ff8080;
            text-decoration: none;
            font-size: 0.85rem;
        }
    </style>
</head>
<body>

    <div class="sidebar">
        <h2>SidrahTech</h2>

        <a href="dashboard.php">Dashboard Home</a>
        <a href="manage_services.php">Manage Services</a>
        <a href="manage_jobs.php">Manage Jobs</a>
        <a href="messages.php">Messages</a>

        <?php if ($role === 'Admin'): ?>
            <a href="manage_users.php">Manage Users</a>
        <?php endif; ?>

        <a href="logout.php" class="logout">Log Out</a>
    </div>

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