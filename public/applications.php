<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
require_once '../config/db.php';

if (isset($_GET['delete'])) {
    $stmt = $conn->prepare("DELETE FROM Application WHERE id = ?");
    $stmt->bind_param("i", $_GET['delete']);
    $stmt->execute();
    header("Location: applications.php");
    exit();
}

$applications = $conn->query("
    SELECT Application.*, Job.title AS job_title
    FROM Application
    JOIN Job ON Application.job_id = Job.id
    ORDER BY Application.date_applied DESC
");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Applications - SidrahTech</title>
    <link rel="stylesheet" href="style.css">
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; font-family: Arial, sans-serif; background-color: #0d1b2a; color: #f0f4f8; display: flex; min-height: 100vh; }
        .main-content { flex: 1; padding: 40px; }
        .card { background: rgba(255,255,255,0.1); backdrop-filter: blur(10px); border: 1px solid rgba(173,216,255,0.25); border-radius: 14px; padding: 20px 25px; margin-bottom: 15px; }
        .card small { color: rgba(255,255,255,0.5); }
        a.action { color: #a8c6ff; text-decoration: none; margin-right: 10px; font-size: 0.85rem; }
        a.action.delete { color: #ff8080; }
    </style>
</head>
<body>
    <?php require_once 'includes/sidebar.php'; ?>

    <div class="main-content">
        <h2>Job Applications</h2>
        <?php if ($applications->num_rows === 0): ?>
            <p>No applications yet.</p>
        <?php endif; ?>
        <?php while ($row = $applications->fetch_assoc()): ?>
            <div class="card">
                <strong><?php echo htmlspecialchars($row['name']); ?></strong>
                (<?php echo htmlspecialchars($row['email']); ?>)<br>
                <small>Applied for: <?php echo htmlspecialchars($row['job_title']); ?> — <?php echo $row['date_applied']; ?></small>
                <p><?php echo nl2br(htmlspecialchars($row['message'])); ?></p>
                <a class="action" href="<?php echo htmlspecialchars($row['resume_path']); ?>" target="_blank">View Resume</a>
                <a class="action delete" href="applications.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('Delete this application?');">Delete</a>
            </div>
        <?php endwhile; ?>
    </div>
</body>
</html>