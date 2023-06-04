<?php
include('dbcon.php');
session_start();
$empid = intval($_GET['empid']);
$query = "DELETE FROM employeeDetails WHERE empid='$empid'";
$result = mysqli_query($con, $query);
if ($result ==true) {
    header('location:admin_manageEmp.php');
} else {
    $msg = "error remove user";
}
