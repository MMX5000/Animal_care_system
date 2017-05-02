<?php session_start() ?>
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
        <link rel ="stylesheet" type ="text/css" href="user_home.css"> </link>
        <script src ="jquery-3.1.1.js"> </script>
        <script src="menu_nav.js"> </script>
    </head>
    
    
    <body>
        <div class ="container"> 
        <div class="title_header">
        </div>
            <?php
                require_once 'sidebar.php';
                require_once 'is_logged.php';
                if (!isset($_SESSION["petId"])) {
                    // Get the Pet id from the request
                    $_SESSION["petId"] = $_POST['petId'];
                }
				// Get the Pet id from the request
                $petId = $_SESSION['petId'];
				// Create the table headers
				echo "<table class = 'med_table'><tr><th>Pet Id</th><th>Visit Id</th><th>Date</th><th>Medication Id</th><th>Drug Name</th><th>Dosage</th><th>Form</th><th>Quantity</th><th>Instructions</th></tr>";
				// Create the query for all medications for this petId
				$query = "SELECT  DISTINCT PetId, v.VisitId,  StartDate as 'Date', MedicationId, Name as 'Drug Name', Dosage, DrugForm as 'Drug Form', Quantity, Instructions FROM Visit v JOIN ProcedureVisit pv ON v.VisitId = pv.VisitId JOIN Medication m ON pv.VisitId = m.VisitId JOIN Drug d ON m.DrugId = d.DrugId WHERE PetId = $petId;";
				// Get the result
				$result = mysqli_query($conn, $query);
                // While there are more medications
                while($row = mysqli_fetch_array($result)){
                    print "<tr>";
                    for($i=0; $i < 9; $i++){
                        echo "<td>$row[$i]</td>";
                    }
                    echo "</tr>";
                }
                echo "</table>";                
            ?>
    
   </body>
</html>
