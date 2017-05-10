<!DOCTYPE html>
<?php
    require_once 'sidebar.php';
    require_once 'connection.php';
    //require_once 'is_employee.php';
    $query = "SELECT codeid, procedurename FROM procedurecode";
    $result = mysqli_query($conn, $query);
    $name_query = "SELECT c.clientid, c.FirstName, c.LastName, c.email FROM client c;";
    $name_result = mysqli_query($conn, $name_query);
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
if (isset($_POST['start_time'])){
    $code = $_POST['code'];
    $client = $_POST['client'];
    $date = $_SESSION['date'];
    $employeeid = $_SESSION['employeeid'];
    $starttime = $_POST['start_time'];
    $endtime = $_POST['end_time'];

    date_default_timezone_set("UTC-5:00");
    if (strtotime($date) < strtotime('now')-86400){
        $date_error = "No time travelling allowed";
    }
    if (strtotime($endtime) < strtotime($starttime)){
        $time_error = "Cannot end before you start";
    }
    // If the start and end time are valid
    if (!isset($date_error) && !isset($time_error)) {
        // Insert into the appointment table
        $query = "INSERT INTO appointment (`clientid`, `startdate`, `starttime`, `enddate`, `endtime`) VALUES (\"$client\", \"$date\", \"$starttime:00\", \"$date\", \"$endtime:00\")";
        mysqli_query($conn, $query);
        // Get the id of the newly inserted appointment
        $appointment = mysqli_insert_id($conn);
        //Insert into the appointmentprocedurecode table
        $query = "INSERT INTO appointmentprocedurecode (`appointmentid`, `codeid`) VALUES (\"$appointment\", \"$code\")";
        // Run the insert query
        mysqli_query($conn, $query);
        // Check to see if any rows were added
        $rowsadded = mysqli_affected_rows($conn);
    }
}
?>
<div class ="form_layout">
    <form id = "user_form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <h2>Add Appointment</h2>
        <?PHP
        echo "Appointment: <select name='code'>";
        while (($row = mysqli_fetch_row($result)) != null){
            echo "<option value = '{$row[0]}'>$row[1]</option>";
        }
        echo "</select></br>";
        echo "Client: <select name='client'>";
        while (($row = mysqli_fetch_row($name_result)) != null){
            echo "<option value = '{$row[0]}'>$row[1] $row[2] $row[3]</option>";
        }
        echo "</select></br>";
        ?>
        Start Time: <input type="time" name="start_time" />  <?php if(isset($date_error)){echo "* $date_error";} else if(isset($time_error)){echo "* $time_error";} ?> <br>
        End Time: <input type="time" name ="end_time" /> <br>
        <input type ="submit" name ='add_procedure' value="Add Procedure" /><br>
        <input type ="reset" name = 'reset_btn' value ="Reset" /><br>
    </form>
    <!--Print out if any rows were added-->
    <?php if ($rowsadded == 1){echo "New appointment successfully added!";} ?>
</div>
</body>
</html>