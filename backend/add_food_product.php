<?php
session_start(); // Start or resume session

if (!isset($_SESSION['admin_loggedin']) || $_SESSION['admin_loggedin'] !== true) {
    // If not logged in, redirect to login page
    header("Location: ../index.php");
    exit;
}


require_once '../Database/connection.php';
$query = "SELECT * FROM food";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="Css/dashboard_side.css">
    <link rel="stylesheet" href="Css/admin_dashboard.css">
    <link rel="stylesheet" href="Css/add_food_product.css">
    <style>
        /* Additional CSS */
        .addfood {
            display: flex;
            align-items: center;
            margin-top: 100px;
           
        }
        /* .addfood a{
            margin-left:10px;
        } */

        h2 {
            margin-right: 20px; /* Adjust as needed */
            
        }

        
        .btn_add{
            background-color: gold;
            padding: 7px 7px 7px 7px;
            cursor: pointer;
            border-top: 20px;
            /* border-bottom: 10px;
            border-right: px; */
            border-left: 20px;
            border-radius: 4px;
        }

       .table{
        margin-top: 200px;
            width: 1100px;
            margin-left: 260px;
        }
        th{
            font-size: 20px;
            background-color: gold;
            padding: 7px 7px 7px 7px;
        }
    </style>
</head>
<body>
    <?php require_once "dashboard_side.php" ?>
    <div class="content">
        <!-- Main content of your dashboard page goes here -->
        <h1>Welcome to the food Product page</h1>
    
        <div class="addfood">
            <h2>Add New Food Product</h2>
            <a href="create_food_product.php" id="addfood"><button class="btn_add"><img src="../images/plus.png" alt="" heigth="25px" width="25px"></button></a>
            </div>
            </div>

            <div class="table">
            <table border="1" cellspacing="0" border-collapse="collapse">
            <tr>
                <th class="fst-italic text-center ">Id</th>
                <th class="fst-italic text-center">Food Name</th>
                <th class="fst-italic text-center">price</th>
                <th class="fst-italic text-center">weight</th>
                <th class="fst-italic text-center">Quantity</th>
                <th class="fst-italic text-center">Details</th>
                <th class="fst-italic text-center">Ingredients</th>
                <th class="fst-italic text-center">Shipping</th>
                <Th class="fst-italic text-center">Image</Th>
                <Th class="fst-italic text-center">Action</Th>
            </tr>
      <?php foreach ($result as $single){?>
          <tr>
              <td class="text-center">
               <?php echo $single["id"];?>
              </td>
              <td class="text-center">
              <?php echo $single["name"];?>
              </td>
              <td class="text-center">
              <?php echo $single["price"];?>
              </td>
              <td class="text-center">
              <?php echo $single["weight"];?>
              </td>
              <td class="text-center">
              <?php echo $single["Quantity"];?>
              </td >
              <td class="text-center" >
              <?php echo $single["Details"];?>
              </td>
              <td class="text-center" >
              <?php echo $single["Ingredints"];?>
              </td>
              <td class="text-center" >
              <?php echo $single["shipping"];?>
              </td>
              <td  class="text-center">
              <img src="../pimages/<?php echo $single["image"];?>" alt="" heigth="100px" width="100px">
              </td>
              <td >
                <form action="update_data.php" method="post" >
                    <input type="hidden" name="id" value="<?php echo $single["id"];?>">
                    <input type="submit" value="EDIT" id="formedit">
                </form>
                <form action="deleteproduct.php" method="post" id="delete">
                    <input type="hidden" name="product_Id" value="<?php echo $single["id"];?>">
                    <input type="hidden" name="iname" value="<?php echo $single["image"];?>">
                    <input type="submit" value="DELETE" id="formdelete">
                </form>
              </td>
          </tr>
          
          
      <?php } ?>

  
      </table>
      </div>
    </body>
</html>