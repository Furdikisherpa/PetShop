<?php
session_start(); // Start or resume session

// Check if user is logged in
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // If logged in, unset or destroy session variables
    $_SESSION = array(); // Clear all session variables
    session_destroy(); // Destroy the session

    // Redirect to the home page or any other page after logout
    header("Location: index.php");
    exit();
} else {
    // If user is not logged in, redirect to the home page or any other page
    header("Location: index.php");
    exit();
}
?>
