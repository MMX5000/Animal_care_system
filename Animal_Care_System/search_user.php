<?php

    require 'index_login.php';
    $firstname = $_SESSION['firstname'];
	$username = $_SESSION['username'];
    require_once 'is_employee.php';
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
            body {
                background:url(images/search_user_image.jpg) no-repeat center center fixed;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
                margin:0;

            }
        </style>
    </head>
    <body>
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
