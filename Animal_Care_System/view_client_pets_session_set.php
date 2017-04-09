<?php
    session_start();
    $_SESSION['client_id'] = $_GET['id'];
    header("location: ./view_client_pets.php");
?>