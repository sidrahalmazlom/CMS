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

    <span class="apply-toggle" onclick="document.getElementById('applyForm<?php echo $row['id']; ?>').classList.toggle('show')">
        Apply Now
    </span>

    <div id="applyForm<?php echo $row['id']; ?>" class="apply-form">
        <form action="submit_application.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="job_id" value="<?php echo $row['id']; ?>">

            <label>Name:</label>
            <input type="text" name="name" required>

            <label>Email:</label>
            <input type="email" name="email" required>

            <label>Message:</label>
            <textarea name="message" rows="3"></textarea>

            <label>Resume (PDF ):</label>
            <input type="file" name="resume" accept=".pdf" required>

            <button type="submit">Submit Application</button>
        </form>
    </div>
</div>
<?php endwhile; ?>
</div>
    </main>

    <footer class="simple">
        <p>&copy; 2026 SidrahTech. All rights reserved.</p>
    </footer>

</body>
</html>