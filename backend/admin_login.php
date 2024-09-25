<?php
session_start(); // Start or resume session

// Include database connection file
require_once "../Database/connection.php";

// Ensure the request method is POST to prevent direct access
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Retrieve username and password from the form
    $admin_username = $_POST["admin_username"];
    $admin_password = $_POST["admin_password"];

    // Query to check if the admin username and password match
    $sql = "SELECT * FROM admin WHERE admin_username = :admin_username AND admin_password = :admin_password";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":admin_username", $admin_username);
    $stmt->bindParam(":admin_password", $admin_password);
    $stmt->execute();
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($admin) {
        // Set session variables to indicate admin is logged in
        $_SESSION['admin_loggedin'] = true;
        $_SESSION['admin_username'] = $admin['admin_username'];

        // Redirect to admin dashboard or any other page after login
        header("Location: admin_dashboard.php");
        exit(); // Make sure to exit after redirecting
    } else {
        // If login fails, redirect back to the admin login page with an error message
        header("Location: admin_login.php?error=1");
        exit();
    }
} else {
    // If access method is not POST, redirect back to the admin login page
    header("Location: admin_login.php");
    exit();
}
?>
