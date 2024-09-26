<?php
session_start(); // Start or resume session

if (!isset($_SESSION['admin_loggedin']) || $_SESSION['admin_loggedin'] !== true) {
    // If not logged in, redirect to login page
    header("Location: ../index.php");
    exit;
}


require_once "../Database/connection.php";
$query = "SELECT * FROM registration";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
        <h1>Welcome to the Customer page</h1>
        
        <table border=1>
            <thead>
            <tr>
                <th>User Id</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Address</th>
                <th>Contact_no</th>
                <th>Email</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $single) { ?>
                <tr>
                    <td>
                        <?php echo $single["cid"]; ?>
                    </td>
                    <td>
                        <?php echo $single["full_name"]; ?>
                    </td>
                    <td>
                        <?php echo $single["username"]; ?>
                    </td>
                    <td>
                        <?php echo $single["address"]; ?>
                    </td>
                    <td>
                        <?php echo $single["contact_no"]; ?>
                    </td>
                    <td>
                        <?php echo $single["email"]; ?>
                    </td>
                </tr>
                
                <?php } ?>
            </tbody>
        </table>
    </div>

</body>
</html>