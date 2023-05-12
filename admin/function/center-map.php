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

$shop_id = $_POST['shop_id'];
$query = "SELECT * FROM tbl_junkshop WHERE shop_id = '$shop_id'";
$query_run = mysqli_query($con, $query);


if ($query_run) {
    while ($row = mysqli_fetch_array($query_run)) {
        ?>

        <form class="text-center">
            <div class="card-header">
                <h5><img src="../../asset/img/recycle-center.png" width="40"> Junkshop Location</h5>
            </div>
            <div class="card-body">
                <div class="mapouter">
                    <div class="gmap_canvas">
                        <?php echo $row['google_map_location'] ?>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <a href="../recycle-center.php" class="btn btn-info" data-dismiss="modal">Close</a>
            </div>
            </form>
            <?php
    }
} else {
    echo "No Record Found";
}