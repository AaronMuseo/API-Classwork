<?php
$servername = "localhost";
$username   = "root";        // change if not root
$password   = "your_mysql_password"; 
$dbname     = "API";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "✅ DB connected successfully<br>";
}
?>
