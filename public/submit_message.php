<?php
require_once '../config/db.php';

$name = $_POST['name'];
$email = $_POST['email'];
$content = $_POST['message'];

$stmt = $conn->prepare("INSERT INTO Message (name, email, content, date_sent) VALUES (?, ?, ?, NOW())");
$stmt->bind_param("sss", $name, $email, $content);
$stmt->execute();

header("Location: index.html#contact");
exit();
?>