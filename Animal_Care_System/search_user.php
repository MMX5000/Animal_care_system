<?php
require 'index_login.php';
require_once 'is_employee.php';

$username = $_SESSION['username'];
$firstname = $_SESSION['firstname'];
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Search User</title>
        <script src ="jquery-3.1.1.js"></script>
        <script src ="search_user.js"> </script>
        <script src ="menu_nav.js"> </script>
        <script src = "search_fields.js"></script>
        <style>
             html,body
            { 
                margin:0;
                height:100%;
            }
            .bg{
                background-image:url(images/search_user_image.jpg);
                height:100%;
                background-size:cover;
                background-position:center;
                background-repeat: no-repeat;
            }
        </style>
    </head>
    <body class = 'bg'>
        <?php require_once 'sidebar.php'; ?>
        <div class ="form_layout">
            <form id = "user_form" method="get" action="select_user_results.php">
               <h2 id = "search">Search</h2>
               <input type="text" name="fname" placeholder="First Name" /><br>
               <input type="text" name="lname" placeholder="Last Name"/><br>
               <input type="text" name="email" placeholder ="Email" /><br>
               <input type="text" name ="username" placeholder="Username"/><br>
               <input type ="text" name="user_id" placeholder="User ID" /><br>
               <input type ="text" name="animal_id" placeholder ="Animal ID"/><br>
               <input type="submit" name ="search_btn" value="Search"/><br>
               <input type ="reset" name = "reset_btn" value="Reset"/>
            </form>
        </div>
    </body>
</html>
