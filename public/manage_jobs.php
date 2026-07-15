<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
require_once '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add'])) {
    $stmt = $conn->prepare("INSERT INTO Job (title, description, posted_date, user_id) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $_POST['title'], $_POST['description'], $_POST['posted_date'], $_SESSION['user_id']);
    $stmt->execute();
}

if (isset($_GET['delete'])) {
    $stmt = $conn->prepare("DELETE FROM Job WHERE id = ?");
    $stmt->bind_param("i", $_GET['delete']);
    $stmt->execute();
    header("Location: manage_jobs.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $stmt = $conn->prepare("UPDATE Job SET title = ?, description = ?, posted_date = ? WHERE id = ?");
    $stmt->bind_param("sssi", $_POST['title'], $_POST['description'], $_POST['posted_date'], $_POST['id']);
    $stmt->execute();
    header("Location: manage_jobs.php");
    exit();
}

$editRow = null;
if (isset($_GET['edit'])) {
    $stmt = $conn->prepare("SELECT * FROM Job WHERE id = ?");
    $stmt->bind_param("i", $_GET['edit']);
    $stmt->execute();
    $editRow = $stmt->get_result()->fetch_assoc();
}

$jobs = $conn->query("SELECT * FROM Job ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Jobs - SidrahTech</title>
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; font-family: Arial, sans-serif; background-color: #0d1b2a; color: #f0f4f8; display: flex; min-height: 100vh; }
        .sidebar { width: 220px; background: rgba(255,255,255,0.06); backdrop-filter: blur(10px); border-right: 1px solid rgba(173,216,255,0.2); padding: 25px 15px; }
        .sidebar h2 { font-size: 1.1rem; color: #cfe2ff; margin-top: 0; }
        .sidebar a { display: block; color: rgba(255,255,255,0.85); text-decoration: none; padding: 10px 12px; border-radius: 8px; margin-bottom: 6px; font-size: 0.9rem; }
        .sidebar a:hover { background: rgba(255,255,255,0.1); }
        .main-content { flex: 1; padding: 40px; }
        .card { background: rgba(255,255,255,0.1); backdrop-filter: blur(10px); border: 1px solid rgba(173,216,255,0.25); border-radius: 14px; padding: 25px 30px; margin-bottom: 25px; }
        input, textarea { width: 100%; padding: 8px; margin-top: 5px; margin-bottom: 15px; border-radius: 6px; border: 1px solid rgba(255,255,255,0.3); background: rgba(255,255,255,0.08); color: white; box-sizing: border-box; }
        button { background: rgba(52,120,246,0.4); color: white; border: 1px solid rgba(173,216,255,0.4); padding: 8px 18px; border-radius: 6px; cursor: pointer; }
        button:hover { background: rgba(52,120,246,0.6); }
        table { width: 100%; border-collapse: collapse; }
        th, td { text-align: left; padding: 10px; border-bottom: 1px solid rgba(255,255,255,0.1); }
        a.action { color: #a8c6ff; text-decoration: none; margin-right: 10px; font-size: 0.85rem; }
        a.action.delete { color: #ff8080; }
    </style>
</head>
<body>
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
        <div class="card">
            <h2><?php echo $editRow ? "Edit Job" : "Add New Job"; ?></h2>
            <form method="POST">
                <?php if ($editRow): ?>
                    <input type="hidden" name="id" value="<?php echo $editRow['id']; ?>">
                <?php endif; ?>
                <label>Title:</label>
                <input type="text" name="title" value="<?php echo $editRow ? htmlspecialchars($editRow['title']) : ''; ?>" required>
                <label>Description:</label>
                <textarea name="description" rows="3" required><?php echo $editRow ? htmlspecialchars($editRow['description']) : ''; ?></textarea>
                <label>Posted Date:</label>
                <input type="date" name="posted_date" value="<?php echo $editRow ? $editRow['posted_date'] : ''; ?>" required>
                <button type="submit" name="<?php echo $editRow ? 'update' : 'add'; ?>">
                    <?php echo $editRow ? "Save Changes" : "Add Job"; ?>
                </button>
            </form>
        </div>

        <div class="card">
            <h2>All Jobs</h2>
            <table>
                <tr><th>Title</th><th>Description</th><th>Posted</th><th>Actions</th></tr>
                <?php while ($row = $jobs->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['title']); ?></td>
                    <td><?php echo htmlspecialchars($row['description']); ?></td>
                    <td><?php echo $row['posted_date']; ?></td>
                    <td>
                        <a class="action" href="manage_jobs.php?edit=<?php echo $row['id']; ?>">Edit</a>
                        <a class="action delete" href="manage_jobs.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('Delete this job?');">Delete</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </table>
        </div>
    </div>
</body>
</html>