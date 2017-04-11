<?php
    require_once 'is_logged.php';
    function printPets($result, $conn){
        $openVisit = false;
        // Creates the table and the headers for the table
        echo "<table class = 'pet_table'><tr><th>Pet Id</th><th>Name</th><th>Species</th><th>Breed</th><th>Sex</th><th>Color</th><th>Weight</th><th>Last Visit</th><th>All Visits</th><th></th>";
        // If reached from an employee
        if (isset($_SESSION['client_id'])){
            echo "<th>Create/Close Visit</th></tr>";
        }
        // If reached from a client
        else{
            echo "</tr>";
        }
        // As long as the result still has more to go
        while($row = mysqli_fetch_array($result)){
            // Create a query to find all visits from this pet
            $query = "SELECT * FROM visit WHERE petid = $row[0]";
            // Run the query
            $test = mysqli_query($conn, $query);
            // While there are more results left (aka more visits)
            while($testRow = mysqli_fetch_array($test)){
                // See if there is an unclosed visit
                if (is_null($testRow[4])){
                    // State there is an open visit
                    $openVisit = true;
                }
            }
            // Create a new row
            print "<tr>";
            // And for each element in the array
            for($i=0; $i < 7; $i++){
                //Print out the element in its own spot  
                echo "<td>$row[$i]</td>";
            }
            // Creates a query to find the most recent visit
            $query="SELECT visitid FROM visit WHERE startDate=(SELECT MAX(startdate) FROM visit WHERE petid=$row[0])";
            // Runs the query for the most recent visit
            $inner = mysqli_query($conn, $query);
            // Stores the result as $innerRow
            $innerRow = mysqli_fetch_array($inner);
            // Creates a link for selecting the most recent visit
            echo "<td><a href=\"view_visit_session_set.php?visitid=$innerRow[0]\">$row[7]</a></td>";
            // Creates a link to show all visits for the current pet
            echo "<td><form method=post action = \"./view_all_visit.php\"><input type=\"hidden\" name=\"petId\" value=$row[0]><input type=\"submit\" value=\"Show all visits\"/></form><td>";
            if (isset($_SESSION['client_id'])){
                if ($openVisit){
                    echo "<td><form method=get action = \"./end_visit.php\"><input type=\"hidden\" name=\"petId\" value=$row[0]><input type=\"submit\" value=\"Close Current Visit\"/></form><td>";
                }
                else{
                    echo "<td><form method=get action = \"./create_visit.php\"><input type=\"hidden\" name=\"petId\" value=$row[0]><input type=\"submit\" value=\"Create New Visit\"/></form><td>";
                }
            }
            // End the table row
            echo "</tr>";
        }
        // End the table
        echo "</table>";
    }
?>