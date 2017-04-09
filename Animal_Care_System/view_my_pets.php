<?php require "connection.php";
require "index_login.php";
require "print_pets.php";
$clientid = $_SESSION['id'];
$firstname = $_SESSION['firstname'];
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
        <title>My Pets</title>
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
           
        <div id ="menu_nav" class ="menu_nav">
            <a href="javascript:void(0)" class="close_btn" onclick="close_nav()">&times;</a>
            <span>Hello <?php echo$firstname ?>!</span>
            <a href="user_home.php"> Home</a>
            <a href="view_my_pets.php">View Pets</a>
            <a href="user_pet_appointments.php">Appointments</a>
            <a href="logout.php">Logout</a>
        </div>  
            <?php 
                // Id of the user.  Can be swapped to _POST if code needs
                $id = (int)$clientid;
                // Creates the query we are using.  In this case, we are getting all relavant pet information and species from the species table.
                $query = "SELECT PetId, Pet.Name, species.Name AS Species, Breed, Sex, Color, Weight, LastVisitDate FROM pet JOIN species ON pet.speciesId = species.speciesId WHERE clientId = $id";
                // Creates the result array
                $result = mysqli_query($conn, $query);
                printPets($result, $conn);
            ?>    
   </body>
</html>
