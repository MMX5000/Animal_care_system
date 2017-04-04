<?php
require 'index_login.php';
$username = $_SESSION['username'];
$firstname = $_SESSION['firstname'];
if(!isset($_SESSION['username'])){
header("Location: index.php");
}
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
        
        <style>
            
            
        </style>
        <script src ="menu_nav.js"> </script>
    </head>
    <body>
        <div class="title_header">
           <h1> <span onclick="open_nav()">&#9776</span>Animal Care System</h1>
        </div>
            
         <div id ="menu_nav" class ="menu_nav">
            <a href="javascript:void(0)" class="close_btn" onclick="close_nav()">&times;</a>
             <span>Welcome <?php echo "$firstname";?>! </span>
             <a href="employee_home.php"> Home</a>
            <a href="schedulePage.php">Schedule</a>
            <a href="new_animal.php">Register Animal</a>
            <a href="new_user.php">Register User</a>
            <a href ="search_user.php">Search</a>
            <a href="logout.php">Logout</a>
        </div>
            
       
    </body>
</html>
