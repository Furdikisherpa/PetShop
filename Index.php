<?php
require_once "Database/connection.php";

$query = "SELECT * FROM food LIMIT 4";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="Css/style.css" rel="stylesheet">
    <link href="Css/shop.css" rel="stylesheet">
    <link href="Css/footer.css" rel="stylesheet">
    <title>Pet Shop</title>
</head>
<body>
    <?php require_once "header.php"?>
    <div class="index_image">
        <img src="images/icons.png" alt="" style=" margin-left:600px;">
        <img src="images/feeding.png" alt="">
    </div>
    <div class="content">
    <div class="abt">
        <img src="images/dog.png" alt="">
    <h2>Welcome to Pet Shop!</h2>
    <p>
    At Pet Shop, we understand that your pets are more than just animals - they're 
    cherished members of your family. That's why we're dedicated to providing the highest quality pet 
    food products to keep your furry friends healthy, happy, and thriving.
    </p>
    <h2>Our Mission:</h2>

    <p>
    At Pet Shop, our mission is simple: to offer premium pet food products that prioritize 
    the health and well-being of your pets. We believe that every pet deserves the best nutrition possible, 
    which is why we carefully select each product in our inventory to meet the highest standards of quality 
    and nutrition.
    </p>
    </div>
    
    <div class="food">
        <h2>Food Product</h2>
        <div class="product-container">
    <table>
        <tr>
            <?php foreach ($result as $single) : ?>
                <td>
                    <div class="product-item">
                        <div class="product-image">
                            <a href="view_details.php?id=<?php echo $single['id']; ?>">
                            <img src="pimages/<?php echo $single['image']; ?>" alt="<?php echo $single['image']; ?>">
                            </a>
                        </div>
                        <div class="product-name">
                            <a href="view_details.php?id=<?php echo $single['id']; ?>"><?php echo $single['name']; ?></a>
                        </div>
                        <div class="product-details">
                            <div class="product-price">
                                <a href="view_details.php?id=<?php echo $single['id']; ?>"><?php echo $single['price']; ?></a>
                            </div>
                            <!-- <button>Add to cart</button> -->
                        </div>
                    </div>
                </td>
            <?php endforeach; ?>
        </tr>
    </table>
</div>

    </div>
    </div>

    <div class="location">
    <img src="images/pin.png" alt="">
    <h2>Location</h2>
    <p>427, Lamtagin Marg, Baluwatar, Kathmandu</p>
    </div>
    </div>

    
    
    <?php require_once "footer.php" ?>


   
</body>
</html>