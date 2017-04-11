<?php
    session_start();
    $_SESSION['visit_id'] = $_GET['visitid'];
    header("location: ./view_visit.php");
?>