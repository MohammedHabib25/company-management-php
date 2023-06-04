<?php
include('dbcon.php');
include('getdata.php');
session_start();
if (!isset($_SESSION['emp'])) {
    header('location:index.php');
}
$msg = '';
if (isset($_POST['changepass'])) {
    $oldpass = $_POST['oldpassword'];
    $newpass = $_POST['newpassword'];
    $confirmpass = $_POST['ConfirmPassword'];
    $currentid = $_SESSION['emp']['empid'];
    $query = "SELECT * FROM employeeDetails WHERE empid= '$currentid'";
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $emppassworddb = $row['Password'];
        if (mysqli_num_rows($result) > 0) {
            if ($newpass != $confirmpass) {
                $msg = 'Password does not match';
            } else if ($emppassworddb != $oldpass) {
                $msg = 'old password is incorrect';
            } else {
                $query = "UPDATE employeeDetails SET password='$newpass' WHERE empid='$currentid'";
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
    <title>employee Changepassword</title>
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
                    Welcome, <?php echo $usse;?>
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
                                    <i class="material-icons">account_circle</i> Welcome,
                                    <?php echo $usse;?>
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
                        <button type="submit" name="changepass" class="btn btn-primary">Change</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</body>

</html>