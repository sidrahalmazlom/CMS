<?php
// manage_users.php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
if ($_SESSION['role'] !== 'Admin') {
    die("Access denied. Admins only.");
}
require_once '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add'])) {
    $hashed = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO User (name, email, password, role) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $_POST['name'], $_POST['email'], $hashed, $_POST['role']);
    $stmt->execute();
}

if (isset($_GET['delete'])) {
    $stmt = $conn->prepare("DELETE FROM User WHERE id = ?");
    $stmt->bind_param("i", $_GET['delete']);
    $stmt->execute();
    header("Location: manage_users.php");
    exit();
}

$users = $conn->query("SELECT id, name, email, role FROM User ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Users - SidrahTech</title>
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; font-family: Arial, sans-serif; background-color: #0d1b2a; color: #f0f4f8; display: flex; min-height: 100vh; }
        .sidebar { width: 220px; background: rgba(255,255,255,0.06); backdrop-filter: blur(10px); border-right: 1px solid rgba(173,216,255,0.2); padding: 25px 15px; }
        .sidebar h2 { font-size: 1.1rem; color: #cfe2ff; margin-top: 0; }
        .sidebar a { display: block; color: rgba(255,255,255,0.85); text-decoration: none; padding: 10px 12px; border-radius: 8px; margin-bottom: 6px; font-size: 0.9rem; }
        .sidebar a:hover { background: rgba(255,255,255,0.1); }
        .main-content { flex: 1; padding: 40px; }
        .card { background: rgba(255,255,255,0.1); backdrop-filter: blur(10px); border: 1px solid rgba(173,216,255,0.25); border-radius: 14px; padding: 25px 30px; margin-bottom: 25px; }
        input, select { width: 100%; padding: 8px; margin-top: 5px; margin-bottom: 15px; border-radius: 6px; border: 1px solid rgba(255,255,255,0.3); background: rgba(255,255,255,0.08); color: white; box-sizing: border-box; }
        button { background: rgba(52,120,246,0.4); color: white; border: 1px solid rgba(173,216,255,0.4); padding: 8px 18px; border-radius: 6px; cursor: pointer; }
        button:hover { background: rgba(52,120,246,0.6); }
        table { width: 100%; border-collapse: collapse; }
        th, td { text-align: left; padding: 10px; border-bottom: 1px solid rgba(255,255,255,0.1); }
        a.action { color: #ff8080; text-decoration: none; font-size: 0.85rem; }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>SidrahTech</h2>
        <a href="dashboard.php">Dashboard Home</a>
        <a href="manage_services.php">Manage Services</a>
        <a href="manage_jobs.php">Manage Jobs</a>
        <a href="messages.php">Messages</a>
        <a href="manage_users.php">Manage Users</a>
        <a href="logout.php" style="color:#ff8080;">Log Out</a>
    </div>

    <div class="main-content">
        <div class="card">
            <h2>Add New Editor</h2>
            <form method="POST">
                <label>Name:</label>
                <input type="text" name="name" required>
                <label>Email:</label>
                <input type="email" name="email" required>
                <label>Password:</label>
                <input type="password" name="password" required>
                <label>Role:</label>
                <select name="role">
                    <option value="Editor">Editor</option>
                    <option value="Admin">Admin</option>
                </select>
                <button type="submit" name="add">Add User</button>
            </form>
        </div>

        <div class="card">
            <h2>All Users</h2>
            <table>
                <tr><th>Name</th><th>Email</th><th>Role</th><th>Actions</th></tr>
                <?php while ($row = $users->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td><?php echo htmlspecialchars($row['role']); ?></td>
                    <td>
                        <?php if ($row['id'] != $_SESSION['user_id']): ?>
                            <a class="action" href="manage_users.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('Delete this user?');">Delete</a>
                        <?php else: ?>
                            <em style="color:rgba(255,255,255,0.4); font-size:0.85rem;">(you)</em>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endwhile; ?>
            </table>
        </div>
    </div>
</body>
</html>