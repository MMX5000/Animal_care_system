<?php
    if (session_status() != PHP_SESSION_ACTIVE){
        session_start();
    }
    require_once 'is_logged.php';
    if ($_SESSION['employee'] == -1){
        require_once 'client_sidebar.php';
    }
    else{
        require_once 'employee_sidebar.php';
    }
?>