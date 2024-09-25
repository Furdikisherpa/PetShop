<?php
// Start or resume session
session_start();

// Check if the user is logged in
if (isset($_SESSION['admin_loggedin']) && $_SESSION['admin_loggedin'] === true) {
    
    // Unset all session variables
    $_SESSION = array();

    // Destroy the session completely
    session_destroy();
    
    // Remove session cookie to ensure session is logged out everywhere
    setcookie(session_name(), '', time() - 3600, '/');

    // Redirect to home page or login page after logout
    header("Location: ../index.php");
    exit();
} else {
    // If not logged in, redirect to the home page
    header("Location: ../index.php");
    exit();
}
?>
