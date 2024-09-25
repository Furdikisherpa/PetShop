<?php 
session_start(); // Start session

// Check if there's an error message to display
if (isset($_SESSION['error_message'])) {
    echo '<script>alert("' . $_SESSION['error_message'] . '");</script>';
    unset($_SESSION['error_message']); // Clear the message after displaying
}

require_once "header.php"; // Move this after session check

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="Css/loginform.css">
    <link rel="stylesheet" href="Css/style.css">
</head>
<body>

<div class="container">
    <h2>Login</h2>
    <form action="login.php" method="post">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Login</button>
        <p>Not registered yet?</p>
        <a href="registrationform.php" class="btn-signup">Sign Up</a>
    </form>
</div>

</body>
</html>
