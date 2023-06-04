<?php
session_start(); 
$username=$_SESSION['emp'];
setcookie("emp", $username, time() - (30 * 24 * 60 * 60*60), "/");
unset($_SESSION['emp']);
session_destroy();
header("location:index.php");
