<?php
session_start();
require_once '../Database/connection.php';
$query = "SELECT * FROM food where id = ?";
$stmt = $conn->prepare($query);
$stmt -> execute([$_POST['id']]);
$result  = $stmt -> fetch();
$_SESSION['id'] = $_POST['id'];

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
    .content form{
    margin-left: 320px;
    margin-top: 100px;
}

input{
    padding: 10px;
    margin-bottom: 5px;
    width: 400px;
    border-radius: 6px;
    font-family: cursive;
}

textarea{
    border-radius: 6px;
}

.content .submit{
    background-color: gold;
    margin-top: 4px;
    width: 427px;
}



.content h2{
    margin-top: 10px;
    margin-left: 200px;
}

.content{
    display: block;
   
}

form{
    margin-left: 200px;
}

.submit{
    background-color: gold;
}

    </style>
</head>
<body>
    <?php require_once "dashboard_side.php" ?>

        <div class="content">
        <h1>Welcome to the Update page</h1>
    <form action="update.php"  method ="post">
        <input type="text" name="name" value = "<?php echo $result ['name'];?>" placeholder="Name" ><br>
        <input type="text" name="price" value = "<?php echo $result ['price'];?>" placeholder="Price" ><br>
        <input type="text" name="weight" value = "<?php echo $result ['weight'];?>" placeholder="Weight" ><br>
        <input type="text" name = "quantity"  value = "<?php echo $result ['Quantity'];?>" placeholder="Quantity" ><br>
        <input type="text" name="details" value = "<?php echo $result ['Details'];?>" placeholder="Details" ><br>
        <input type="text" value = "<?php echo $result ['Ingredints'];?>" placeholder='Ingredients and Analysis' name="ingredients" ><br>
        <input type="text" value = "<?php echo $result ['shipping'];?>" placeholder='Shipping' name="Shipping" ><br>
        <input type="submit" class="submit" value="submit">
    </form>
</div>
</body>
</html>
    </body>

    </html>