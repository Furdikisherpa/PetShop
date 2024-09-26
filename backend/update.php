<?php
session_start();

if (!isset($_SESSION['admin_loggedin']) || $_SESSION['admin_loggedin'] !== true) {
    // If not logged in, redirect to login page
    header("Location: ../index.php");
    exit;
}

require_once '../Database/connection.php';

try{
$query = "UPDATE food SET name=?, price=?, weight=?, Quantity=?, Details=?, Ingredints=?, shipping=? where id = ?";
$stmt = $conn -> prepare($query);
$stmt -> execute([ $_POST['name'], $_POST['price'], $_POST['weight'], $_POST['quantity'], $_POST['details'], $_POST['ingredients'], $_POST['Shipping'], $_SESSION['id']]);
header("Location:add_food_product.php");
}catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>

