<?php
    if (session_status() != PHP_SESSION_ACTIVE){
        session_start();
    }
    if ($_SESSION['employee'] == -1){
        require_once 'client_sidebar.php';
    }
    else{
        require_once 'employee_sidebar.php';
    }
?>