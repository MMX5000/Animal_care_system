<?php
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
   	search($fname,$lname,$email,$username,$user_id,$animal_id);
 ?>