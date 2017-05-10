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
        <style>

            input[type = 'submit']{

                color:#ffffff;
                background-color:#48b5f9;
                font-size:16px;
                font-weight:bold;
                padding:12px 20px;
                text-decoration: none;
                text-align: center;
                margin:2px 4px;
                cursor: pointer;
                border-radius:10px;

            }
        </style>
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
                $query = "SELECT PetId, pet.Name, species.Name AS Species, Breed, Sex, Color, Weight, LastVisitDate FROM pet JOIN species ON pet.speciesId = species.speciesId WHERE clientId = $id";
                // Creates the result array
                $result = mysqli_query($conn, $query);
                echo mysqli_error($conn);
		printPets($result, $conn);
            ?>    
   </body>
</html>
