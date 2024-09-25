<?php
session_start(); // Start or resume session

require_once "Database/connection.php"; // Include the database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve username and password from the form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Query to check if the username exists
    $sql = "SELECT * FROM registration WHERE username = :username";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":username", $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Verify the hashed password
        if (password_verify($password, $user['password'])) {
            // Set session variables to indicate user is logged in
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email']; // Add email to session
            $_SESSION['cid'] = $user['cid'];
            
            // Redirect to index.php
            header("Location: index.php");
            exit(); // Make sure to exit after redirecting
        } else {
            // Set an error message for incorrect password
            $_SESSION['error_message'] = "Incorrect password.";
            // Redirect to registrationform.php
            header("Location: loginform.php");
            exit();
        }
    } else {
        // Set an error message for non-existent user
        $_SESSION['error_message'] = "User does not exist.";
        header("Location: loginform.php");
        exit();
    }
} else {
    echo "Access denied.";
}

// Close the database connection
$conn = null;
?>
