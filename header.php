<div class="space"></div>
<div class="header">
    <a href="Index.php">Home</a>
    <a href="about.php">About</a>
    <a href="contact.php">Contact</a>
    <?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
        // If user is logged in, display "Profile" button
        echo '<a href="profile.php"><button class="btn_profile">Profile</button></a>';
    } else if (isset($_SESSION['admin_loggedin']) && $_SESSION['admin_loggedin'] === true) {
        // Display admin-related links
         header("Location: backend/admin_dashboard.php");
         exit();
    } 
    else {
        // If not logged in, display both User and Admin login buttons
        echo '<a href="loginform.php"><button class="btn_login_User">User</button></a>';
        echo '<a href="backend/adminform.php"><button class="btn_login_Admin">Admin</button></a>';
    }
    ?>
    <a href="cart_display.php"><button class="btn_cart"><img src="images/cart.png" alt="" width="25px"></button></a>
    <a href="shop.php"><button class="btn_shop">Shop Now</button></a>
</div>
<div class="logo">
    <img src="images/petshoplogo1.png" alt="" width="400px">
</div>
