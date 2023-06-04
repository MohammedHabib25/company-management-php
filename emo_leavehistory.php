<?php
include('dbcon.php');
include('getdata.php');

session_start();
$msg = '';
if (!isset($_SESSION['emp'])) {
    header('location:index.php');
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>Employee leavehistory</title>
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

    th {
        color: red;
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
                    Welcome,<?php echo $usse;?>
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
                        <a class="navbar-brand" href="javascript:;">Leave History</a>
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
                                    <i class="material-icons">account_circle</i> Welcome,<?php echo $usse;?>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="content">
                <div class="container-fluid">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <tr>
                                        <th width="120">leave no.</th>
                                        <th width="150">Leave Type</th>
                                        <th width="150">from</th>
                                        <th width="150">to</th>
                                        <th width="180">description</th>
                                        <th width="180">Posting Date</th>
                                        <th width="180">Status</th>
                                        <th align="center" width="200">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sel_query = "Select * from leavesData WHERE empusername='$usse' ORDER BY createdAt desc";
                                    $result = mysqli_query($con, $sel_query);
                                    while ($row = mysqli_fetch_assoc($result)) { ?>
                                    <tr>
                                        <td>
                                            <?php echo $row['id']  ?>
                                        </td>
                                        <td>
                                            <?php echo $row['leavetype']  ?>
                                        </td>
                                        <td>
                                            <?php echo $row['fromDate']  ?>
                                        </td>
                                        <td>
                                            <?php echo $row['toDate']  ?>
                                        </td>
                                        <td>
                                            <?php echo $row['description']  ?>
                                        </td>
                                        <td>
                                            <?php echo $row['createdAt']  ?>
                                        </td>

                                        <?php if ($row['statusleave'] == 'waiting Approved') {
                                            ?>
                                        <td class="text-warning">
                                            <?php echo $row['statusleave'] ?>
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
                                            <a href="emp_leaveDetails.php?leaveId=<?php echo $row['id']; ?>"
                                                class="waves-effect waves-light btn green m-b-xs"> View Details</a>

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