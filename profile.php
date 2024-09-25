<?php
// Start or resume session
session_start();

// Check if user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // If not logged in, redirect to login page
    header("Location: loginform.php");
    exit;
}

// If user is logged in, you can retrieve user details from the session or database
// For demonstration purposes, let's assume we have some user details stored in session

// User details stored in session
$username = $_SESSION['username'];
// $email = $_SESSION['email']; // Assuming you store email in session

// Alternatively, you can retrieve user details from the database
// Example: $username = fetch_username_from_database($_SESSION['userid']);

// You can also fetch and display more user information if needed

// Display the user profile
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="Css/profile.css">
    <link rel="stylesheet" href="Css/style.css">
</head>
<body>
    <?php require_once "header.php" ?>
    <div class="container">
        <h2>User Profile</h2>
        <p>Welcome, <?php echo $username; ?></p>
        <a href="logout.php">Logout</a>
        <!-- Display more user information here if needed -->
    </div>
    <?php require_once "footer.php" ?>
</body>
</html>
