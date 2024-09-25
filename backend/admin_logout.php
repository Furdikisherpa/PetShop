<?php
// Start or resume session
session_start();

// Unset specific session variables related to admin authentication
unset($_SESSION['admin_loggedin']);
unset($_SESSION['admin_username']);

// Destroy the session completely
session_destroy();

// Redirect the admin to the login page or any other desired page after logout
header("Location: adminform.php"); // Update the location as needed
exit();
?>
