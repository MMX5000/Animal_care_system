<?php
require"index_login.php";
session_destroy();
$_SESSION = array();

header("Location:index.php");
exit();
?>