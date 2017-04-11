<?php
    // If the status of the user is not set
    if (!isset($_SESSION['employee'])){
        // Redirect to to login page
        header("Location: ./no_login.php");
    }
    // If the logged in user is NOT a employee
    if($_SESSION['employee'] == -1){
        // Redirect to to login page
        header("Location: ./no_login.php");
    }
?>