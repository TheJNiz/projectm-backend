<?php
$servername = "127.0.0.1";
$username = "id4922234_root";
$password = "Password123";
$dbname = "projectm";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>