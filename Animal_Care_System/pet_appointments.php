<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php require_once "sidebar.php"?>
<?php require_once "connection.php" ?>
<?php require_once 'is_logged.php'?>
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
            <?php 
                //Id of the user.  Can be swapped to _POST if code needs
                $date = $_GET['date'];
                // Creates the query we are using.  In this case, we are getting all relavant pet information and species from the species table.
				$query = "SELECT c.ClientId, FirstName, LastName, HomePhone, CellPhone, WorkPhone, Email, a.AppointmentId, StartDate, StartTime, ProcedureName FROM client c JOIN appointment a ON c.ClientId = a.ClientId JOIN appointmentprocedurecode apc ON a.AppointmentId = apc.AppointmentId JOIN procedurecode pc ON apc.CodeId = pc.CodeId WHERE StartDate = '$date'";
				echo "<table><tr><th>Client Id</th><th>Client First Name</th><th>Client Last Name</th><th>Home Phone</th><th>Cell Phone</th><th>Work Phone</th><th>Email</th><th>Appointment ID</th><th>Start Date</th><th>Start Time</th><th>Procedure Name</th></tr>";
                // Creates the result array
                $result = mysqli_query($conn, $query);
                // As long as the result still has more to go
                while($row = mysqli_fetch_array($result)){
                    // Create a new row
                    print "<tr>";
                    // And for each element in the array
                    for($i=0; $i < 11; $i++){
                        //Print out the element in its own spot  
                        echo "<td>$row[$i]</td>";
                    }
                    // End the table row
                    echo "</tr>";
                }
                // End the table
                echo "</table>";                
            ?>
   </body>
</html>
