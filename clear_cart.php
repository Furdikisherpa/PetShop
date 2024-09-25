<?php
session_start();

unset($_SESSION['cart']);
unset($_SESSION['items_in_cart_id']);
header('Location:cart_display.php');

?>