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
        <div class ="form_layout">
            <form id = "user_form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <h2>Register New User</h2>
                <?PHP
                    echo "Procedure: <select name='code'>";
                    while (($row = mysqli_fetch_row($result)) != null){
                        echo "<option value = '{$row[0]}'>$row[1]</option>";
                    }
                    echo "</select></br>";
                ?>
                Start Date: <input type="date" name="start_date" /><br>
                Start Time: <input type="time" name="start_time" placeholder="HH:MM:SS"/><br>
                End Date: <input type="date" name="end_date" placeholder ="YYYY-MM-DD"/> <br>
                End Time: <input type="time" name ="end_time" placeholder ="HH:MM:SS" /> <br>
                Summary: <input type ="text" name="summary" placeholder ="Enter Summary" /><br>
                <input type ="submit" name ='add_procedure' value="Add Procedure" /><br>
                <input type ="reset" name = 'reset_btn' value ="Reset" /><br>
            </form>
        </div>
    </body>
</html>