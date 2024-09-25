<?php

require_once "../Database/connection.php";

$address = $_POST['address'];
$contact_number = $_POST['contact_number'];
$contact_email = $_POST['email'];
$msg = $_POST['message'];

try {
        $query = "INSERT INTO contact (address, contact_number, contact_email, Message) 
                  VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->execute([$address, $contact_number, $contact_email, $msg,]);
        // echo "Product added successfully.";
        header("Location: contactform.php");
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

?>    