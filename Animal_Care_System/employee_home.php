<?php
require 'index_login.php';
$username = $_SESSION['username'];
$firstname = $_SESSION['firstname'];
if(!isset($_SESSION['username'])){
header("Location: index.php");
}
date_default_timezone_set("America/New_York");
$currentDate = date("Y-m-d");
$day = date("l");
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Employee Home page.</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" type="text/css" href ="menu_nav.css"/>
        <link rel = "stylesheet" type = "text/css" href ="employee_home.css" />
        
        <style>
            
            
        </style>
        <script src ="menu_nav.js"> </script>
    </head>
    <body>
        <div class="title_header">
           <h1> <span onclick="open_nav()">&#9776</span>Animal Care System</h1>
        </div>
            
         <div id ="menu_nav" class ="menu_nav">
            <a href="javascript:void(0)" class="close_btn" onclick="close_nav()">&times;</a>
             <span>Welcome <?php echo "$firstname";?>! </span>
             <a href="employee_home.php"> Home</a>
            <a href="schedulePage.php">Schedule</a>
            <a href="new_animal.php">Register Animal</a>
            <a href="new_user.php">Register User</a>
            <a href ="search_user.php">Search</a>
            <a href="logout.php">Logout</a>
        </div>

        <h2>Today's Appointments <?php echo $currentDate ?>: </h2>
        <div class ="appointment_div">

            <?php

            $query = "SELECT c.ClientId, FirstName, LastName, HomePhone, CellPhone, WorkPhone, Email, a.AppointmentId, StartDate, StartTime, ProcedureName FROM client c JOIN appointment a ON c.ClientId = a.ClientId JOIN AppointmentProcedureCode apc ON a.AppointmentId = apc.AppointmentId JOIN ProcedureCode pc ON apc.CodeId = pc.CodeId WHERE StartDate = '$currentDate'";

            echo "<table><tr><th>Client Id</th><th>Client First Name</th><th>Client Last Name</th><th>Home Phone</th><th>Cell Phone</th><th>Work Phone</th><th>Email</th><th>Appointment ID</th><th>Start Date</th><th>Start Time</th><th>Procedure Name</th></tr>";
            // Creates the result array
            $result = mysqli_query($conn, $query);
            // As long as the result still has more to go
            while($row = mysqli_fetch_array($result))
            {
            // Create a new row
                print "<tr>";
            // And for each element in the array
                for($i=0; $i < 11; $i++)
                {
                    //Print out the element in its own spot
                    echo "<td>$row[$i]</td>";
                }

                echo "</tr>";
            }
                // End the table
                echo "</table>";
            ?>
</div>
       
    </body>
</html>
