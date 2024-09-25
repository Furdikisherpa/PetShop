<?php 
require_once "Database/connection.php";

$query = "SELECT * FROM contact";
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
    <link rel="stylesheet" href="Css/style.css">
    <link rel="stylesheet" href="Css/contact.css">
</head>
<body>
    <?php require_once "header.php" ?>
    
    <?php foreach($result as $single) {?>
        <div class="icons">
        <img src="images/icons.png" alt="">
    </div>
    <div class="container">
    
        <p><?php echo $single['Message'] ?></p>
        <div class="address">
            <h3>Address</h3>
            <p><?php echo $single['address']?></p>
        </div>
        <div class="contact">
            <h3>Contact Number</h3>
            <p><?php echo $single['contact_number']?></p>
            <h3>Email</h3>
            <p><?php echo $single['contact_email']?></p>
        </div>
    <?php } ?>


    <div class="arrow">
    <img src="images/swirly-arrow.png" alt="" width="200px">
    </div>

    <div class="">
    <form action="cmt_data_entry.php" method="post">
    <input type="text" placeholder="Enter Your Name" name="name" pattern="[A-Za-z\s]{1,50}" title="Please enter a valid name (letters and spaces only)" required><br>
    <input type="email" placeholder="Enter Your Email" name="email" required><br>
    <input type="tel" placeholder="Enter Your Contact Number" name="contact_no" pattern="[0-9]{10}" title="Please enter a valid 10-digit phone number" required><br>
    <textarea name="comment" id="cmt" cols="60" rows="10" placeholder="Enter Your Comment" required></textarea><br>
    <input type="submit" class="submit" value="SUBMIT">
</form>

        </div>
    </div>

    <div class="footer">
    <?php require_once "footer.php" ?>
    </div>
</body>
</html>