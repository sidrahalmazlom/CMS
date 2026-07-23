<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Services - SidrahTech</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="public-page">

   <?php
$pageTitle = "Services";
$basePrefix = "index.php";
require_once 'includes/header.php';
require_once '../config/db.php';
?>

    <main>
<h2>What We Offer</h2>
<div class="card-grid">
    <?php
    $services = $conn->query("SELECT * FROM Service ORDER BY id DESC");
    while ($row = $services->fetch_assoc()):
    ?>
    <div class="glass-card">
        <h3><?php echo htmlspecialchars($row['title']); ?></h3>
        <p><?php echo htmlspecialchars($row['description']); ?></p>
    </div>
    <?php endwhile; ?>
</div>
    </main>

<?php require_once 'includes/footer.php'; ?>

</body>
</html>