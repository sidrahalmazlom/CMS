<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - SidrahTech</title>
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #0d1b2a;
            color: #f0f4f8;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .login-card {
            background: rgba(255, 255, 255, 0.09);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(173, 216, 255, 0.25);
            border-radius: 14px;
            padding: 40px;
            width: 320px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.25);
        }
        .brand-header {
            text-align: center;
            margin-bottom: 25px;
        }
        .brand-logo {
            height: 100px;
            width: auto;
            padding: 12px;
        }
        .brand-name {
            margin: 12px 0 0 0;
            font-size: 1.3rem;
            font-weight: 600;
            color: #f7f7f7;
            letter-spacing: 0.5px;
        }
        .login-card h3 {
            text-align: center;
            margin-top: 0;
            color: #eeeeee;
        }
        label {
            font-size: 0.85rem;
            color: rgba(255,255,255,0.8);
        }
        input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 18px;
            border-radius: 6px;
            border: 1px solid rgba(255,255,255,0.3);
            background: rgba(255,255,255,0.08);
            color: white;
        }
        button {
            width: 100%;
            background: rgba(52, 120, 246, 0.4);
            color: white;
            border: 1px solid rgba(173, 216, 255, 0.4);
            padding: 10px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
        }
        button:hover {
            background: rgba(52, 120, 246, 0.6);
        }
        .error {
            color: #ff8080;
            font-size: 0.85rem;
            text-align: center;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

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