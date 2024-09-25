<?php
// Start or resume session
session_start();

// Check if user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // If not logged in, redirect to login page
    header("Location: loginform.php");
    exit;
}

// Include the database connection file
require_once "Database/connection.php";

// User details stored in session
$username = $_SESSION['username'];

// Fetch additional user details from the database
$sql = "SELECT full_name, username, address, contact_no, email FROM registration WHERE username = :username";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':username', $username);
$stmt->execute();
$userDetails = $stmt->fetch(PDO::FETCH_ASSOC);

// Check if user details were found
if ($userDetails) {
    $full_name = $userDetails['full_name'];
    $address = $userDetails['address'];
    $contact_no = $userDetails['contact_no'];
    $email = $userDetails['email'];
} else {
    // Handle the case where user data is not found (optional)
    $full_name = $address = $contact_no = $email = 'N/A';
}

// Close the database connection
$conn = null;
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
    <?php require_once "header.php"; ?>
    
    <div class="container">
        <div class="profile-card">
            <h2>User Profile</h2>
            <p>Welcome, <?php echo htmlspecialchars($full_name); ?>!</p>
            
            <!-- Display user details -->
            <p><strong>Username:</strong> <?php echo htmlspecialchars($username); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
            <p><strong>Address:</strong> <?php echo htmlspecialchars($address); ?></p>
            <p><strong>Contact No:</strong> <?php echo htmlspecialchars($contact_no); ?></p>

            <!-- Logout and Update Buttons -->
            <a href="logout.php" class="btn-logout">Logout</a>
            <a href="updateform.php" class="btn-update">Update Profile</a> <!-- New update button -->
        </div>
    </div>
</body>
</html>


