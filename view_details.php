<?php
require_once "Database/connection.php";

if (isset($_GET['id'])) {
    $productId = $_GET['id'];
    $query = "SELECT * FROM food WHERE id = :id";
    $statement = $conn->prepare($query);
    $statement->bindValue(':id', $productId);
    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC);

    if (!$result) {
        $errorMessage = "Product not found.";
    }
} else {
    $errorMessage = "Product ID not provided.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
    <link rel="stylesheet" href="Css/style.css">
    <link rel="stylesheet" href="Css/view_details.css">
</head>
<body>
    <?php require_once "header.php"; ?>

    <div class="container">
    <?php if (isset($result)) : ?>
        <div class="Title">
        <h2><?php echo $result['name']; ?> </h2>
        </div>

        <div class="price">
        <h4>Price</h4>
        <p>Rs.<?php echo $result['price']; ?> <p>
        </div>

        <div class="weight">
        <h4>Weight</h4>
        <p><?php echo $result['weight']; ?> grams <p>
        </div>

        <div class="image-container">
            <img src="pimages/<?php echo $result['image']; ?>" width="350px" height="500px">
        </div>
        <div class="desc">
            <h4>Details</h4>
        <p><?php echo $result['Details']; ?></p>
        <h4>Ingredients and Analysis</h4>
        <p><?php echo $result['Ingredints']; ?></p>
        <h4>Shipping</h4>
        <p><?php echo $result['shipping']; ?></p>
        </div>

        <!-- Form for adding to cart -->
        <!-- Form for adding to cart -->
<form action="add_to_cart.php" method="post">
    <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
    <input type="hidden" name="name" value="<?php echo $result['name']; ?>">
    <input type="hidden" name="price" value="<?php echo $result['price']; ?>">
    <input type="hidden" name="quantity_available" value="<?php echo $result['Quantity']; ?>">
    <div class="quantity">
        <label for="quantity">Quantity:</label>
        <input type="number" id="Quantity" name="Quantity" value="1" min="1" max="<?php echo $result['Quantity']; ?>">
    </div>
    <div class="add_to_cart">
        <?php if (!in_array($result['id'], (isset($_SESSION['items_in_cart_id'] )) ? $_SESSION['items_in_cart_id'] : [])) : ?>
            <input type="submit" name="add_to_cart" value="Add to Cart">
        <?php else : ?>
            <input type="submit" name="add_to_cart" value="Added" disabled>
        <?php endif; ?>
    </div>
</form>
   

    <?php elseif (isset($errorMessage)) : ?>
        <p><?php echo $errorMessage; ?></p>
    <?php else : ?>
        <p>Product details not available.</p>
    <?php endif; ?>
    </div>

    <?php require_once "footer.php"; ?>

</body>
</html>
