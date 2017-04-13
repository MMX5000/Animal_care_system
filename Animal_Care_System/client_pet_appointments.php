<?php /**
 * Created by PhpStorm.
 * User: Jenna
 * Date: 4/11/2017
 * Time: 1:10 PM
 */
?>

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



    <?php
    require_once("sidebar.php");
    $clientid = $_SESSION['id'];
    //require_once 'is_logged.php';

    // Creates the query we are using.  In this case, we are getting all the appointments for a specific date
    $query = "SELECT c.ClientId, FirstName, LastName, HomePhone, CellPhone, WorkPhone, Email, a.AppointmentId, StartDate, StartTime, ProcedureName FROM client c JOIN appointment a ON c.ClientId = a.ClientId JOIN AppointmentProcedureCode apc ON a.AppointmentId = apc.AppointmentId JOIN ProcedureCode pc ON apc.CodeId = pc.CodeId WHERE c.ClientId = '$clientid'";

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

        echo "</tr>";
    }
    // End the table
    echo "</table>";
    ?>

</div>

</body>
</html>