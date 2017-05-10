<?php
$dbhost = "localhost";
$dbname = "ac_system";
$username = "acsystem";
$password = "Seniorproject1";

$conn = mysqli_connect($dbhost, $username, $password, $dbname);

if(!$conn){

    die("Could not connect to database.");
}
?>