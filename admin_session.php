<?php

if(!isset($_SESSION["admin"]) || !$_SESSION["admin"] ){
    header("location:admin_login.php");
}