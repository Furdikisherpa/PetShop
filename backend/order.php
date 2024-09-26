<?php
session_start(); // Start or resume session

if (!isset($_SESSION['admin_loggedin']) || $_SESSION['admin_loggedin'] !== true) {
    // If not logged in, redirect to login page
    header("Location: ../index.php");
    exit;
}


require_once "../Database/connection.php";

// Function to return the status as "Pending" or "Delivered"
function getStatus($status) {
    if ($status == 1) {
        return "Delivered";
    } else {
        return "Pending";
    }
}

$query = "SELECT * FROM Orders";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);


// Function to update the status
function updateStatus($orderId, $status) {
    global $conn;
    $query = "UPDATE Orders SET status = :status WHERE order_id = :order_id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':order_id', $orderId);
    $stmt->execute();
}

// Check if the status needs to be updated
if (isset($_POST['order_id']) && isset($_POST['status'])) {
    updateStatus($_POST['order_id'], $_POST['status']);
    // Redirect back to the same page after updating the status
    header("Location: {$_SERVER['PHP_SELF']}");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Css/dashboard_side.css">
    <link rel="stylesheet" href="Css/admin_dashboard.css">
    <style>
        table {
            margin-top: 120px;
            border-collapse: collapse;
            width: 100%;
        }
        
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 25px;
        }
        
        th {
            background-color: gold;
            color: black;
            font-size:19px;
        }
    </style>
</head>
<body>
    <?php require_once "dashboard_side.php" ?>
    <div class="content">
        <!-- Main content of your dashboard page goes here -->
        <h1>Welcome to the Order page</h1>
        <table border=1>
            <thead>
            <tr>
                <!-- <th>Order Id</th> -->
                <th>C_Id</th>
                <th>Customer Name</th>
                <th>Address</th>
                <th>P_Id</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $single) { ?>
                <tr>
                    <!-- <td>php echo $single["order_id"]; ?></td> -->
                    <td><?php echo $single["cid"]; ?></td>
                    <td><?php echo getCustomerDetails($single["cid"])['full_name']; ?></td>
                    <td><?php echo getCustomerDetails($single["cid"])['address']; ?></td>
                    <td><?php echo $single["product_id"]; ?></td>
                    <td><?php echo $single["product_name"]; ?></td>
                    <td><?php echo $single["total"]; ?></td>
                    <td><?php echo $single["Quantity"]; ?></td>
                    <td><?php echo getStatus($single["status"]); ?></td>
                    <td>
                        <?php if ($single["status"] == 0) { ?>
                            <form method="POST">
                                <input type="hidden" name="order_id" value="<?php echo $single['order_id']; ?>">
                                <input type="hidden" name="status" value="1">
                                <button type="submit">Mark as Delivered</button>
                            </form>
                        <?php } ?>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</body>
</html>

<?php
// Function to fetch customer details based on customer ID
function getCustomerDetails($cid) {
    global $conn;
    $query = "SELECT cid, full_name, address FROM registration WHERE cid = :cid";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':cid', $cid);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return ($row) ? $row : array('cid' => 'N/A', 'full_name' => 'N/A', 'Address' => 'N/A'); // Return customer details or 'N/A' if not found
}
?>
