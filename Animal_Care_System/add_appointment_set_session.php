<?php
    require_once 'sidebar.php';
    //require_once 'is_employee.php';
    $_SESSION['date'] = $_GET['date'];
    header("location: ./add_appointment.php");
?>