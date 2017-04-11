
<!DOCTYPE html>
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
        <div class="title_header">
        <h1> <span onclick="open_nav()">&#9776</span>Animal Care System</h1>
        </div>
           
        <div id ="menu_nav" class ="menu_nav">
            <a href="javascript:void(0)" class="close_btn" onclick="close_nav()">&times;</a>
            <a href="user_home.php"> Home</a>
            <a href="view_my_pets.php">View Pets</a>
            <a href="user_pet_appointments.php">Appointments</a>
            <a href="logout.php">Logout</a>
        </div>  
        <?php 
            echo "<table><tr><th>User Id</th><th>First Name</th><th>Last Name</th><th>Address</th><th>City</th><th>State</th><th>Zip</th><th>Home Phone</th><th>Cell Phone</th><th>Work Phone</th><th>Email</th></tr>";
            $result = mysqli_query($conn, "SELECT * FROM client");

            while($row = mysqli_fetch_array($result)){
                print "<tr>";
                echo "<td><a href=\"view_my_pets.php?id=$row[0]\">$row[0]</td>";
                for($i=1; $i < 11; $i++){
                    echo "<td>$row[$i]</td>";
                }
                echo "</tr>";
            }
            echo "</table>";                
        ?>
    
   </body>
</html>
