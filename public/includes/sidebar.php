<div class="mobile-topbar">
    <button class="hamburger" onclick="document.querySelector('.sidebar').classList.toggle('show')">
        &#9776;
    </button>
    <h2>SidrahTech</h2>
</div>

<div class="sidebar">
    <h2>SidrahTech</h2>

    <a href="dashboard.php">Dashboard Home</a>
    <a href="manage_services.php">Manage Services</a>
    <a href="manage_jobs.php">Manage Jobs</a>
    <a href="applications.php">Applications</a>
    <a href="messages.php">Messages</a>

    <?php if ($_SESSION['role'] === 'Admin'): ?>
        <a href="manage_users.php">Manage Users</a>
    <?php endif; ?>

    <a href="logout.php" class="logout">Log Out</a>
</div>