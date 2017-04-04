<?php
<<<<<<< HEAD
    require 'index_login.php';
    $firstname = $_SESSION['firstname'];
=======
require 'index_login.php';
$username = $_SESSION['username'];
$firstname = $_SESSION['firstname'];
?>

<!DOCTYPE html>
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
        <title>Search User</title>
        <link rel ="stylesheet" type ="text/css" href="form_page.css"/>
        <link rel ="stylesheet" type ="text/css" href="menu_nav.css" />
        
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
