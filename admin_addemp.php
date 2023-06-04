<?php
include('dbcon.php');
session_start();
include("admin_session.php");
$msg = '';
if (isset($_POST['add'])) {
    $empid = $_POST['id'];
    $Username = $_POST['Username'];
    $Password = $_POST['password'];
    $rePassword = $_POST['repassword'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $Phonenumber = $_POST['Phonenumber'];
    $dateofbirth = $_POST['date'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $department = $_POST['department'];
    $Gender = $_POST['Gender'];
    $query = "SELECT empUsername FROM employeedetails WHERE empUsername='$Username'";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        $msg = "Employee Username is already Used";
    } else if (!isset($empid) || !isset($Username) || !isset($Password) || !isset($fname) || !isset($rePassword) || !isset($lname) || !isset($Phonenumber) || !isset($email) || !isset($dateofbirth) || !isset($city) || !isset($country) || !isset($department) && $department != 'select an department' || !isset($Gender) && $gender != 'select your Gender') {
        $msg = "Please Fill all TextField";
    } else if ($Password != $rePassword) {
        $msg = "Password does not match";
    } else {
        $query = "INSERT INTO employeeDetails (empid,empUsername,Password,fname,lname,email,Phonenumber,gender,dateofbrith,country,city,department) VALUES('$empid','$Username','$Password','$fname','$lname','$email','$Phonenumber','$Gender','$dateofbirth','$country','$city','$department')";
        if (mysqli_query($con, $query)) {
            $msg = "employeee Data added Successfully";
        } else {
            $msg = "error in adding employeee Data" . mysqli_error($con);
        }
    }
} ?>
<!doctype html>
<html lang="en">

<head>
    <title>Admin AddEmployee</title>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link href="assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
    <style>
    input[type=submit] {
        height: 35px;
        margin-top: 20px;
        background-color: #08AF34;
        color: white;
        width: 50%;
        align-self: center;
        outline: none;
        border: none;
    }

    input[type=submit]:hover {
        background-color: white;
        color: black;
        cursor: pointer;
    }


    #ss {
        color: green;
        font-size: 20px;
        margin-right: 10px;
        margin-top: 20px;
        margin-left: 20px;
    }
    </style>
</head>

<body>
    <div class="wrapper ">
        <div class="sidebar" data-color="purple" data-background-color="white">
            <div class="logo">
                <a class="simple-text logo-mini">
                    Leave Management System
                </a>
                <a class="simple-text logo-normal">
                    Admin
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="nav-item active  ">
                        <a class="nav-link" href="admin_dashbord.php">
                            <i class="material-icons">Dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item active  ">
                        <a class="nav-link" href="admin_manageEmp.php">
                            <i class="material-icons">badge</i>
                            <p>manage Employees</p>
                        </a>
                    </li>
                    <li class="nav-item active  ">
                        <a class="nav-link" href="admin_addemp.php">
                            <i class="material-icons">person_add</i>
                            <p>add Employees</p>
                        </a>
                    </li>
                    <li class="nav-item active  ">
                        <a class="nav-link" href="admin_leavesDetails.php">
                            <i class="material-icons">view_list</i>
                            <p>Leave management</p>
                        </a>
                    </li>
                    <li class="nav-item active  ">
                        <a class="nav-link" href="admin_changepassword.php">
                            <i class=" material-icons">edit</i>
                            <p>Change Password</p>
                        </a>
                    </li>
                    <li class="nav-item active ">
                        <a class="nav-link" href="admin_logout.php">
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
                        <label id="ss">Add Employee</label>
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
                                    <i class="material-icons">account_circle</i> Welcome,admin
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
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputusername">employee code</label>
                                <input type="text" name="id" class="form-control" id="inputEmail4"
                                    placeholder="must be Unique Number">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputusername">employee Username</label>
                                <input type="text" name="Username" class="form-control" id="inputEmail4"
                                    placeholder="Harvey Specter">
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputusername">first name</label>
                                <input type="text" name="fname" class="form-control" id="inputEmail4"
                                    placeholder="Harvey">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="inputusername">last name</label>
                                <input type="text" name="lname" class="form-control" id="inputEmail4"
                                    placeholder="Specter">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputState">Gender</label>
                                <select name="Gender" id="Gender" class="form-control">
                                    <option  value="" disabled="disabled" selected="selected">select your Gender</option>
                                    <option value="male">male</option>
                                    <option value="female">female</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="email">email</label>
                                <input type="text" name="email" class="form-control" id="inputAddress"
                                    placeholder="moha@gmail.com">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="Phonenumber">Phonenumber</label>
                                <input type="phone" name="Phonenumber" class="form-control" id="inputphone"
                                    placeholder="05991111111">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="Phonenumber">date of birth</label>
                                <input type="date" name="date" class="form-control" id="inputdate"
                                    placeholder="05/05/2021">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputCountry">Country</label>
                                <input type="text" class="form-control" name="country" id="inputCountry"
                                    placeholder="Palestine">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputCity">City</label>
                                <input type="text" class="form-control" name="city" id="inputCity" placeholder="Gaza">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputState">department</label>
                                <select name="department" id="department" class="form-control">
                                    <option value="" disabled="disabled" selected="selected">select an department</option>
                                    
                                    <?php
                                    $query = "SELECT * FROM departmentType";
                                    $result = mysqli_query($con, $query);
                                    while ($row = mysqli_fetch_assoc($result)) { ?>
                                    <option value="<?php echo $row['departmentTypes'] ?>">
                                        <?php echo $row['departmentTypes'] ?></option>
                                    <?php  } ?>


                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Password</label>
                                <input type="password" name="password" class="form-control" id="inputPassword4"
                                    placeholder="Enter Password">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Confirm Password</label>
                                <input type="password" name="repassword" class="form-control" id="inputPassword4"
                                    placeholder="Enter Password">
                            </div>
                        </div>
                        <button type="submit" name="add" class="btn btn-primary">Add</button>
                    </form>
                </div>

            </div>
        </div>
</body>

</html>