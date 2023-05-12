<?php
session_start();
include("../../connection.php");
include("../function.php");
$user_data = check_login($con);
$uname = $user_data['fullname'];
date_default_timezone_set('Asia/manila');
$date = date("Y-m-d H:i:s");

if (isset($_POST['delete'])) {
    $shop_id = $_POST['shop_id'];
$sel = "SELECT * FROM tbl_junkshop where shop_id = $shop_id";
$sel_run = mysqli_query($con, $sel);
$row = mysqli_fetch_array($sel_run);
$shop_name = $row['shop_name'];
$address = $row['address'];
$contact = $row['contact'];
$email_address = $row['email_address'];
$google_map_location = $row['google_map_location'];
$retri = "INSERT INTO `del_shop`(shop_id, shop_name, address, contact, email_address, google_map_location) VALUES ('$shop_id','$shop_name','$address','$contact','$email_address','$google_map_location')";
mysqli_query($con, $retri);

    $query = "DELETE FROM tbl_junkshop where shop_id = '$shop_id'";
    $query_run = mysqli_query($con, $query);
    $activity = "$uname Deleted  $shop_name in Recycling Center";
    $log = "INSERT INTO `acti-log` (date,activity) values ('$date','$activity')";
    mysqli_query($con, $log);
    if ($query_run) {

        echo '<script>alert("Junkshop DELETED");
        window.location.href=" ../recycle-center.php"</script>';
       
    } else {
        echo '<script>alert("Junkshhop not DELETED");
        window.location.href=" ../recycle-center.php"</script>';
    }
}
?>
