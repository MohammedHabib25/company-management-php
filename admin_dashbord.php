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
    <title>Admin Dashboard</title>
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
                                    <i class="material-icons">account_circle</i> Welcome,admin
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header card-header-warning card-header-icon">
                                    <div class="card-icon">
                                        <i class="material-icons">badge</i>
                                    </div>
                                    <p class="card-category">Total Regd Employee</p>
                                    <h3 class="card-title"><?php
                                                            $query = "SELECT * FROM employeedetails";
                                                            $result = mysqli_query($con, $query);
                                                            $num =    mysqli_num_rows($result);
                                                            echo $num;
                                                            ?>
                                    </h3>
                                </div>
                                <div class="card-footer">
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header card-header-success card-header-icon">
                                    <div class="card-icon">
                                        <i class="material-icons">drag_indicator</i>
                                    </div>
                                    <p class="card-category">Total Departments</p>
                                    <h3 class="card-title"><?php
                                                            $query = "SELECT * FROM departmentType";
                                                            $result = mysqli_query($con, $query);
                                                            $num =    mysqli_num_rows($result);
                                                            echo $num;
                                                            ?></h3>
                                </div>
                                <div class="card-footer">

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header card-header-success card-header-icon">
                                    <div class="card-icon">
                                        <i class="material-icons">view_list</i>
                                    </div>
                                    <p class="card-category">Total leave Applications</p>
                                    <h3 class="card-title"><?php
                                                            $query = "SELECT * FROM leavesdata";
                                                            $result = mysqli_query($con, $query);
                                                            $nums =    mysqli_num_rows($result);
                                                            echo $nums;

                                                            ?></h3>
                                </div>
                                <div class="card-footer">

                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                        <tr>
                                            <th width="120">leave id</th>
                                            <th width="152">Employe Name</th>
                                            <th width="150">Leave Type</th>
                                            <th width="180">Posting Date</th>
                                            <th width="180">Status</th>
                                            <th align="center" width="200">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $sel_query = "Select * from leavesData ORDER BY createdAt DESC LIMIT 6";
                                        $result = mysqli_query($con, $sel_query);
                                        while ($row = mysqli_fetch_assoc($result)) { ?>
                                        <tr>
                                            <td>
                                                <?php echo $row['id']  ?>
                                            </td>
                                            <td>
                                                <?php echo $row['empusername']  ?>
                                            </td>
                                            <td>
                                                <?php echo $row['leavetype']  ?>
                                            </td>
                                            <td>
                                                <?php echo $row['createdAt']  ?>
                                            </td>
                                            <?php if ($row['statusleave'] == 'waiting Approved') {
                                                ?>
                                            <td class="text-warning">
                                                <?php echo $row['statusleave']  ?>
                                            </td><?php } ?>
                                            <?php if ($row['statusleave'] == 'Not Approved') {
                                                ?>
                                            <td class="text-danger">
                                                <?php echo $row['statusleave']  ?>
                                            </td><?php } ?>
                                            <?php if ($row['statusleave'] == 'Approved') {
                                                ?>
                                            <td class="text-success">
                                                <?php echo $row['statusleave'] ?>
                                            </td><?php } ?>
                                            <td>
                                                <a href="admin_leavesAction.php?id=<?php echo $row['id']; ?>"
                                                    class="btn btn-primary">View Details</a>
                                                <?php  } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
</body>

</html>

       