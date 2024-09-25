<?php
require_once '../Database/connection.php';

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize form data
    $name = htmlspecialchars($_POST['name']);
    $price = floatval($_POST['price']);
    $weight = floatval($_POST['weight']);
    $quantity = intval($_POST['quantity']);
    $details = htmlspecialchars($_POST['details']);
    $ingredients = htmlspecialchars($_POST['ingredients']);
    $shipping = htmlspecialchars($_POST['shipping']);

    // Handle file upload
    $targetDir = '../pimages/';
    $targetFile = $targetDir . basename($_FILES['image']['name']);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES['image']['tmp_name']);
    if ($check === false) {
        echo "File is not an image.";
        exit();
    }

    // Check file size
    if ($_FILES['image']['size'] > 5000000) { // 5MB
        echo "Sorry, your file is too large.";
        exit();
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png") {
        echo "Sorry, only JPG, JPEG, PNG files are allowed.";
        exit();
    }

    // Move uploaded file to target directory
    if (!move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
        echo "Sorry, there was an error uploading your file.";
        exit();
    }

    // Insert product details into database
    try {
        $query = "INSERT INTO food (name, price, weight, quantity, details, ingredints, shipping, image) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->execute([$name, $price, $weight, $quantity, $details, $ingredients, $shipping, basename($_FILES['image']['name'])]);
        // echo "Product added successfully.";
        header("Location: add_food_product.php");
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
