<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "student_mis";

// Create connection
$connection = new mysqli($host, $user, $password, $database);

// Check connection
if ($connection->connect_error) {
    echo "Connection failed: " . $connection->connect_error;
}
echo "Connected successfully!";
?>
