<?php
session_start();
include("../../connection.php");
include("../function.php");
$user_data = check_login($con);
$uname = $user_data['fullname'];
date_default_timezone_set('Asia/manila');
$date = date("Y-m-d H:i:s");

if (isset($_POST['delete'])) {
    $recordId = $_POST['record_id'];

    $query = "DELETE FROM tbl_collection_record where record_id = '$recordId'";
    $query_run = mysqli_query($con, $query);
    $activity = "$uname Deleted Record in Collection-Record";
    $log = "INSERT INTO `acti-log` (date,activity) values ('$date','$activity')";
    mysqli_query($con, $log);
    if ($query_run) {
        echo '<script>alert("Record DELETED");
        window.location.href=" ../records.php"</script>';
    } else {
        echo '<script>alert("Record not DELETED");
        window.location.href=" ../records.php"</script>';
    }
}
?>
