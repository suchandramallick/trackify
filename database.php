<?php
$host     = "localhost";        // Database host
$username = "your_username";   // Database username
$password = "your_password";   // Database password
$database = "your_database";   // Database name

// Create connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
