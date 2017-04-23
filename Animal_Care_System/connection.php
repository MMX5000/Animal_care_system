<?php


$dbhost = "127.0.0.1";
$dbname = "acsystem";
$username = "root";
$password = "knickstar";

$conn = mysqli_connect($dbhost, $username, $password, $dbname);

if(!$conn){

    die("Could not connect to database.");
}
?>