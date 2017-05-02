<?php
    session_start();

    if(isset($_GET['pro_id'])){
        $_SESSION['pro_id'] = $_GET['pro_id'];
        header("Location:insert_medication.php");
    }
?>