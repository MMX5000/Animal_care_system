<?php

$dbhost = "localhost";
$dbname = "acsystem";
$username = "root";
$password = "";

$conn = mysqli_connect($dbhost, $username, $password, $dbname);

if(!$conn){

    die("Could not connect to database.");
}
?>