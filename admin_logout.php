<?php
session_start(); 
unset($_SESSION['emp']);
session_destroy();
header("location:admin_login.php");
?>