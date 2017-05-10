<?php 
    require "connection.php";
    require "index_login.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $_SESSION['firstname'];echo"'s ";?> Pets</title>
        <link rel ="stylesheet" type="text/css" href="menu_nav.css"> </link>
        <link rel ="stylesheet" type ="text/css" href="user_home.css"> </link>
        <script src ="jquery-3.1.1.js"> </script>
        <script src="menu_nav.js"> </script>
    </head>
    <script>

        function go_to_med_page(){

            window.location = 'insert_medication.php';
        }
    </script>
    <body>
        <?php 
            require_once 'sidebar.php';
            //Require that they are logged in
            require_once 'is_logged.php';
            // Get the Pet id from the request
            $visitid = $_SESSION['visit_id'];
            // Create the table headers
            echo "<table class ='user_table'><tr><th>Procedure Id</th><th>Procedure Name</th><th>Employee Id</th><th>Procedure Start date</th><th>Procedure Start Time</th><th>Procedure End Date</th><th>Procedure End Time</th>";
            // If the user is an employee
            if ($_SESSION['employee'] != -1){
                echo "<th>Procedure Summary</th>";
                echo "<th>Add Medication</th></tr>";
            }
            else {
                echo "</tr>";
            }
            // Create this insane query that combines the visit, visitprocedure, procedure, and procedurecode tables into one place with aliases
            $query = "select v.visitid, petId, v.startdate AS 'Visit Start Date', v.StartTime AS 'Visit Start Time', v.endDate AS 'Visit End Date', v.endTime AS 'Visit End Time', p.procedureId, pc.procedureName, p.employeeid, p.StartDate AS 'Procedure Start Date', p.StartTime AS 'Procedure Start Time', p.enddate AS 'Procedure End Date', p.endtime AS 'Procedure End Time', p.summary from visit v JOIN procedurevisit pv ON v.visitid = pv.visitid JOIN procedures p ON p.procedureId = pv.procedureId JOIN procedurecode pc ON p.codeId = pc.codeId WHERE v.visitid = $visitid";
            // Get the result
            $result = mysqli_query($conn, $query);
            // While there are more procedures
            while($row = mysqli_fetch_array($result)){

                print "<tr>";
                // For all other fields
                for($i=6; $i < 13; $i++){
                    if($i === 6){
                        echo"<td class = 'pro_id'> $row[$i]</td>";
                    }else {
                        // Fill them out
                        echo "<td>$row[$i]</td>";
                    }
                }
                // If user is an employee
                if ($_SESSION['employee'] != -1){
                    // Print the procedure summary information
                    echo "<td>$row[13]</td>";
                    echo "<td><button type='button' class ='med_btn''>Add Medication</button></td>";
                }
                // End this line
                echo "</tr>";
            }
            if ($_SESSION['employee'] > 0){
                echo "<td><form id = \"create_procedure\" method=\"get\" action=\"add_procedure.php\">
                    <input type=\"submit\" value=\"Create Procedure\"> <br>                        
                    </form></td>";
            }
            // End the table
            echo "</table>";
        ?>
        <script>
            $(".med_btn").click(function () {
               var item = $(this).closest("tr").find(".pro_id").text();
               window.location.href= "set_pro_id.php?pro_id="+item;

            });
        </script>

   </body>
</html>
