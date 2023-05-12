<?php
session_start();

include("../../connection.php");
include("../function.php");
$user_data = check_login($con);
$uname = $user_data['fullname'];
date_default_timezone_set('Asia/manila');
$date = date("Y-m-d H:i:s");

$member_id = $_POST['member_id'];
$query = "SELECT * FROM del_user WHERE member_id = '$member_id'";
$query_run = mysqli_query($con, $query);
$row = mysqli_fetch_array($query_run);
$last_name = $row['last_name'];
$first_name = $row['first_name'];
$middle_name = $row['middle_name'];
$gender = $row['gender'];
$birthday = $row['birthday'];
$contact = $row['contact'];
$email_address = $row['email_address'];
$profile_picture = $row['profile_picture'];
$username = $row['username'];
$password = $row['password'];
$account_status = $row['account_status'];
$fullname = $row['first_name'] . " " . $row['middle_name'] . " " . $row['last_name'];


if ($account_status === "Member") {

    $query = "INSERT into tbl_member (member_id,last_name,first_name,middle_name,gender,birthday,contact,email_address,profile_picture,username,password,account_status) values ('$member_id','$last_name','$first_name','$middle_name','$gender','$birthday','$contact','$email_address','$profile_picture','$username','$password','$account_status')";
    mysqli_query($con, $query);
    $del = "DELETE FROM del_user where member_id='$member_id'";
    $del_run = mysqli_query($con, $del);
    $activity = "$uname Retrive $fullname in Recycle-Bin";
    $log = "INSERT INTO `acti-log` (date,activity) values ('$date','$activity')";
    mysqli_query($con, $log);


    echo '<script>alert("account successfully retrieve");
    window.location.href=" ../del-delete.php"</script>';
    die;
}
?>