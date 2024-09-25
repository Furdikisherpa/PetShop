<?php
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