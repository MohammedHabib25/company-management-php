<?php
session_start();
include('dbcon.php');
$msg = '';


if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['pass'];
    $remmember = $_POST['rem'] ?? '';
    $query = "SELECT * FROM employeedetails WHERE empUsername = '$username' and password = '$password'";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        if (isset($_POST['rem'])) {
            $_SESSION['emp'] = $result->fetch_assoc();
            setcookie("emp", $username, time() + (30 * 24 * 60 * 60), "/");
            header('location:emp_dashbord.php');
        } else {
            $_SESSION['emp'] = $result->fetch_assoc();
            header('location:emp_dashbord.php');
        }
    } else {
        $msg = "Username or Password is Incorrect\nor your account is not Exist";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link href="assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />

    <title>Employee login</title>
    <style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: rgb(242, 242, 242);
    }

    form {
        width: 30%;
        min-height: 160px;
        background-color: white;
        display: flex;
        flex-direction: column;
        margin-top: 100px;
        padding: 30px;
    }

    .field {
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        margin-bottom: 10px;
    }

    .field label {
        margin: 15px 0px;
    }

    .field input {
        height: 25px;
    }

    .remmeber {
        margin: 20px 0px;
    }

    .fields {
        color: rgb(220, 53, 69);
        font-size: 25px;
    }


    .fieldo {
        font-size: 22px;
        align-self: center;
    }
    </style>

</head>

<body>






    <form method="post">
        <div class="fields">
            <h3 align="center"> Leave Management System </br>Employee Login</h4>
        </div><br>

        <div class="form-group col-md-16">
            <input type="text" name="username" class="form-control" id="inputEmail4" placeholder="employee Username">
        </div>
        <div class="form-group col-md-16">
            <input type="password" name="pass" class="form-control" id="inputPassword4" placeholder="Password">
        </div>
        <br>
        <div class="remmember">
            <input type="checkbox" name="rem" />
            <label>Remmember login? </label>
        </div>
        <br>
        <button type="submit" name="login" class="btn btn-primary">LOGIN</button>
        <br>
        <div class="fieldo">
            <a href="admin_login.php">login as Admin</a>
        </div>
        <br>
        <center><?php echo $msg; ?></center>
    </form>
    </div>
</body>

</html>