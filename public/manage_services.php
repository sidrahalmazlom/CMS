<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
require_once '../config/db.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $stmt = $conn->prepare("INSERT INTO Service (title, description, user_id) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $title, $description, $_SESSION['user_id']);
    $stmt->execute();
}


if (isset($_GET['delete'])) {
    $stmt = $conn->prepare("DELETE FROM Service WHERE id = ?");
    $stmt->bind_param("i", $_GET['delete']);
    $stmt->execute();
    header("Location: manage_services.php");
    exit();
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $stmt = $conn->prepare("UPDATE Service SET title = ?, description = ? WHERE id = ?");
    $stmt->bind_param("ssi", $_POST['title'], $_POST['description'], $_POST['id']);
    $stmt->execute();
    header("Location: manage_services.php");
    exit();
}

$editRow = null;
if (isset($_GET['edit'])) {
    $stmt = $conn->prepare("SELECT * FROM Service WHERE id = ?");
    $stmt->bind_param("i", $_GET['edit']);
    $stmt->execute();
    $editRow = $stmt->get_result()->fetch_assoc();
}

$services = $conn->query("SELECT * FROM Service ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Services - SidrahTech</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="admin-page">
    <div class="sidebar">
        <h2>SidrahTech</h2>
        <a href="dashboard.php">Dashboard Home</a>
        <a href="manage_services.php">Manage Services</a>
        <a href="manage_jobs.php">Manage Jobs</a>
        <a href="messages.php">Messages</a>
        <a href="applications.php">Applications</a>
        <?php if ($_SESSION['role'] === 'Admin'): ?>
            <a href="manage_users.php">Manage Users</a>
        <?php endif; ?>
        <a href="logout.php" style="color:#ff8080;">Log Out</a>
    </div>

    <div class="main-content">
        <div class="card">
            <h2><?php echo $editRow ? "Edit Service" : "Add New Service"; ?></h2>
            <form method="POST">
                <?php if ($editRow): ?>
                    <input type="hidden" name="id" value="<?php echo $editRow['id']; ?>">
                <?php endif; ?>
                <label>Title:</label>
                <input type="text" name="title" value="<?php echo $editRow ? htmlspecialchars($editRow['title']) : ''; ?>" required>
                <label>Description:</label>
                <textarea name="description" rows="3" required><?php echo $editRow ? htmlspecialchars($editRow['description']) : ''; ?></textarea>
                <button type="submit" name="<?php echo $editRow ? 'update' : 'add'; ?>">
                    <?php echo $editRow ? "Save Changes" : "Add Service"; ?>
                </button>
            </form>
        </div>

        <div class="card">
            <h2>All Services</h2>
            <table>
                <tr><th>Title</th><th>Description</th><th>Actions</th></tr>
                <?php while ($row = $services->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['title']); ?></td>
                    <td><?php echo htmlspecialchars($row['description']); ?></td>
                    <td>
                        <a class="action" href="manage_services.php?edit=<?php echo $row['id']; ?>">Edit</a>
                        <a class="action delete" href="manage_services.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('Delete this service?');">Delete</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </table>
        </div>
    </div>
</body>
</html>