<?php 
session_start();
include("../../connection.php");
include("../function.php");
$user_data = check_login($con);
$uname = $user_data['fullname'];
date_default_timezone_set('Asia/manila');
$date = date("Y-m-d H:i:s");

if(isset($_POST['delete'])){
  $member_id = $_POST['member_id'];
  $sel = "SELECT * FROM tbl_member where member_id = $member_id";
  $sel_run = mysqli_query($con, $sel);
  $row = mysqli_fetch_array($sel_run);
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
  $retri = "INSERT into del_user (member_id,last_name,first_name,middle_name,gender,birthday,contact,email_address,profile_picture,username,password,account_status) values ('$member_id','$last_name','$first_name','$middle_name','$gender','$birthday','$contact','$email_address','$profile_picture','$username','$password','$account_status')";
  mysqli_query($con, $retri);
  $query = "DELETE FROM tbl_member where member_id = '$member_id'";
  $query_run = mysqli_query($con,$query);

  if($query_run){
    $activity = "$uname Deleted $username in member";
    $log = "INSERT INTO `acti-log` (date,activity) values ('$date','$activity')";
    mysqli_query($con, $log);
    echo '<script>alert("Member DELETED");
    window.location.href=" ../member.php"</script>';
  }else{
    echo '<script>alert("Member not DELETED");
    window.location.href=" ../member.php"</script>';

  }
}
?>
