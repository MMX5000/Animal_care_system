<?php
require 'index_login.php';

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
        <meta charset="UTF-8">
        <title>User home page</title>
        <link rel ="stylesheet" type="text/css" href="menu_nav.css"> </link>
        <link rel ="stylesheet" type ="text/css" href="user_home.css"> </link>
        <script src ="jquery-3.1.1.js"> </script>
        <script src="menu_nav.js"> </script>
    </head>
    
    
    <body>
        <div class ="container"> 
       <div class="title_header">
           <h1> <span onclick="open_nav()">&#9776</span>Animal Care System</h1>
        </div>
            <img src ="images/welcome_picture.jpg"></img>
        <div id ="menu_nav" class ="menu_nav">
            <a href="javascript:void(0)" class="close_btn" onclick="close_nav()">&times;</a>
            <span>Welcome <?php echo"$firstname";?>! </span>
            <a href="user_home.php"> Home</a>
            <a href="view_my_pets.php">View Pets</a>
            <a href="user_pet_appointments.php">Appointments</a>
          
            
            <a href="logout.php">Logout</a>
        </div>
        
        
        <div class = "welcome_info">
            <h2>Welcome To Animal Care System!</h2>
            <p>This system is designed to help you as a pet owner look up all informational
                regarding you're pet! Our plan is to keep you up to date on all things regarding
                you're pet, such as prescriptions, visits, scheduled appointments/appointment history,
                and detailed profile on each one of you're pets.
                
            </p>
            </div><!-- end of welcome_info div -->
            <div class ="hours_info">
                <h2>Store Hours</h2>
                <table>
                    <tr>
                        <th>Monday</th>
                        <th>Tuesday</th>
                        <th>Wednesday</th>
                        <th>Thursday</th>
                        <th>Friday</th>
                      
                    </tr>
                    
                    <tr>
                        <td> 9AM - 5PM</td>
                        <td> 9AM - 5PM</td>
                        <td> 9AM - 5PM</td>
                        <td> 9AM - 5PM</td>
                        <td> 9AM - 5PM</td>
                       
                    </tr>
                    
                    
                </table>
                
                <p><i>* We are closed on Saturday and Sunday</i></p>
            </div>
        
            <div class ="location_info">
                <h2>Location</h2>
                <ul>
                    <li><b>Located in: </b>Mayfair Shopping center</li>
                    <li><b>Address: </b> 123 Main St, Kings Park NY 11754</li>
                    <li><b>Phone: </b>631-999-9999</li>
                </ul>
            </div>
        </div>
    </body>
</html>
