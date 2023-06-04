<?php
include('dbcon.php');
include('getdata.php');

session_start();
$msg = '';
if (!isset($_SESSION['emp'])) {
    header('location:index.php');
}
if (isset($_POST['apply'])) {
    $fromDate = $_POST['fromDate'];
    $toDate = $_POST['toDate'];
    $leave = $_POST['leave'];
    $description = $_POST['description'];
    $randomid = (rand(1, 1000));
    $useremp = $_SESSION['emp']['empUsername'];
     if(!isset($leave)){
        $msg = "Please select type of Leave";
    } 
    else if ($fromDate < $toDate) {
        $query = "INSERT INTO leavesData (leavetype,fromDate,toDate,description,statusleave,empusername) VALUES('$leave','$fromDate','$toDate','$description','waiting Approved','$useremp')";
        if (mysqli_query($con, $query)) {
            $msg = "leaves Data added Successfully";
        } else {
            $msg = "error in adding leaves Data" . mysqli_error($con);
        }
    }else  {
        $msg = "from date must be less than to date";
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>Employee addLeave</title>
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
                        <a class="navbar-brand" href="javascript:;">add leave</a>
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
                                    <i class="material-icons">account_circle</i> Welcome,<?php echo $usse;?>                                </a>
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
                            <div class="form-group col-md-5">
                                <label for="date">from date</label>
                                <input type="date" name="fromDate" class="form-control" id="inputdate"
                                    placeholder="from Date">
                            </div>
                            <div class="form-group col-md-5">
                                <label for="date">to date</label>
                                <input type="date" name="toDate" class="form-control" id="inputdate"
                                    placeholder="to Date">
                            </div>
                        </div>
                        <div class="form-group col-md-7">
                            <label for="inputState">type of Leave</label>
                            <select name="leave" id="leave" class="form-control">
                                <option  value="" disabled="disabled" selected="selected">select your Leave</option>
                                <option value="Medical Leave">medical Leave</option>
                                <option value="Casual leave">casual leave</option>
                                <option value="Restricted Holiday">Restricted Holiday</option>
                            </select>
                        </div>
                        <br>
                        <div class="form-group col-md-7">
                            <input type="text" name="description" class="form-control" id="inputAddress"
                                placeholder="description">
                        </div>
                        <br>
                        <button type="submit" name="apply" class="btn btn-primary">Apply</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</body>