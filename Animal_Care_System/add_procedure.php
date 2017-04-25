<?php session_start();?>
<!DOCTYPE html>
<?PHP

    require_once 'sidebar.php';
    require_once 'connection.php';
    require_once 'is_doctor.php';
    $query = "SELECT codeid, procedurename FROM procedurecode";
    $result = mysqli_query($conn, $query);
?>

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
    <?php
        // If the start date was already provided (aka form was submitted)
        if (isset($_POST['start_date'])){
            $code = $_POST['code'];
            $employeeid = $_SESSION['employeeid'];
            $start = $_POST['start_date'];
            $starttime = $_POST['start_time'];
            $end = $_POST['end_date'];
            $endtime = $_POST['end_time'];
            $summary = $_POST['summary'];
            $visit = $_SESSION['visit_id'];
            if (strtotime($end) > strtotime('now')){
                $enddate_error = "No time travelling allowed";
            }
            if (strtotime($end) < strtotime($start)){
                $enddate_error = "Cannot end before you start";
            }
            if (strtotime($end) < strtotime('-1 month')){
                $enddate_error = "Cannot update records older than one month";
            }
            if (strtotime($start) < strtotime('-1 month')){
                $startdate_error = "Cannot update records older than one month";
            }
            if (strtotime($start) > strtotime('now')){
                $startdate_error = "No time travelling allowed";
            }

            // If the start and end time are valid
            if (!isset($enddate_error) && !isset($startdate_error)) {
                // Insert into the procedure table
                $query = "INSERT INTO procedures (`codeid`, `employeeid`, `startdate`, `starttime`, `enddate`, `endtime`, `summary`) VALUES (\"$code\", \"$employeeid\", \"$start\", \"$starttime:00\", \"$end\", \"$endtime:00\" , \"$summary\")";
                mysqli_query($conn, $query);
                // Get the id of the newly inserted procedure
                $procedure = mysqli_insert_id($conn);
                // Insert into the procedurevisit table
                $query = "INSERT INTO procedurevisit (`procedureid`, `visitid`) VALUES (\"$procedure\", \"$visit\")";
                mysqli_query($conn, $query);
            }
        }
    ?>
        <div class ="form_layout">
            <form id = "user_form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <h2>Add Procedure</h2>
                <?PHP
                    echo "Procedure: <select name='code'>";
                    while (($row = mysqli_fetch_row($result)) != null){
                        echo "<option value = '{$row[0]}'>$row[1]</option>";
                    }
                    echo "</select></br>";
                ?>
                Start Date: <input type="date" name="start_date" /><?php if(isset($startdate_error)){echo "* $startdate_error";} ?><br>
                Start Time: <input type="time" name="start_time" /> <br>
                End Date: <input type="date" name="end_date" /> <?php if(isset($enddate_error)){echo "* $enddate_error";} ?><br>
                End Time: <input type="time" name ="end_time" /> <br>
                Summary: <input type ="text" name="summary" /><br>
                <input type ="submit" name ='add_procedure' value="Add Procedure" /><br>
                <input type ="reset" name = 'reset_btn' value ="Reset" /><br>
            </form>
        </div>
    </body>
</html>