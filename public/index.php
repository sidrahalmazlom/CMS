<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SidrahTech</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
$pageTitle = "Home";
$basePrefix = "";
require_once 'includes/header.php';
require_once '../config/db.php';
?>
    <section id="home" style="padding:0; max-width:none;">
        <div class="hero">
            <div class="hero-caption">
                <p>Welcome to SidrahTech</p>
                 <p>technology solutions built to move your business forward.</p>
            </div>
        </div>
    </section>

    <section id="about">
        <h2>About Us</h2>
        <div class="card-grid">
            <div class="glass-card">
                <h3>Who We Are</h3>
                <p>Our company was founded with the goal of delivering high-quality solutions to our customers.</p>
            </div>
            <div class="glass-card">
                <h3>Our Mission</h3>
                <p>To provide excellent service and build long-lasting relationships with our clients.</p>
            </div>
            <div class="glass-card">
                <h3>Our Vision</h3>
                <p>To become a leading company recognized for innovation and reliability.</p>
            </div>
        </div>
    </section>

        <?php require_once '../config/db.php'; ?>

<section id="services">
    <div class="section-inner">
        <h2>Our Services</h2>
        <div class="card-grid">
            <?php
            $services = $conn->query("SELECT * FROM Service ORDER BY id DESC LIMIT 3");
            while ($row = $services->fetch_assoc()):
            ?>
            <div class="glass-card">
                <h3><?php echo htmlspecialchars($row['title']); ?></h3>
                <p><?php echo htmlspecialchars($row['description']); ?></p>
            </div>
            <?php endwhile; ?>
        </div>
        <div class="view-more-wrap">
            <a href="services.php" class="view-more-btn">View More Services &rarr;</a>
        </div>
    </div>
</section>

   <section id="careers">
    <div class="section-inner">
        <h2>Careers</h2>
        <div class="card-grid">
            <?php
            $jobs = $conn->query("SELECT * FROM Job ORDER BY id DESC LIMIT 3");
            while ($row = $jobs->fetch_assoc()):
            ?>
            <div class="glass-card">
                <h3><?php echo htmlspecialchars($row['title']); ?></h3>
                <p><?php echo htmlspecialchars($row['description']); ?></p>
            </div>
            <?php endwhile; ?>
        </div>
        <div class="view-more-wrap">
            <a href="careers.php" class="view-more-btn">View More Careers &rarr;</a>
        </div>
    </div>
</section>

    <footer>
        <span class="contact-toggle" onclick="document.getElementById('contactForm').classList.toggle('show')">
            Contact Us
        </span>

        <div id="contactForm">
            <form action="submit_message.php" method="POST">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="4" required></textarea>

                <button type="submit">Send Message</button>
            </form>
        </div>

        <p class="copyright">&copy; 2026 SidrahTech. All rights reserved.</p>
    </footer>

</body>
</html>