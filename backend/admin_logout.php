<?php
// Start or resume session
session_start();

//CHeck if user is logged in
if(isset($_SESSION['admin_loggedin']) && $_SESSION['admin_loggedin'] === true){
    // If logged in, unset or destry session variables
    $_SESSION = array(); //Clear all session variables
    session_destroy();//Destroy the session

    //Redirect to the home page or any other page after logout
    header("Location: ../index.php");
    exit();
} else {
    // If not logged in, do nothing
    header("Location: ../index.php");
    exit();
}


?>
