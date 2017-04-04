<?php
    require 'index_login.php';
    $firstname = $_SESSION['firstname'];
<<<<<<< HEAD
=======

>>>>>>> foxBranch
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
      <head>
        <meta charset="UTF-8">
        <title>Schedule Page</title>
        <link rel="stylesheet" type="text/css" href="form_page.css"/>
         <link rel ="stylesheet" type="text/css" href="menu_nav.css"/> 
         <link rel="stylesheet" type ="text/css" href="schedulePage.css"/>
        <script src ="jquery-3.1.1.js"> </script>
        <script src= "new_animal.js"> </script>
        <script src ="menu_nav.js"> </script>
        <script src ="schedulePage.js"> </script>
        <style>
            body
            { 
                background-color: #ffffff;
                margin:0;
           
            }
        </style>
    </head>
    <body>
        
         <div class="title_header">
           <h1> <span onclick="open_nav()">&#9776</span>Animal Care System</h1>
        </div>
            
        <div id ="menu_nav" class ="menu_nav">
            <a href="javascript:void(0)" class="close_btn" onclick="close_nav()">&times;</a>
            <span>Hello <?php echo "$firstname";?>! </span>
            <a href="employee_home.php"> Home</a>
            <a href="schedulePage.php">Schedule</a>
            <a href="new_animal.php">Register Animal</a>
            <a href="new_user.php">Register User</a>
            <a href ="search_user.php">Search</a>
            <a href="logout.php">Logout</a>
        </div>
        
        <div class ="month">
             <button type ="button" name="prev">&#10094;</button>
            <ul>
               <li id ="month">
                    <span id = "current_month"></span><br>
                <span style="font-size:18px">2017</span>
                </li>
            </ul>
           <button type ="button" name="next">&#10095;</button>
        </div>
         <div class ="weekdays">
             
            
        </div>
            
        <div class ="days">


        </div>
        
        
        
    </body>
</html>
