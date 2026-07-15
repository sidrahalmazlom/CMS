<?php
session_start();
require_once '../config/db.php';

$email = $_POST['email'];
$password = $_POST['password'];

$stmt = $conn->prepare("SELECT id, name, password, role FROM User WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    if (password_verify($password, $user['password'])) {
        // Correct password — start the session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['role'] = $user['role'];

        header("Location: dashboard.php");
        exit();
    }
}

// If we reach here, login failed
header("Location: login.php?error=1");
exit();
?>