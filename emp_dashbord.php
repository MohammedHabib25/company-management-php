<?php
include('dbcon.php');
session_start();
if (!isset($_SESSION['emp'])) {
    header('location:index.php');
}
$msg = '';
$empname = $_SESSION['emp']['empid'];
$query = "SELECT * FROM employeeDetails WHERE empid='$empname'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
function updateDbRecord($db, $table)
{
    $query = "SHOW COLUMNS FROM " . $table . " WHERE Field NOT IN ('empid')"; 
    $result = mysqli_query($db, $query);
    $fieldnames = array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $username = $_POST['empUsername'];
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST['email'];
            $Phonenumber = $_POST['Phonenumber'];
            $dateofbirth = $_POST['dateofbrith'];
            $country = $_POST['country'];
            $city = $_POST['city'];
            $department = $_POST['department'];
            $gender = $_POST['gender'];
            (isset($username) && $username) ?
                $fieldnames[] = 'empUsername' : null;
            (isset($fname) && $fname)  ?
                $fieldnames[] = 'fname' : null;
            (isset($lname) && $lname) ?
                $fieldnames[] = 'lname' : null;
            (isset($email) && $email) ?
                $fieldnames[] = 'email' : null;
            (isset($Phonenumber) && $Phonenumber) ?
                $fieldnames[] = 'Phonenumber' : null;
            (isset($dateofbirth) && $dateofbirth) ?
                $fieldnames[] = 'dateofbrith' : null;
            (isset($country) && $country) ?
                $fieldnames[] = 'country' : null;
            (isset($city) && $city) ?
                $fieldnames[] = 'city' : null;
            (isset($department) && $department != 'select an department') ?
                $fieldnames[] = 'department' : null;
            (isset($gender) && $gender != 'select your Gender') ?
                $fieldnames[] = 'gender' : null;
            $array = array_intersect_key($_POST, array_flip($fieldnames));
        }
    }
    foreach ($array as $key => $value) {
        $value = mysqli_real_escape_string($db, $value);
        $value = "'$value'";
        $updates[] = "$key = $value";
    }

    $empname = $_SESSION['emp']['empid'];
    $implodeArray = implode(', ', $updates);
    $query_update = "UPDATE $table SET $implodeArray WHERE empid='$empname'";
    if (mysqli_query($db, $query_update)) {
        $msg = "Employee Saved Successfully";
    } else {
        $msg = "error in adding employeee Data" . mysqli_error($db);
    }

    return $msg;
}
if (isset($_POST['update'])) {
    $usernameemp= $_POST['empUsername'];
    $query = "SELECT empUsername FROM employeedetails WHERE empUsername='$usernameemp'";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        $msg = "Username is already Used";
        
    } else {
        $select_query = "SELECT * FROM employeeDetails";
        $select_result = mysqli_query($con, $select_query);
        $msg = updateDbRecord($con, 'employeeDetails');
        header("Refresh:0");
    }
} ?>

<!doctype html>
<html lang="en">

<head>
    <title>employee Dashboard</title>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link href="assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
    <style>
    .ss {
        font-size: 50px;
    }
    </style>
</head>

<body>
    <div class="wrapper ">
        <div class="sidebar" data-color="purple" datsa-background-color="white">
            <div class="logo">
                <a class="simple-text logo-mini">
                    Leave Management System
                </a>
                <a class="simple-text logo-normal">
                    Welcome, <?php echo $row['empUsername']; ?>
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="nav-item active  ">
                        <a class="nav-link" href="emp_dashbord.php">
                            <i class="material-icons">account_circle</i>
                            <p>Profile</p>
                        </a>
                    </li>
                    <li class="nav-item active  ">
                        <a class="nav-link" href="emp_changepassword.php">
                            <i class="material-icons">edit</i>
                            <p>Change Password</p>
                        </a>
                    </li>
                    <li class="nav-item active  ">
                        <a class="nav-link" href="emp_addleave.php">
                            <i class="material-icons">view_list</i>
                            <p>add Leave</p>
                        </a>
                    </li>
                    <li class="nav-item active  ">
                        <a class="nav-link" href="emo_leavehistory.php">
                            <i class="material-icons">view_list</i>
                            <p>Leave History</p>
                        </a>
                    </li>
                    <li class="nav-item active ">
                        <a class="nav-link" href="emp_logout.php">
                            <i class="material-icons">logout</i>
                            <p>logout</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <a class="navbar-brand" href="javascript:;">Dashboard</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:;">
                                    <i class="material-icons">account_circle</i> Welcome,
                                    <?php echo $row['empUsername'] ?>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="content">
                <div class="container-fluid">
                 <?php if (isset($msg) && $msg) { ?><div class="alert alert-dark" role="alert">
                        <?php echo $msg; ?>
                    </div><?php } ?>
                    <form method="post">
                    <input type='hidden' value='<?php echo $row['empid'] ?>' name='empid'>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputusername">employee Username</label>
                                <input type="text" name="empUsername" class="form-control" id="inputEmail4"
                                    placeholder="<?php echo $row['empUsername'] ?>">
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputusername">first name</label>
                                <input type="text" name="fname" class="form-control" id="inputEmail4"
                                    placeholder="<?php echo $row['fname'] ?>">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="inputusername">last name</label>
                                <input type="text" name="lname" class="form-control" id="inputEmail4"
                                    placeholder="<?php echo $row['lname']; ?>">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputState">Gender</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option <?php if ($row['gender'] == 'male') {echo 'selected';} ?> value="male">male</option>
                                    <option <?php if ($row['gender'] == 'female') {echo 'selected';} ?> value="female">female</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="email">email</label>
                                <input type="text" name="email" class="form-control" id="inputAddress"
                                    placeholder="<?php echo $row['email'] ?>">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="Phonenumber">Phonenumber</label>
                                <input type="phone" name="Phonenumber" class="form-control" id="inputphone"
                                    placeholder="<?php echo $row['Phonenumber']; ?>">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="Phonenumber">date of birth</label>
                                <input type="date" name="dateofbrith" class="form-control" id="inputdate"
                                    placeholder="<?php echo $row['date']; ?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputCountry">Country</label>
                                <input type="text" class="form-control" name="country" id="inputCountry"
                                    placeholder="<?php echo $row['country']; ?>">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputCity">City</label>
                                <input type="text" class="form-control" name="city" id="inputCity"
                                    placeholder="<?php echo $row['city']; ?>">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="department">department</label>
                                <select name="department" id="department" class="form-control">
                                    <option <?php if ($row['department'] == 'Oprations') {echo 'selected';} ?>  value="Oprations">Oprations</option>
                                    <option <?php if ($row['department'] == 'human resource') {echo 'selected';} ?>  value="human resource">human resource</option>
                                    <option <?php if ($row['department'] == 'information technolgy') {echo 'selected';} ?> value="information technolgy">information technolgy</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</body>

</html>