<?php
session_start(); // Start or resume session

if (!isset($_SESSION['admin_loggedin']) || $_SESSION['admin_loggedin'] !== true) {
    // If not logged in, redirect to login page
    header("Location: ../index.php");
    exit;
}



require_once '../Database/connection.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the product ID from the form data
    $product_id = $_POST['product_Id'];

    // Get the image name for deletion
    $image_name = $_POST['iname'];

    // Prepare and execute the DELETE query
    $query = "DELETE FROM food WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->execute([$product_id]);

    // Delete the associated image file
    unlink("../pimages/{$image_name}");

    // Redirect back to the product list page
    header("Location: add_food_product.php");
    exit(); // Make sure to exit after redirecting
} else {
    // If the form is not submitted, redirect back to the product list page
    header("Location: add_food_product.php");
    exit(); // Make sure to exit after redirecting
}
?>
