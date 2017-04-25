<?php


$dbhost = "127.0.0.1";
$dbname = "ac_system";
$username = "root";
$password = "Knickstar101";

$conn = mysqli_connect($dbhost, $username, $password, $dbname);

if(!$conn){

    die("Could not connect to database.");
}
?>