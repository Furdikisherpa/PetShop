<?php
require_once "../Database/connection.php";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Css/dashboard_side.css">
    <link rel="stylesheet" href="Css/admin_dashboard.css">
    <link rel="stylesheet" href="Css/contactform.css">
</head>
<body>
    <?php require_once "dashboard_side.php" ?>

        <div class="content">
        <h1>Welcome to the Contact page</h1>
        <form action="contact.php" method="post">
        <input type="text" placeholder="Enter Your Shop address" name="address"><br>
        <input type="text" placeholder="Enter Your shop Contact Number" name="contact_number"><br>
        <input type="text" placeholder="Enter Your Shop Email" name="email"><br>
        <textarea name="message" id="msg" cols="60" rows="10" placeholder="Enter Your Messsage To Contact Area"></textarea><br>
        <input type="submit" class="submit" Value="SUBMIT">
        </form>
        </div>
    </body>

    </html>