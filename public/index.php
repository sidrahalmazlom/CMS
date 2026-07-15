<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SidrahTech</title>
    <style>
        * {
            box-sizing: border-box;
        }
        html {
            scroll-behavior: smooth;
        }
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #0d1b2a;
            color: #f0f4f8;
        }

        /* ---- Glass Header ---- */
        header {
            background: rgba(30, 60, 114, 0.35);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            color: white;
            padding: 18px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 100;
            border-bottom: 1px solid rgba(255,255,255,0.15);
        }
       .header-logo {
    height: 40px;
    width: auto;
}
        nav {
            display: flex;
            gap: 25px;
        }
        nav a {
            color: rgba(255,255,255,0.9);
            text-decoration: none;
            font-size: 0.95rem;
            font-weight: 500;
            border-bottom: 2px solid transparent;
            padding-bottom: 4px;
            transition: color 0.2s ease;
        }
        nav a:hover {
            color: white;
            border-bottom: 2px solid white;
        }

        /* ---- Hero Section ---- */
        .hero {
            position: relative;
            height: 80vh;
            background-image: url('images/hero-bg.png');
            background-size: cover;
            background-position: center;
        }
        .hero-caption {
            position: absolute;
            bottom: 30px;
            right: 30px;
            background: rgba(13, 27, 42, 0.4);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.2);
            border-radius: 12px;
            padding: 20px 30px;
            max-width: 400px;
        }
        .hero-caption h2 {
            margin: 0 0 8px 0;
            font-size: 2rem;
        }
        .hero-caption p {
            margin: 0;
            font-size: 0.95rem;
            color: rgba(255,255,255,0.85);
        }

        /* ---- Sections ---- */
        section {
            padding: 70px 30px;
            max-width: 1000px;
            margin: 0 auto;
        }
        section h2 {
            text-align: center;
            margin-bottom: 40px;
            font-size: 1.8rem;
        }

        /* ---- Glass Cards ---- */
        .card-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.15);
            border-radius: 14px;
            padding: 25px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.25);
        }
        .glass-card h3 {
            margin-top: 0;
            color: #a8c6ff;
        }
        .glass-card p {
            color: rgba(255,255,255,0.8);
            font-size: 0.95rem;
    
        }
        .view-more-wrap {
    text-align: center;
    margin-top: 30px;
}
.view-more-btn {
    display: inline-block;
    background: rgba(255,255,255,0.1);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    border: 1px solid rgba(255,255,255,0.3);
    color: white;
    text-decoration: none;
    padding: 10px 25px;
    border-radius: 30px;
    font-size: 0.9rem;
    font-weight: 600;
    transition: background 0.2s ease;
}
.view-more-btn:hover {
    background: rgba(255,255,255,0.25);
}

        /* ---- Footer with Contact toggle ---- */
        footer {
            background: rgba(30, 60, 114, 0.5);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-top: 1px solid rgba(255,255,255,0.15);
            padding: 25px 30px;
            text-align: center;
        }
        .contact-toggle {
            color: white;
            font-weight: 600;
            cursor: pointer;
            text-decoration: underline;
        }
        #contactForm {
            display: none;
            max-width: 400px;
            margin: 20px auto 0 auto;
            background: rgba(255,255,255,0.08);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.15);
            border-radius: 12px;
            padding: 20px;
            text-align: left;
        }
        #contactForm.show {
            display: block;
        }
        #contactForm label {
            font-size: 0.85rem;
            color: rgba(255,255,255,0.8);
        }
        #contactForm input,
        #contactForm textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 12px;
            border-radius: 6px;
            border: 1px solid rgba(255,255,255,0.3);
            background: rgba(255,255,255,0.1);
            color: white;
        }
        #contactForm button {
            background: rgba(255,255,255,0.2);
            color: white;
            border: 1px solid rgba(255,255,255,0.4);
            padding: 10px 20px;
            border-radius: 6px;
            cursor: pointer;
            width: 100%;
        }
        #contactForm button:hover {
            background: rgba(255,255,255,0.3);
        }
        .copyright {
            margin-top: 20px;
            font-size: 0.8rem;
            color: rgba(255,255,255,0.6);
        }
    </style>
</head>
<body>

    <header>
    <nav>
        <a href="#home">Home</a>
        <a href="#about">About Us</a>
        <a href="#services">Services</a>
        <a href="#careers">Careers</a>
    </nav>
    <img src="images/logo.png" alt="SidrahTech Logo" class="header-logo">
</header>

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