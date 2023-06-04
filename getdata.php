<?php
include('dbcon.php');
session_start();
$empisd=$_SESSION['emp']['empid'];
$query = "SELECT * FROM employeedetails WHERE empid = '$empisd'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$usse=$row['empUsername'];?>