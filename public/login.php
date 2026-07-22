<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - SidrahTech</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="login-page">

    <div class="login-card">

        <div class="brand-header">
            <img src="images/logo.png" alt="SidrahTech Logo" class="brand-logo">
            <p class="brand-name">SidrahTech</p>
        </div>

        <h3>Admin / Editor Login</h3>

        <?php if (isset($_GET['error'])): ?>
            <p class="error">Invalid email or password.</p>
        <?php endif; ?>

        <form action="auth.php" method="POST">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Log In</button>
        </form>

    </div>

</body>
</html>