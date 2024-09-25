<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once('Database/connection.php');

if (isset($_SESSION['cart'])) {

    $cid = $_SESSION['cid'];
    $total =  $_SESSION['total'];

    foreach ($_SESSION['cart'] as $key => $value) {
        $pid = $value['id'];
        $pname = $value['name'];
        // $price = $value['price'];
        $quantity = $value['Quantity'];
        $status = 0;
        // Insert the cid along with other values into the orders table
        $query = "INSERT INTO orders (cid, product_id, product_name, total, Quantity, status) VALUES ('$cid', '$pid', '$pname', '$total','$quantity', '$status')";
        $conn->exec($query);

        // $query2 = "UPDATE products SET Quantity = (Quantity - 1) WHERE p_id = '$pid'";
        // $db -> exec($query2);
    }
    unset($_SESSION['cart']);
    unset($_SESSION['items_in_cart_id']);
    // unset($_SESSION['total']);
}

header("refresh:3 url=cart_display.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <style>
        #tq {
            color: rgba(0, 0, 0, 0.607);
            font-weight: 200;
        }
        
        #r1 {
            height: calc(100vh - 100px);
        }
    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="row ps-3 align-items-center" id="r1">
            <div class="col-12">
                <p class="h1 text-center" id="tq">Thank you for your payment of RS <b><?php echo $_SESSION['total']; ?>:)</b></p>
            </div>
        </div>
    </div>

</body>

</html>
