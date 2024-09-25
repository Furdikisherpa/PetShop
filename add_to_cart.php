<?php
session_start();



if(isset($_POST['add_to_cart'])){

    $arr = array(
        "id" => $_POST['id'],
        "name" => $_POST['name'],
        "price" => $_POST['price'],
        "Quantity" => $_POST['Quantity']
    );

    $_SESSION['cart'][] = $arr;
    $_SESSION['items_in_cart_id'][] = $_POST['id'];
    header("Location:shop.php");
    

}
?>