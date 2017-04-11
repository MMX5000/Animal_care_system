<?php require "connection.php";
require "index_login.php";
require_once 'is_logged.php';
require "print_pets.php";
$clientid = $_SESSION['client_id'];
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
        <link rel ="stylesheet" type ="text/css" href="user_home.css"> </link>
        <script src ="jquery-3.1.1.js"> </script>
        <script src="menu_nav.js"> </script>
    </head>
    <body>
        <div class ="container"> 
        <div class="title_header">
        </div>
           
            <?php 
                require_once("sidebar.php");
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
