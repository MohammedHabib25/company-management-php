<?php
include('dbcon.php');
session_start();
include("admin_session.php");
$msg = '';
$leaveId = intval($_GET['id']);
if (isset($_POST['takeaction'])) {
        $status = $_POST['status'];

    if(!isset($status)){
    $msg = "Please Enter Status of Leaves";
    }
    else
    {$query = "UPDATE leavesdata SET
              statusleave='$status'
              WHERE id='$leaveId'";
    if (mysqli_query($con, $query)) {
        $msg = "action taken Successfully";
    } else {
        $msg = "error taking Action\nTry again" . mysqli_error($con);
    }}
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>Leave Action</title>
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

        #xcs {
            font-size: 18px;
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
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <a class="navbar-brand" href="javascript:;">Leave Details</a>
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
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="content">
                <div class="container-fluid">
                <?php if (isset($msg) && $msg) { ?><div class="alert alert-dark" role="alert">
                        <?php echo $msg; ?>
                    </div><?php } ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title ">Leave Details</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">

                                            <tbody>
                                                <?php
                                                $sel_query = "Select * from leavesData WHERE id='$leaveId'";
                                                $result = mysqli_query($con, $sel_query);
                                                $row = mysqli_fetch_assoc($result);
                                                /////////
                                                $usernameEMP = $row['empusername'];
                                                $query = "SELECT * FROM employeedetails WHERE empUsername='$usernameEMP'";
                                                $result1 = mysqli_query($con, $query);
                                                $row1 = mysqli_fetch_assoc($result1)
                                                ?>
                                                <tr>
                                                    <td>
                                                        <label for="">Employee Name:</label>
                                                        <?php echo $row1['fname'];
                                                        echo $row1['lname']  ?>
                                                    </td>
                                                    <td>
                                                        <label for="">Employee Username:</label>
                                                        <?php echo $row1['empUsername']  ?>
                                                    </td>
                                                    <td>
                                                        <label for="">Employee Gender:</label>
                                                        <?php echo $row1['gender']  ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="">Employee Email:</label>

                                                        <?php echo $row1['email']  ?>
                                                    </td>
                                                    <td>
                                                        <label for="">Employee Contact Phone:</label>
                                                        <?php echo $row1['Phonenumber']  ?>
                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td>
                                                        <label for="">Leave type:</label>
                                                        <?php echo $row['leavetype']  ?>
                                                    </td>
                                                    <td>
                                                        <label for="">Leave Date from:</label>
                                                        <?php echo $row['fromDate']  ?>
                                                    </td>
                                                    <td>
                                                        <label for="">Leave Date to:</label>

                                                        <?php echo $row['toDate']  ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="">Leave id:</label>
                                                        <?php echo $row['id']  ?>
                                                    </td>
                                                    <td>
                                                        <label for="">Posting Date:</label>

                                                        <?php echo $row['createdAt']  ?>
                                                    </td>
                                                    <td>
                                                        <label for="">Employee Leave Descrption:</label>

                                                        <?php echo $row['description']  ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> <label id="xcs">Leave status:</label> </td>
                                                    <?php if ($row['statusleave'] == 'waiting Approved') {
                                                    ?>
                                                        <td class="text-warning">
                                                            <?php
                                                            echo $row['statusleave']  ?>
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
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if ($row['statusleave'] == 'waiting Approved') { ?>
                        <form method="post">
                            <div class="form-group col-md-3">
                                <label for="inputState">Leave status</label>
                                <select name="status" id="status" class="form-control">
                                        <option value="" disabled="disabled" selected="selected">select a leave  Status</option>
                                    <option value="Approved">Approved</option>
                                    <option value="Not Approved">Not Approved</option>
                                </select>
                            </div>
                            <button type="submit" name="takeaction" class="btn btn-primary">Take Action</button>
                            <br>
                </div>
                </form><?php } ?>
            </div>
        </div>

    </div>
    </div>
</body>

</html>