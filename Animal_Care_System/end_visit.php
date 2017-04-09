<?php
require "connection.php";
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    session_start();
    if(isset($_SESSION['client_id'])){
        $location = "./view_client_pets.php";
    }
    else{
        $location = "./view_my_pets.php";
    }

    $petid = $_GET['petId'];
    // Create the query
    $query = "SELECT * FROM visit WHERE petid = $petid";
    // Run the query
    $result = mysqli_query($conn, $query);
    // Search the results
    while($row = mysqli_fetch_array($result)){
        // Look for an active visit
        if (is_null($row[4])){
            // Set the end time for this visit to now
            $query = "UPDATE visit SET ENDDATE = CURDATE(), ENDTIME = CURTIME() WHERE visitid = $row[0];";
            // and run the query
            mysqli_query($conn, $query);
        }
    }
    sleep(0);
    // Redirect back where you came from
    header("location: $location");
    exit;
?>