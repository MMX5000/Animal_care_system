<?php require "connection.php";
require "index_login.php";?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $_SESSION['firstname'];echo"'s ";?> Pets</title>
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
                $visitid = $_GET['visitid'];
                // Create the table headers
                echo "<table class ='user_table'><tr><th>Procedure Id</th><th>Procedure Name</th><th>Employee Id</th><th>Procedure Start date</th><th>Procedure Start Time</th><th>Procedure End Date</th><th>Procedure End Time</th><th>Procedure Summary</th></tr>";
                // Create this insane query that combines the visit, visitprocedure, procedure, and procedurecode tables into one place with aliases
                $query = "select v.visitid, petId, v.startdate AS 'Visit Start Date', v.StartTime AS 'Visit Start Time', v.endDate AS 'Visit End Date', v.endTime AS 'Visit End Time', p.procedureId, pc.procedureName, p.employeeid, p.StartDate AS 'Procedure Start Date', p.StartTime AS 'Procedure Start Time', p.enddate AS 'Procedure End Date', p.endtime AS 'Procedure End Time', p.summary from visit v JOIN procedurevisit pv ON v.visitid = pv.visitid JOIN procedures p ON p.procedureId = pv.procedureId JOIN procedurecode pc ON p.codeId = pc.codeId WHERE v.visitid = $visitid";
                // Get the result
                $result = mysqli_query($conn, $query);
                // While there are more procedures
                while($row = mysqli_fetch_array($result)){
                    print "<tr>";
                    // Create the first row wiht a link forward
                    echo "<td><a href=\"view_my_pets.php?id=$row[6]\">$row[6]</td>";
                    // For all other fields
                    for($i=7; $i < 14; $i++){
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
