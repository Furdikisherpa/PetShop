<?php
// Database configuration
$host = 'localhost'; // Hostname
$username = 'root'; // Database username
$password = ''; // Database password
$database = 'petshop'; // Database name

try {
    // Attempt to connect to the database using PDO
    $conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    // Set PDO to throw exceptions on errors
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Optionally, you can set the default fetch mode to associative array
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    // Optionally, you can set character encoding to UTF-8
    $conn->exec("set names utf8");
} catch(PDOException $e) {
    // If connection fails, print error message
    die("Connection failed: " . $e->getMessage());
}
?>




