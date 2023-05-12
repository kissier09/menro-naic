<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        UPDATE GARBAGE
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

<?php
session_start();
include("../../connection.php");
include("../function.php");
$user_data = check_login($con);
$uname = $user_data['fullname'];
date_default_timezone_set('Asia/manila');
$date = date("Y-m-d H:i:s");

$shop_id = $_POST['shop_id'];
$query = "SELECT * FROM tbl_junkshop WHERE shop_id = '$shop_id'";
$query_run = mysqli_query($con, $query);

if ($query_run) {
    while ($row = mysqli_fetch_array($query_run)) {
        ?>

        <body class="hold-transition login-page">
            <div class="login-box" style="width: 70%">
                <div class="card card-outline">
                    <section class="content">
                        <div class="container-fluid">
                            <div class="card">
                                <div class="card-header" style="background-color: rgb(79,128,226);color: rgb(255,255,255)">
                                    <h3 class="card-title">Junkshop Information</h3>
                                </div>
                                <div id="box">
                                    <form method="post" enctype="multipart/form-data">
                                        <div class="card-body">
                                            <div class="col-md-12">
                                                <div class="card-header">
                                                    <span class="fa fa-home"> Profile Information </span>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="form-group">
                                                            <input type="hidden" class="form-control" name="shop_id"
                                                                value="<?php echo $shop_id ?>">

                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="float-left">Junkshop Name</label>
                                                                <input type="text" class="form-control" name="shop_name"
                                                                    value="<?php echo $row['shop_name'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="float-left">Address</label>
                                                                <input type="text" class="form-control" name="address"
                                                                    value="<?php echo $row['address'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="float-left">Contact</label>
                                                                <input type="text" class="form-control" name="contact"
                                                                    value="<?php echo $row['contact'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="float-left">Email</label>
                                                                <input type="text" class="form-control" name="email_address"
                                                                    value="<?php echo $row['email_address'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="float-left">google map</label>
                                                                <input type="text" class="form-control"
                                                                    name="google_map_location">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                        <div class="card-footer">
                                            <a href="../recycle-center.php" class="btn btn-cancel"
                                                style="font-family: arial;background-color: rgba(28,153,84);color: rgb(235,235,235)">Cancel</a>
                                            <button type="submit" class="btn btn-save"
                                                style="background-color: rgba(28,153,84);color: rgb(235,235,235)"
                                                name="update">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </body>
        <?php
    }
} else {
    echo "No Record Found";
}

//update a users
if (isset($_POST['update'])) {
    $shop_name = $_POST['shop_name'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $email_address = $_POST['email_address'];
    $google_map_location = $_POST['google_map_location'];


    $update_query = "UPDATE tbl_junkshop SET shop_name='$shop_name',address='$address',contact='$contact',email_address='$email_address',google_map_location='$google_map_location' WHERE shop_id = '$shop_id'";
    if ($con->query($update_query) === TRUE) {

        $activity = "$uname Update $shop_name in Recycling-Center";
       $log = "INSERT INTO `acti-log` (date,activity) values ('$date','$activity')";
       mysqli_query($con, $log);
        echo '<script>alert("Center Update");  
    window.location.href=" ../recycle-center.php"</script>';

    } else {
        echo '<script>alert("Center not Update");  
        window.location.href=" ../recycle-center.php"</script>';
    }
}
?>



</html>