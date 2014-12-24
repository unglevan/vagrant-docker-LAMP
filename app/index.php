<?php
// echo phpinfo();
$servername = "192.168.36.10";
$username = "root";
$password = "mypass";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully <br />";
echo "servername: " . $servername;
