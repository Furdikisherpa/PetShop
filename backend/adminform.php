<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="Css/adminform.css"> <!-- Assuming you have a CSS file for styling -->
</head>
<body>
    <div class="container">
        <h2>Admin Login</h2>
        <?php
        // Check if an error message is passed in the URL (e.g., login failed)
        if (isset($_GET['error']) && $_GET['error'] == 1) {
            echo '<p style="color: red;">Invalid username or password. Please try again.</p>';
        }
        ?>
        <form action="admin_login.php" method="post">
            <div class="form-group">
                <label for="admin_username">Admin Username:</label>
                <input type="text" id="admin_username" name="admin_username" required>
            </div>
            <div class="form-group">
                <label for="admin_password">Admin Password:</label>
                <input type="password" id="admin_password" name="admin_password" required>
            </div>
            <button type="submit">Login</button> <br><br>
            <a href="../loginform.php">Back to User</a>
            
        </form>
    </div>
</body>
</html>
