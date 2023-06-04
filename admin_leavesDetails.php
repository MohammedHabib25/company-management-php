<?php
include('dbcon.php');
session_start();
include("admin_session.php");
$msg = '';
?>
<!doctype html>
<html lang="en">

<head>
    <title>admin LeavesDetails</title>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
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
                        <a class="nav-link" href="">
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
                    <!-- your sidebar here -->
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <a class="navbar-brand" href="javascript:;">Leave details</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
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
                            <!-- your navbar here -->
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title ">Leave History</h4>
                                    <p class="card-category"> Here is all leaves</p>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class=" text-primary">
                                                <th>
                                                    leave id
                                                </th>
                                                <th>
                                                    Employe Name
                                                </th>
                                                <th>
                                                    Leave Type
                                                </th>
                                                <th>
                                                    Posting Date
                                                </th>
                                                <th>
                                                    Status
                                                </th>
                                                <th>
                                                    Action
                                                </th>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sel_query = "Select * from leavesData ORDER BY createdAt DESC";
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
                                                        </td><?php }?>
                                                        <?php if ($row['statusleave'] == 'Not Approved') {
                                                       ?>
                                                        <td class="text-danger">
                                                            <?php echo $row['statusleave']  ?>
                                                        </td><?php }?>
                                                        <?php if ($row['statusleave'] == 'Approved') {
                                                       ?>
                                                         <td class="text-success">
                                                            <?php echo $row['statusleave'] ?>
                                                        </td><?php }?>
                                                        <td>
                                                            <a href="admin_leavesAction.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">View Details</a>
                                                        </td>
                                                    </tr><?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>

</html>