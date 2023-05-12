<?php
session_start();

include("../../connection.php");
include("../function.php");
$user_data = check_login($con);
$uname = $user_data['fullname'];
date_default_timezone_set('Asia/manila');
$date = date("Y-m-d H:i:s");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
   $shop_name = $_POST['shop_name'];
   $address = $_POST['address'];
   $contact = $_POST['contact'];
   $email_address = $_POST['email_address'];
   $google_map_location = $_POST['google_map_location'];
   


   if (!empty($shop_name) && !empty($address) && !empty($contact) && !empty($email_address) && !empty($google_map_location) ) {

      $query = "INSERT INTO `tbl_junkshop`(shop_name, address, contact, email_address, google_map_location) VALUES ('$shop_name','$address','$contact','$email_address','$google_map_location')";

      mysqli_query($con, $query);
      $activity = "$uname Added $shop_name in Recycling Center";
      $log = "INSERT INTO `acti-log` (date,activity) values ('$date','$activity')";
      mysqli_query($con, $log);
      echo '<script>alert("enter successfully added");
      window.location.href=" ../recycle-center.php"</script>';
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
      ADD RECYCLING CENTER
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