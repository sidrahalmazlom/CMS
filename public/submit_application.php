<?php
require_once '../config/db.php';

$job_id = $_POST['job_id'];
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];


$allowed_types = ['application/pdf'];
$max_size = 5 * 1024 * 1024; 

if (!isset($_FILES['resume']) || $_FILES['resume']['error'] !== UPLOAD_ERR_OK) {
    die("Resume upload failed. Please try again.");
}

if (!in_array($_FILES['resume']['type'], $allowed_types)) {
    die("Invalid file type. Please upload PDF only.");
}

if ($_FILES['resume']['size'] > $max_size) {
    die("File too large. Maximum size is 5MB.");
}


$ext = pathinfo($_FILES['resume']['name'], PATHINFO_EXTENSION);
$unique_name = uniqid('resume_') . '.' . $ext;
$destination = 'uploads/resumes/' . $unique_name;

move_uploaded_file($_FILES['resume']['tmp_name'], $destination);


$stmt = $conn->prepare("INSERT INTO Application (job_id, name, email, message, resume_path, date_applied) VALUES (?, ?, ?, ?, ?, NOW())");
$stmt->bind_param("issss", $job_id, $name, $email, $message, $destination);
$stmt->execute();

header("Location: careers.php?applied=1");
exit();
?>