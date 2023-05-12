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
  $sel = "SELECT * FROM del_user where member_id = $member_id";
  $sel_run = mysqli_query($con, $sel);
  $row = mysqli_fetch_array($sel_run);
  $first_name = $row['first_name'];

  $query = "DELETE FROM del_user where member_id = '$member_id'";
  $query_run = mysqli_query($con,$query);

  if($query_run){
    $activity = "$uname Deleted $first_name in Recycle-Bin";
    $log = "INSERT INTO `acti-log` (date,activity) values ('$date','$activity')";
    mysqli_query($con, $log);
    echo '<script>alert("Member DELETED");
    window.location.href=" ../del-delete.php"</script>';
  }else{
    echo '<script>alert("Member not DELETED");
    window.location.href=" ../del-delete.php"</script>';

  }
}
?>
