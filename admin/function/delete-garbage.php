<?php
session_start();
include("../../connection.php");
include("../function.php");

$user_data = check_login($con);
$uname = $user_data['fullname'];
date_default_timezone_set('Asia/manila');
$date = date("Y-m-d H:i:s");

if (isset($_POST['delete'])) {
    $type_id = $_POST['type_id'];

    $query = "DELETE FROM tbl_garbage_type where type_id = '$type_id'";
    $query_run = mysqli_query($con, $query);
    $activity = "$uname Deleted Material in Garbage-type";
    $log = "INSERT INTO `acti-log` (date,activity) values ('$date','$activity')";
    mysqli_query($con, $log);
    if ($query_run) {
        echo '<script>alert("garbage type DELETED");
        window.location.href=" ../garbage-type.php"</script>';
    } else {
        echo '<script>alert("garbage type not DELETED");
        window.location.href=" ../garbage-type.php"</script>';

    }
}
?>