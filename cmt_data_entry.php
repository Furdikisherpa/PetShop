<?php
require_once "Database/connection.php";

$name = $_POST['name'];
$email = $_POST['email'];
$number = $_POST['contact_no'];
$comment = $_POST['comment'];

try{
$query = "INSERT INTO feedback(username, email, contact_no, comment) VALUES (?,?,?,?)";
$stmt = $conn->prepare($query);
$stmt->execute([$name, $email, $number, $comment]);
header("Location:contact.php");
}
catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
}
?>