<?php
// Start or resume session
session_start();

// Check if user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: loginform.php");
    exit;
}

// Include the database connection file
require_once "Database/connection.php";

// Fetch current user details from the database
$username = $_SESSION['username'];
$sql = "SELECT full_name, address, contact_no, email FROM registration WHERE username = :username";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':username', $username);
$stmt->execute();
$userDetails = $stmt->fetch(PDO::FETCH_ASSOC);

// Handle case if user details were not found
if ($userDetails) {
    $full_name = $userDetails['full_name'];
    $address = $userDetails['address'];
    $contact_no = $userDetails['contact_no'];
    $email = $userDetails['email'];
} else {
    // Redirect or handle the error
    $_SESSION['error_message'] = "User details not found!";
    header("Location: profile.php");
    exit;
}

// Close the connection
$conn = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <link rel="stylesheet" href="Css/updateform.css">
    <link rel="stylesheet" href="Css/style.css">
</head>
<body>
    <?php require_once "header.php"; ?>
    
    <div class="container">
        <div class="update-form">
            <h2>Update Profile</h2>
            <form action="updateprofile.php" method="POST">
                <div class="form-group">
                    <label for="full_name">Full Name:</label>
                    <input type="text" id="full_name" name="full_name" value="<?php echo htmlspecialchars($full_name); ?>" required>
                </div>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" id="address" name="address" value="<?php echo htmlspecialchars($address); ?>" required>
                </div>
                <div class="form-group">
                    <label for="contact_no">Contact No:</label>
                    <input type="text" id="contact_no" name="contact_no" value="<?php echo htmlspecialchars($contact_no); ?>" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
                </div>

                <!-- Add current password for validation -->
                <div class="form-group">
                    <label for="current_password">Current Password:</label>
                    <input type="password" id="current_password" name="current_password" required>
                </div>

                <!-- Add new password field -->
                <div class="form-group">
                    <label for="new_password">New Password:</label>
                    <input type="password" id="new_password" name="new_password">
                </div>

                <button type="submit" class="btn-update">Update Profile</button>
            </form>
        </div>
    </div>
</body>
</html>
