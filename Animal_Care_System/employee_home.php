<?php
session_start();
require 'appointment_functions.php';
$username = $_SESSION['username'];
$firstname = $_SESSION['firstname'];
if(!isset($_SESSION['username'])){
header("Location: index.php");
}
date_default_timezone_set("America/New_York");
$currentDate = date("Y-m-d");
$day = date("l");
$next_day = date('Y-m-d',strtotime("+1 day"));
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Employee Home page.</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" type="text/css" href ="menu_nav.css"/>
        <link rel = "stylesheet" type = "text/css" href ="employee_home.css" />
        <script src ="menu_nav.js"> </script>
    </head>
    <body>
        <div class="title_header">
            <?php require_once 'sidebar.php'?>
        </div>
        <h2>Today's Appointments <?php echo $currentDate ?>: </h2>
        <div class ="appointment_div">

            <?php appointment_by_date($currentDate);?>

        </div>
    <br>

       <h2>Tomorrow's Appointments <?php echo"$next_day" ?>: </h2>
    <div class = "appointment_div">

            <?php appointment_by_date($next_day); ?>

    </div>
       
    </body>
</html>
