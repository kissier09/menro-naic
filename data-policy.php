<?php


include("connection.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if ($_POST['arrayValue'][0] === "check1" ) {
        if ($_POST['arrayValue'][1] === "check2") {
            header("Location: register.php");
       
          
        }
    
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
       DATA POLICY
    </title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/asset/fontawesome/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="asset/css/adminlte.min.css">
    <link rel="stylesheet" href="asset/css/style.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box" style="width: 25%">
        <!-- /.login-logo -->
        <div class="card card-outline">
            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header" style="background-color: rgba(28,153,84);color: rgb(235,235,235)">
                            <h3 class="card-title">DATA POLICY</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div id="box">
                            <form method="post" enctype="multipart/form-data" action="#">
                                <div class="col-md-12">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card-header">
                                                <span class="fa fa-key"> DATA POLICY</span>
                                            </div>
                                            <div class="form-group">
                                                <input type="checkbox" name="arrayValue[]" value="check1" required>
                                                We will use your information to communicate with you about this
                                                resource
                                                and other solutions, events and related resources that may be of
                                                interest to you. You may opt-out at any time using the unsubscribe
                                                in
                                                messages you receive from us. For more information, please see our
                                                <a href="https://trustarc.com/privacy-policy/">Privacy Policy.</a>
                                            </div>
                                            <div><input type="checkbox" name="arrayValue[]" value="check2" required>This site
                                                is
                                                protected by reCAPTCHA and the Google<a
                                                    href="https://policies.google.com/privacy"> Privacy Policy</a>
                                                and
                                                <a href="https://policies.google.com/terms"> Terms of Service
                                                    apply.</a>
                                            </div><br>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-block"
                                                    style="background-color: rgba(28,153,84);color: rgb(235,235,235)"
                                                    name="Agree">AGREE</button>
                                            </div><br>
                                            <div class="text-center">
                                                <a href="login.php" class="text-center btn btn-block"
                                                    style="font-family: fantasy;background-color: rgba(28,153,84);color: rgb(235,235,235)">Cancel
                                                </a>
                                            </div><br>
                                        </div>
                                    </div>

                                </div>
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