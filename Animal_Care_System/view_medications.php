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
				//$petId = $_GET['petId']; //later when have connected
				$petId = '7002';
				// Create the table headers
				echo "<table class = 'user_table'><tr><th>Pet Id</th><th>Visit Id</th><th>Date</th><th>Medication Id</th><th>Drug Name</th><th>Dosage</th><th>Form</th><th>Quantity</th><th>Instructions</th></tr>";
				// Create the query for all medications for this petId
				$query = "SELECT PetId, v.VisitId,  StartDate as 'Date', MedicationId, Name as 'Drug Name', Dosage, DrugForm as 'Drug Form', Quantity, Instructions FROM Visit v JOIN ProcedureVisit pv ON v.VisitId = pv.VisitId JOIN Medication m ON pv.VisitId = m.VisitId JOIN Drug d ON m.DrugId = d.DrugId WHERE PetId = $petId;";
				// Get the result
				$result = mysqli_query($conn, $query);

                // While there are more medications
                while($row = mysqli_fetch_array($result)){
                    print "<tr>";
                    echo "<td><a href=\"view_all_visit.php?id=$row[0]\">$row[0]</td>";
                    for($i=1; $i < 9; $i++){
                        echo "<td>$row[$i]</td>";
                    }
                    echo "</tr>";
                }
                echo "</table>";                
            ?>
    
   </body>
</html>
