<?php
session_start();

include("../../connection.php");
include("../function.php");
$user_data = check_login($con);
$uname = $user_data['fullname'];
date_default_timezone_set('Asia/manila');
$date = date("Y-m-d H:i:s");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
   $name = $_POST['name'];
   $description = $_POST['description'];
   $reward = $_POST['reward'];
   $image = $_FILES['image']['name'];
  


   if (!empty($name) && !empty($description) && !empty($reward) && !empty($image)) {

      $query = "INSERT INTO `tbl_garbage_type`(name, description, reward, image) VALUES ('$name','$description','$reward','$image')";
      $m = "../../../waste/asset/img/" . $image;
      move_uploaded_file($_FILES['image']['tmp_name'], $m);
      mysqli_query($con, $query);
      $activity = "$uname Added $name in garbage-type";
      $log = "INSERT INTO `acti-log` (date,activity) values ('$date','$activity')";
      mysqli_query($con, $log);
      echo '<script>alert("garbage successfully added");  
      window.location.href=" ../garbage-type.php"</script>';
      die;
   } else {
      echo "please enter an invalid information";

   }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>
      ADD GARBAGE <?php $activity?>
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
