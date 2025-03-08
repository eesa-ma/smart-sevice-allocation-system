<?php
$host = "127.0.0.1:3307";
$user = "root";      
$password = "";      
$database = "smartservice"; 

// Create connection
$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
