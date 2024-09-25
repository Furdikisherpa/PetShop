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

// Get the posted data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['full_name'];
    $address = $_POST['address'];
    $contact_no = $_POST['contact_no'];
    $email = $_POST['email'];
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $username = $_SESSION['username']; // Username is stored in session

    // Fetch the current password hash from the database
    $sql = "SELECT password FROM registration WHERE username = :username";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user || !password_verify($current_password, $user['password'])) {
        // If the current password is incorrect, show an error
        $_SESSION['error_message'] = "Current password is incorrect!";
        header("Location: updateform.php");
        exit;
    }

    // Prepare SQL update statement
    $sql = "UPDATE registration 
            SET full_name = :full_name, address = :address, contact_no = :contact_no, email = :email";

    // If the new password is provided, update it
    if (!empty($new_password)) {
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $sql .= ", password = :password";
    }

    $sql .= " WHERE username = :username";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':full_name', $full_name);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':contact_no', $contact_no);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':username', $username);

    // If updating the password, bind the password parameter
    if (!empty($new_password)) {
        $stmt->bindParam(':password', $hashed_password);
    }

    if ($stmt->execute()) {
        // Update session details and redirect to profile
        $_SESSION['success_message'] = "Profile updated successfully!";
        header("Location: profile.php");
        exit;
    } else {
        $_SESSION['error_message'] = "An error occurred while updating profile.";
        header("Location: updateform.php");
        exit;
    }
} else {
    // Redirect if the form is not submitted
    header("Location: profile.php");
    exit;
}
?>
