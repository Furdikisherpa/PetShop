<?php
session_start(); // Start or resume session

if (!isset($_SESSION['admin_loggedin']) || $_SESSION['admin_loggedin'] !== true) {
    // If not logged in, redirect to login page
    header("Location: ../index.php");
    exit;
}



require_once '../Database/connection.php';
 $id = $_POST['editid'];
 $name= $_POST['fullname'];
 $username= $_POST['username'];
 $email= $_POST['email'];
 $password = $_POST['password'];


 $query = "UPDATE registration SET full_name = ?, username = ?, email=?, password = ? WHERE id=? ";
 $stmt = $conn->prepare($query);
 $stmt->execute([$name, $username, $email, $password, $id]);
 header("Location: customer.php");
?>