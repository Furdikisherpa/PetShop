<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Css/dashboard_side.css">
    <link rel="stylesheet" href="Css/admin_dashboard.css">
    <link rel="stylesheet" href="Css/create_food_product.css">
</head>
<body>
    <?php require_once "dashboard_side.php" ?>

        <div  class="content">
        <h2>CREATE FOOD PRODUCT</h2>
        <form action="add_food_data.php" method="post" enctype="multipart/form-data">
        <input type="text" placeholder="Food name" name="name" pattern="[A-Za-z\s]{1,50}"  title="Please enter a valid name (letters and spaces only)" required><br>
    <input type="text" placeholder="Price" Min="1" name="price" pattern="[0-9]+" title="Please enter a valid price (numbers only)" required><br>
    <input type="text" placeholder="Weight" Min="1" name="weight" pattern="[0-9]+" title="Please enter a valid weight (numbers only)" required><br>
    <input type="text" placeholder="Quantity" Min="1" name="quantity" pattern="[0-9]+" title="Please enter a valid quantity (numbers only)" required><br>
    <input type="text" placeholder="Details"  name="details" required><br>
    <input type="text" placeholder="Ingredients and Analysis"  name="ingredients" required><br>
    <input type="text" placeholder="Shipping & Returns" name="shipping" required><br>
    <input type="file" name="image" required><br>
    <input type="submit" class="btn btn-primary mb-3" Value="SUBMIT">
</form>

    </div>
</body>
</html>