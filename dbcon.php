<?php
$database = 'leaveMangmentSystem';
$username = 'root';
$host = 'localhost';
$password = '';
$con = mysqli_connect($host, $username, $password, $database) or die("connect error" . mysqli_connect_error($con));
/*$query = "CREATE TABLE adminauth(username VARCHAR(15) NOT NULL,password VARCHAR(50) NOT NULL)";
$query = "CREATE TABLE employeeDetails(empid Int(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,empUsername VARCHAR(50) NOT NULL,Password varchar(64) NOT NULL,fname VARCHAR(40) NOT NULL,lname VARCHAR(40) NOT NULL,email VARCHAR(50) NOT NULL,Phonenumber char(10) NOT NULL,gender VARCHAR(8) NOT NULL,dateofbrith DATE NOT NULL,country VARCHAR(40) NOT NULL,city VARCHAR(40) NOT NULL,department VARCHAR(40) NOT NULL,createdAt timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP)";
$query = "CREATE TABLE leavesData(id Int(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,leavetype varchar(20) NOT NULL,fromDate date NOT NULL,toDate date NOT NULL,description mediumtext NOT NULL,createdAt timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,statusleave varchar(20) NOT NULL,empusername varchar(50) NOT NULL)";
$query = "CREATE TABLE departmentType(depid int(10) NOT NULL,departmentTypes VARCHAR(100) NOT NULL,createdAt timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP)";
if ($con->query($query) == TRUE) {
  echo "create Table successfully";
} else {
  echo "ERROR create Table";
}*/
