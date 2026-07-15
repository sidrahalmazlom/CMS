<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Services - SidrahTech</title>
    <style>
        * {
            box-sizing: border-box;
        }
        body {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    margin: 0;
    font-family: Arial, sans-serif;
    background-color: #0d1b2a;
    color: #f0f4f8;
}
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
        main {
            flex: 1;
            padding: 70px 30px;
            max-width: 1000px;
            margin: 0 auto;
        }
        main h2 {
            text-align: center;
            margin-bottom: 40px;
            font-size: 1.8rem;
        }
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
        footer {
            background: rgba(30, 60, 114, 0.5);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-top: 1px solid rgba(255,255,255,0.15);
            padding: 20px;
            text-align: center;
            font-size: 0.8rem;
            color: rgba(255,255,255,0.6);
        }
    </style>
</head>
<body>

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

    <footer>
        <p>&copy; 2026 SidrahTech. All rights reserved.</p>
    </footer>

</body>
</html>