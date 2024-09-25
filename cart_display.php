<?php

session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once "Database/connection.php";

// Check if user is logged in
if (isset($_SESSION['loggedin'])) {
    


// Retrieve customer ID from session
$customer_id = $_SESSION['cid'];
}
// Query to retrieve order history for the customer
$sql = "SELECT * FROM orders WHERE cid = :cid ORDER BY order_date DESC";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":cid", $customer_id);
$stmt->execute();
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Css/cart_display.css">
    <link rel="stylesheet" href="Css/style.css">
    <style>
    body{
        font-family:cursive;
    }
    </style>
</head>

<body>
    <?php require_once "header.php" ?>

    <div class="container-fluid">


            <?php if(!empty($_SESSION['cart'])) { ?>

        <!--display cart-->
                <table class="table">
                    <thead>
                        <tr>
                        <th>Id</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $total = 0; ?>
                        <?php foreach ($_SESSION['cart'] as $key => $value) { ?>
                            <tr>
                            <td><?php echo $value['id']; ?></td>
                                <td><?php echo $value['name']; ?></td>
                                <td><?php echo $value['price']; ?></td>
                                <td><?php echo $value['Quantity']; ?></td>
                                <td class="col-1">
                                    <form action="remove_item.php" method="post">
                                        <input type="hidden" name="remove_item_id" value="<?php echo $value['id'];?>">
                                        <input type="submit" name="delete_cart_item" value="Remove">
                                    </form>
                                </td>
                                <?php $total += $value['Quantity'] * $value['price'];?>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <p>Total: <?php echo $total; ?></p>
                <?php $_SESSION['total'] = $total; ?>
                    <?php if( ($total >= 70) && isset($_SESSION['loggedin']) ){ ?>
                        <a href="checkout.php">
                            <button class="pay_btn">Pay</button>
                        </a>
                    <?php } else if( ($total < 70) && isset($_SESSION['loggedin']) ) { ?>
                        <button class="" disabled read only>Pay</button>
                        <span id="emsg">Amount must be greater than 70 to pay</span>
                    <?php } else { ?>
                        <a href="loginform.php">
                        <button class="btn_login">Login to Pay</button>
                        </a>
                    <?php } ?>

                    <br><br>
                    <?php if(isset($_SESSION['cart'])) {?>
                    <a href="clear_cart.php">
                        <button class="btn_clear" >Clear All</button>
                    </a>
                    <?php } ?>
        


        <?php } else { ?>
        <div class="row">
            <div class="col-12">
                <p class="h1" id="title">No Items Added in Cart 
                    <a href="index.php"><img src="site_image/arrow.png" alt="" id="bck_image"></a>
                </p>
            </div>
        </div>
        <?php } ?>


    </div>

<div>
    <h1>Cart History</h1> 
    <?php


// Display order history
if ($orders) {
    foreach ($orders as $order) {  
        echo "Order ID: " . $order['order_id'] . "<br>";
        echo "Product ID: " . $order['product_id'] . "<br>";
        echo "Product Name: " . $order['product_name'] . "<br>";
        echo "Quantity: " . $order['Quantity'] . "<br>";
        echo "total: $" . $order['total'] . "<br>";
        echo "Order Date: " . $order['order_date'] . "<br>";
        echo "Status: " ;
        if ($order['status']==1)
        {
            echo"delivered" . "<br> <br>";
        }
        else
        {
            echo "Pending" . "<br> <br>";
        }
        // echo "Status: " . $order['status'] . "<br><br>";
    }
} else {
    echo "No orders found.";
}
 



// Close database connection
$conn = null;
?>

</div>
</body>

</html>