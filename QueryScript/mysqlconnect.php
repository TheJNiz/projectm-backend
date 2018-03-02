<?php
$servername = "localhost";
$username = "id4922234_root";
$password = "Password123";
$dbname = "id4922234_projectm";

//localhost connection
/*$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projectm";*/

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>