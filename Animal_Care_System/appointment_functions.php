<?php
include "connection.php";
function appointment_by_date($date){


    $conn = $GLOBALS['conn'];
    $query = "SELECT c.ClientId, FirstName, LastName, HomePhone, CellPhone, WorkPhone, Email, a.AppointmentId, StartDate, StartTime, ProcedureName FROM client c JOIN appointment a ON c.ClientId = a.ClientId JOIN AppointmentProcedureCode apc ON a.AppointmentId = apc.AppointmentId JOIN ProcedureCode pc ON apc.CodeId = pc.CodeId WHERE StartDate = date(\"d-m-Y\")";

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
    echo"</table>";
}

?>