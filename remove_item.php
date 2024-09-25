<?php

session_start();


if(isset($_POST['delete_cart_item'])){

    foreach($_SESSION['cart'] as $key => $value){
        if($value['id'] == $_POST['remove_item_id']){
            unset($_SESSION['cart'][$key]);

            $_SESSION['items_in_cart_id'] = array_diff($_SESSION['items_in_cart_id'], array($value['id']) );
            $_SESSION['items_in_cart_id'] = array_values($_SESSION['items_in_cart_id']);
            header("Location:cart_display.php");
        }
    }
}

?>