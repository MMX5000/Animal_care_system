<?php
    session_start();
    $firstname = $_SESSION['firstname'];
    require 'select_search.php';
    if(empty($_GET['fname']))
    {
       $fname="";
   	}
   	else
   	{
   		$fname = $_GET['fname'] ;
   	}
   	if(empty($_GET['lname']))
   	{
   		$lname ="";
   	}
   	else
   	{
   		$lname = $_GET['lname'];
   	}
   	if(empty($_GET['email']))
   	{
   		$email = "";
   	}
   	else
   	{
   		$email = $_GET['email'];
   	}
   	
   	if(empty($_GET['user_id']))
   	{
   		$user_id ="";
    }
    else
    {
    	$user_id = $_GET['user_id'];
    }
   	
   	if(empty($_GET['username']))
   	{
		$username = "";
   	}
   	else
   	{
   		$username = $_GET['username'];
   	}
    
    if(empty($_GET['animal_id']))
    {
   		$animal_id="";
    }
    else
    {
    	$animal_id = $_GET['animal_id'];
    }

 ?>
<html>
	<head>
         <link rel = 'stylesheet' type="text/css" href = 'employee_home.css' />
        <link rel ="stylesheet" type="text/css" href="menu_nav.css"/>
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
        <br>

        <h2>Search Results:<?php echo" $fname $lname $email $username $user_id $animal_id"?></h2>

        <?php search($fname,$lname,$email,$username,$user_id,$animal_id);?>

    </body>
</html>