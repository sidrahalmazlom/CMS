<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Careers - SidrahTech</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="public-page">

    <header>
        <nav>
            <a href="index.html#home">Home</a>
            <a href="index.html#about">About Us</a>
            <a href="services.html">Services</a>
            <a href="careers.html">Careers</a>
        </nav>
        <img src="images/logo.png" alt="SidrahTech Logo" class="header-logo">
    </header>

    <main>
       <?php require_once '../config/db.php'; ?>

<h2>Open Positions</h2>
<div class="card-grid">
    <?php
    $jobs = $conn->query("SELECT * FROM Job ORDER BY id DESC");
    while ($row = $jobs->fetch_assoc()):
    ?>
    <div class="glass-card">
        <h3><?php echo htmlspecialchars($row['title']); ?></h3>
        <p><?php echo htmlspecialchars($row['description']); ?></p>
        <p><small>Posted: <?php echo $row['posted_date']; ?></small></p>
    </div>
    <?php endwhile; ?>
</div>
    </main>

    <footer class="simple">
        <p>&copy; 2026 SidrahTech. All rights reserved.</p>
    </footer>

</body>
</html>