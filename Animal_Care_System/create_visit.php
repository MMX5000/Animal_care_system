<?php
require "connection.php";
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    session_start();
    require_once 'is_employee.php';
    if(isset($_SESSION['client_id'])){
        $location = "./view_client_pets.php";
    }
    else{
        $location = "./view_my_pets.php";
    }
    $petid = $_GET['petId'];
    $ownerid = $_GET['ownerId'];
    $query = "INSERT INTO visit (petid, startdate, starttime) VALUES ($petid, CURDATE(), CURTIME())";
    mysqli_query($conn, $query);
    $query = "UPDATE pet SET LASTVISITDATE=CURDATE() WHERE petid=$petid";
    mysqli_query($conn, $query);
    sleep(0);
    header("Location: $location");
    exit;
?>