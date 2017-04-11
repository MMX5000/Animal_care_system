<?php

<<<<<<< HEAD
$dbhost = "localhost";
=======
$dbhost = "127.0.0.1";
>>>>>>> refs/remotes/origin/master
$dbname = "acsystem";
$username = "root";
$password = "";

$conn = mysqli_connect($dbhost, $username, $password, $dbname);

if(!$conn){

    die("Could not connect to database.");
}
?>