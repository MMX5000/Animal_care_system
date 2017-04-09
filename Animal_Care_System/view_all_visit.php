<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php require "connection.php" ?>
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
            <a href="user_home.php"> Home</a>
            <a href="view_my_pets.php">View Pets</a>
            <a href="user_pet_appointments.php">Appointments</a>
            <a href="">Logout</a>
        </div>  
        
        
            
            <?php 
                // Get the Pet id from the request
                $petId = $_GET['petId'];
                // Create the table headers
                echo "<table class = 'user_table'><tr><th>Visit Id</th><th>Pet Id</th><th>Start Date</th><th>Start Time</th><th>End Date</th><th>End Time</th></tr>";
                // Create the query for all visits for this pet
                $query = "SELECT Visitid, PetId, StartDate, StartTime, EndDate, EndTime FROM visit where petid = $petId";
                // Get the result
                $result = mysqli_query($conn, $query);
                // While there are more visits
                while($row = mysqli_fetch_array($result)){
                    print "<tr>";
                    // Prints out the visit date and creates a link for the visit
                    echo "<td><a href=\"view_visit.php?visitid=$row[0]\">$row[0]</td>";
                    // For all other fields
                    for($i=1; $i < 6; $i++){
                        // Fill them out
                        echo "<td>$row[$i]</td>";
                    }
                    // End this line
                    echo "</tr>";
                }
                // End the table
                echo "</table>";                
            ?>
    
   </body>
</html>
