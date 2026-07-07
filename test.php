<?php
require_once 'config/db.php';

$result = $conn->query("SHOW TABLES");

if ($result) {
    echo "<br>Tables in database:<br>";
    while ($row = $result->fetch_array()) {
        echo $row[0] . "<br>";
    }
} else {
    echo "Query failed: " . $conn->error;
}
?>