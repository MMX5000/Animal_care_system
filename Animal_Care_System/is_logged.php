<?php
    // If the status of the user is not set
    if (!isset($_SESSION['employee'])){
        // Redirect to to login page
        header("Location: ./no_login.php");
    }
?>