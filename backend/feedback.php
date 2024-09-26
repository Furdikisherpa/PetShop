<?php
session_start(); // Start or resume session

if (!isset($_SESSION['admin_loggedin']) || $_SESSION['admin_loggedin'] !== true) {
    // If not logged in, redirect to login page
    header("Location: ../index.php");
    exit;
}


require_once '../Database/connection.php';
$query = "SELECT * FROM feedback";
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
        .icons img{
            margin-top:-450px;
            margin-left: 350px;
        }
    table {
        margin-top:120px;
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
        <h1>Welcome to the Feedback page</h1>
        <table border= "1" border-collapse="collapse" >
            <thead>
            <tr>
                <th>User Id</th>
                <th>Username</th>
                <th>Email</th>
                <th>Contact number</th>
                <th>Comment</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $single) { ?>
                <tr>
                    <td>
                        <?php echo $single["id"]; ?>
                    </td>
                    <td>
                        <?php echo $single["username"]; ?>
                    </td>
                    <td>
                        <?php echo $single["email"]; ?>
                    </td>
                    <td>
                        <?php echo $single["contact_no"]; ?>
                    </td>
                    <td>
                        <?php echo $single["Comment"]; ?>
                    </td>
                </tr>
                
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>