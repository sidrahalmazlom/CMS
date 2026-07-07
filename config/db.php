<?php
$host = "localhost";
$username = "root";
$password = "1234";  // the password you set earlier
$database = "company_cms";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully to the database!";
?>