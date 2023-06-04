<?php
session_start();
include('dbcon.php');
include('getdata.php');
if (!isset($_SESSION['emp'])) {
    header('location:index.php');
}
$msg = '';
$leaveId = intval($_GET['leaveId']);
?>

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

    #xcs {
        font-size: 17px;
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
                    Welcome, <?php echo $usse; ?>
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
                    <li class="nav-item active">
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
                                    <?php echo $_SESSION['user']; ?>
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

                                <tbody>
                                    <?php
                                    $sel_query = "Select * from leavesData WHERE id='$leaveId'";
                                    $result = mysqli_query($con, $sel_query);
                                    $row = mysqli_fetch_assoc($result);
                                    ?>
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
                                        <td> <label id="xcs">Leave status:</label></td>
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
    </div>
    </div>
    </div>
</body>

</html>