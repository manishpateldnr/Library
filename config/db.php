<?php
// Database configuration
$host = "localhost";  // or your database host
$user = "root";   // your database username
$password = ""; // your database password
$dbname = "library"; // your database name

// Create connection
$con = mysqli_connect($host, $user, $password, $dbname);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
