<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?> - SidrahTech</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="<?php echo $bodyClass; ?>">

    <<header>
    <img src="images/logo.png" alt="SidrahTech Logo" class="header-logo">
    <button class="hamburger" onclick="document.getElementById('mainNav').classList.toggle('show')">
        &#9776;
    </button>
    <nav id="mainNav">
        <a href="<?php echo $basePrefix; ?>#home">Home</a>
        <a href="<?php echo $basePrefix; ?>#about">About Us</a>
        <a href="services.php">Services</a>
        <a href="careers.php">Careers</a>
    </nav>
</header>