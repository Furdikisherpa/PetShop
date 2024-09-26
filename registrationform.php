<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="Css/registrationform.css">
    <link rel="stylesheet" href="Css/style.css">
    <script>
        // Function to show alert messages
        function showAlert(message) {
            alert(message);
        }
    </script>
</head>
<body>

<?php require_once "header.php"; ?>

<div class="container">
    <h2>Registration Form</h2>
    <form action="register.php" method="post">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" pattern="[A-Za-z\s]{1,50}" title="Please enter a valid name (letters and spaces only)" placeholder="Please enter a valid full name" required>
        </div>
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username"  placeholder="Please enter a username" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$" placeholder="Please enter Email required">
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" pattern="[A-Za-z\s]{1,50}" placeholder="Please enter your Address" required>
        </div>
        <div class="form-group">
            <label for="contact_no">Contact No:</label>
            <input type="text" id="contact_no" name="contact_no" pattern="[0-9]{10}" title="Must contain 10 digit number" placeholder="Enter 10-digit mobile number" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Please enter your password" required>
        </div>
        <button type="submit">Sign Up</button>
        <p>Already registered?</p>
        <a href="loginform.php" class="btn-signup">Login</a>
    </form>
</div>

<?php
if (isset($errorMessage) && $errorMessage) {
    echo "<script>showAlert('$errorMessage');</script>";
}
?>

<?php require_once "footer.php"; ?>
</body>
</html>
