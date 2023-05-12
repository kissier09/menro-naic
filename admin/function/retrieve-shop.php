<?php
session_start();

include("../../connection.php");
include("../function.php");
$user_data = check_login($con);
$uname = $user_data['fullname'];
date_default_timezone_set('Asia/manila');
$date = date("Y-m-d H:i:s");

$shop_id = $_POST['shop_id'];
$query = "SELECT * FROM del_shop WHERE shop_id = '$shop_id'";
$query_run = mysqli_query($con, $query);
$row = mysqli_fetch_array($query_run);
$shop_name = $row['shop_name'];
$address = $row['address'];
$contact = $row['contact'];
$email_address = $row['email_address'];
$google_map_location = $row['google_map_location'];


    $retri = "INSERT into tbl_junkshop (shop_id,shop_name,address,contact,email_address,google_map_location) values ('$shop_id','$shop_name','$address','$contact','$email_address','$google_map_location')";
    mysqli_query($con, $retri);
    $del = "DELETE FROM del_shop where shop_id='$shop_id'";
    $del_run = mysqli_query($con, $del);
  
        $activity = "$uname Retrive $shop_name in Recycle-Bin";
        $log = "INSERT INTO `acti-log` (date,activity) values ('$date','$activity')";
        mysqli_query($con, $log);


    echo '<script>alert("shop successfully retrieve");
    window.location.href=" ../del-delete.php"</script>';
    die;

?>