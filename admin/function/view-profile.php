<?php
session_start();

include "../../connection.php";
include("../function.php");
$user_data = check_login($con);
?>
<!DOCTYPE html>z
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        PROFILE INFORMATION
    </title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../asset/fontawesome/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../asset/css/adminlte.min.css">
    <link rel="stylesheet" href="../../asset/css/style.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box" style="width: 70%">
        <!-- /.login-logo -->
        <div class="card card-outline">
            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header" style="background-color: rgba(28,153,84);color: rgb(235,235,235)">
                            <h3 class="card-title">Profile Information</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div id="box">
                            <form method="post" enctype="multipart/form-data">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group"><br>
                                                <img src="../../asset/img/profile/<?php echo $user_data['avatar'] ?>"
                                                    width="150" style="border-radius: 5px">
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="card-header">
                                                <span class="fa fa-user"> Profile Information</span>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>FULL NAME</label><br>
                                                        <strong>
                                                            <?php echo $user_data['fullname'] ?>
                                                        </strong>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Contact</label><br>
                                                        <strong>
                                                            <?php echo $user_data['contact'] ?>
                                                        </strong>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Email</label><br>
                                                        <strong>
                                                            <?php echo $user_data['email'] ?>
                                                        </strong>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="card-header">
                                                        <span class="fa fa-key"> Account</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Username</label><br>
                                                        <strong>
                                                            <?php echo $user_data['username'] ?>
                                                        </strong>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Password</label><br>
                                                        <strong>************</strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="row">
                                    <div class="col-12">

                                        <a href="../dashboard.php" class="text-center btn btn-block"
                                            style="font-family: fantasy;background-color: rgba(28,153,84);color: rgb(235,235,235)">HOME</a>
                                    </div>

                                </div><br>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->
</body>

</html>