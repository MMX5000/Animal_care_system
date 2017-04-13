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
        <?php require_once 'sidebar.php'; ?>
        <h2> Search Results: <?php echo "$fname $lname $email $username $user_id $animal_id" ?> </h2>
        <?php search($fname,$lname,$email,$username,$user_id,$animal_id);?>

    </body>
</html>


