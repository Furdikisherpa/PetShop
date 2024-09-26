<?php
require_once '../Database/connection.php';

print_r($_POST);
$delete_id = $_POST['deleteid']; //data from hidden field

$query = "DELETE FROM registration where cid = ? ";
$stmt = $conn->prepare($query);
$stmt ->execute([$delete_id]);
header("Location:customer.php");
?>