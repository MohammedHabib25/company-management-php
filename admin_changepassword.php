<?php
include('dbcon.php');
session_start();
include("admin_session.php");

$msg = '';
if (isset($_POST['changepassd'])) {
    $oldpass = $_POST['oldpassword'];
    $newpass = $_POST['newpassword'];
    $confirmpass = $_POST['ConfirmPassword'];
    $query = "SELECT * FROM adminauth WHERE username= 'admin'";
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $emppassworddb = $row['password'];
        if (mysqli_num_rows($result) > 0) {
            if ($newpass != $confirmpass) {
                $msg = 'Password does not match';
            } else if ($emppassworddb != $oldpass) {
                $msg = 'Old password is incorrect';
            } else {
                $query = "UPDATE adminauth SET password='$newpass' WHERE username='admin'";
                if (mysqli_query($con, $query)) {
                    $msg = "Password updated successfully";
                } else {
                    $msg = "error in updating Password" . mysqli_error($con);
                }
            }
        }
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>change Password</title>
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
                        <a class="nav-link" href="">
                            <i class="material-icons">edit</i>
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
                        <a class="navbar-brand" href="javascript:;">Change Password</a>
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
                        <div class="form-group col-md-6">
                            <label for="inputPassword4"> </label>
                            <input type="password" name="oldpassword" class="form-control" id="inputPassword4"
                                placeholder="Enter Old Password">
                        </div>
                        <br>
                        <div class="form-group col-md-6">
                            <input type="password" name="newpassword" class="form-control" id="inputPassword4"
                                placeholder="Enter New Password">
                        </div>
                        <br>
                        <div class="form-group col-md-6">
                            <input type="password" name="ConfirmPassword" class="form-control" id="inputPassword4"
                                placeholder="Confirm New Password">
                        </div>
                        <br>
                        <button type="submit" name="changepassd" class="btn btn-primary">Change</button>
                    </form>
                </div>

            </div>
        </div>
</body>

</html>