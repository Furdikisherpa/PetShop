<?php
session_start(); // Start or resume session

// Check if the admin is logged in, if not redirect to login page
if (isset($_SESSION['admin_loggedin']) && $_SESSION['admin_loggedin'] === true) {
    echo "Logged in as: " . $_SESSION['admin_username'];
} else {
    echo "Not logged in.";
}


require_once "../Database/connection.php";

// Fetch the total users, orders, products, and delivered orders from the database
$query = "SELECT COUNT(*) AS total_users FROM registration";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

$query1 = "SELECT COUNT(*) AS total_orders FROM orders WHERE status=0";
$stmt = $conn->prepare($query1);
$stmt->execute();
$result1 = $stmt->fetchAll(PDO::FETCH_ASSOC);

$query2 = "SELECT COUNT(*) AS total_product FROM food";
$stmt = $conn->prepare($query2);
$stmt->execute();
$result2 = $stmt->fetchAll(PDO::FETCH_ASSOC);

$query3 = "SELECT COUNT(*) AS total_delivered_orders FROM orders WHERE status=1";
$stmt = $conn->prepare($query3);
$stmt->execute();
$result3 = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cute Dashboard</title>
    <link rel="stylesheet" href="Css/admin_dashboard.css"> <!-- Assuming you have a CSS file for styling -->
</head>
<body>
    <?php require_once "dashboard_side.php" ?>
    <div class="content">
        <!-- Main content of your dashboard page goes here -->
        <h1>Welcome to the Dashboard</h1>  
    </div>

    <div class="o_block">
        <p>No. of Order Pending</p>
        <?php foreach ($result1 as $single) { ?>
            <h1><?php echo $single['total_orders']; ?></h1>
        <?php } ?>
    </div>

    <div class="d_block">
        <p>No. of Order Delivered</p>
        <?php foreach ($result3 as $single) { ?>
            <h1><?php echo $single['total_delivered_orders']; ?></h1>
        <?php } ?>
    </div>

    <div class="P_block">
        <p>No. of Products</p>
        <?php foreach ($result2 as $single) { ?>
            <h1><?php echo $single['total_product']; ?></h1>
        <?php } ?>
    </div>

    <div class="c_block">
        <p>Total Customers</p>
        <?php foreach ($result as $single) { ?>
            <h1><?php echo $single['total_users']; ?></h1>
        <?php } ?>
    </div>

</body>
</html>
