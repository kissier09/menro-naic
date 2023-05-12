<?php
session_start();

include "../connection.php";
include "function.php";
$user_data = check_login($con);
$uname = $user_data['fullname'];
date_default_timezone_set('Asia/manila');
$date = date("Y-m-d H:i:s");



?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Waste-Management-System</title>
   <!-- Font Awesome -->
   <link rel="stylesheet" href="../asset/fontawesome/css/all.min.css">
   <link rel="stylesheet" href="../asset/css/adminlte.min.css">
   <link rel="stylesheet" href="../asset/css/style.css">
   <link rel="stylesheet" href="../asset/tables/datatables-bs4/css/dataTables.bootstrap4.min.css"
      intergrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
   <style>
      body {
         background-color: #E7E9EB;
      }

      #myDIV {
         height: 300px;
         background-color: #FFFFFF;
      }

      .ex1 {
         background-color: lightblue;
         width: 350px;
         height: 300px;
         overflow: auto;
      }
   </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
   <div class="wrapper">
      <nav class="main-header navbar navbar-expand navbar-light" style="background-color: rgb(79,128,226)">
         <!-- Left navbar links -->
         <ul class="navbar-nav">
            <li class="nav-item">
               <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
         </ul>
         <ul class="navbar-nav ml-auto">
            <li class="nav-item">
               <a class="nav-link" href="function/view-profile.php" role="button" style="color: rgb(255,255,255)">
                  <?php echo $user_data['fullname'] ?>
                  <img src="../asset/img/profile/<?php echo $user_data['avatar'] ?>" class="img-circle" alt="User Image"
                     width="40" style="margin-top: -8px;">
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                  <i class="fas fa-expand-arrows-alt"></i>
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link" data-widget="fullscreen" href="../logout.php">
                  <i class="fas fa-sign-out-alt"></i>
               </a>
            </li>
         </ul>
      </nav>
      <aside class="main-sidebar sidebar-light-primary" style="background-color:rgb(79,128,226)">
         <!-- Brand Logo -->
         <a src="../asset/img/menro0.png" class="brand-link">
            <img src="../asset/img/menro0.png" alt="DSMS Logo" width="200">
         </a>
         <div class="sidebar">
            <nav class="mt-2">
               <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <li class="nav-item">
                     <a href="dashboard.php" class="nav-link" style="background-color:rgb(21,205,202)">
                        <img src="../asset/img/dashboard.png" width="30">
                        <p style="color: rgb(25,25,255)">
                           Dashboard
                        </p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="recycle-center.php" class="nav-link" style="background-color:rgb(21,205,202)">
                        <img src="../asset/img/recycle-center.png" width="30">
                        <p style="color: rgb(25,25,255)">
                           Recycling Center
                        </p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="garbage-type.php" class="nav-link" style="background-color:rgb(21,205,202)">
                        <img src="../asset/img/garbage-type.png" width="30">
                        <p style="color: rgb(25,25,255)">
                           Garbage Type
                        </p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="member.php" class="nav-link" style="background-color:rgb(21,205,202)">
                        <img src="../asset/img/member.png" width="30">
                        <p style="color: rgb(25,25,255)">
                           Members
                        </p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="records.php" class="nav-link" style="background-color:rgb(21,205,202)">
                        <img src="../asset/img/records.png" width="30">
                        <p style="color: rgb(25,25,255)">
                           Collection Record
                        </p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="#" class="nav-link" style="background-color:rgb(21,205,202)">
                        <img src="../asset/img/report.png" width="30">
                        <p style="color: rgb(25,25,255)">
                           Reports
                        </p>
                        <i class="right fas fa-angle-left"></i>
                     </a>
                     <ul class="nav nav-treeview">
                        <li class="nav-item">
                           <a href="garbage-type-report.php" class="nav-link" style="background-color:rgb(21,205,202)">
                              <i class="nav-icon far fa-circle"></i>
                              <p style="color: rgb(25,25,255)">Garbage Type</p>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="income-report.php" class="nav-link" style="background-color:rgb(21,205,202)">
                              <i class="nav-icon far fa-circle"></i>
                              <p style="color: rgb(25,25,255)">Income by Center</p>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <li class="nav-item">
                     <a href="del-delete.php" class="nav-link" style="background-color:rgb(21,205,202)">
                        <img src="../asset/img/recycle-bin.png" width="30">
                        <p style="color: rgb(25,25,255)">
                           Recycle Bin
                        </p>
                     </a>
                  </li>
               </ul>
            </nav>
         </div>
      </aside>
      <div class="content-wrapper" >
         <div class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-6">
                     <h1 class="m-0"><img src="../asset/img/dashboard.png" width="40">Dashboard </h1>
                  </div>
                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                     </ol>
                  </div>
               </div>
            </div>
         </div>
         <section class="content">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-12 col-sm-8 col-md-8 offset-sm-2 offset-md-2 offset-lg-2">
                     <div class="info-box">
                        <span class="info-box-icon text-success elevation-4"><img src="../asset/img/recycle-center.png"
                              width="50"></span>

                        <div class="info-box-content">
                           <span class="info-box-text">
                              <h5>Recycling Centers </h5>

                           </span>
                           <span class="info-box-number">
                              <h2>

                                 <?php
                                 $query = "SELECT shop_id from tbl_junkshop order by shop_id";
                                 $query_run = mysqli_query($con, $query);
                                 $row = mysqli_num_rows($query_run);
                                 echo $row;
                                 ?>
                              </h2>
                           </span>
                        </div>
                     </div>
                  </div>
                  <div class="col-12 col-sm-8 col-md-8 offset-sm-2 offset-md-2 offset-lg-2">
                     <div class="info-box">
                        <span class="info-box-icon text-info elevation-4"><img src="../asset/img/member.png"
                              width="50"></span>

                        <div class="info-box-content">
                           <span class="info-box-text">
                              <h5>Members</h5>
                           </span>
                           <span class="info-box-number">
                              <h2>
                                 <?php
                                 $query = "SELECT member_id from tbl_member order by member_id";
                                 $query_run = mysqli_query($con, $query);
                                 $row = mysqli_num_rows($query_run);
                                 echo $row;
                                 ?>
                              </h2>
                           </span>
                        </div>
                     </div>
                  </div>
                  <div class="col-12 col-sm-8 col-md-8 offset-sm-2 offset-md-2 offset-lg-2">
                     <div class="info-box">
                        <span class="info-box-icon text-warning elevation-4"><img src="../asset/img/garbage-collect.png"
                              width="50"></span>

                        <div class="info-box-content">
                           <span class="info-box-text">
                              <h5>Garbage Collected</h5>
                           </span>
                           <span class="info-box-number">
                              <h2>
                                 <?php
                                 $query = "SELECT record_id from tbl_collection_record order by record_id";
                                 $query_run = mysqli_query($con, $query);
                                 $row = mysqli_num_rows($query_run);
                                 echo $row;
                                 ?>
                              </h2>
                           </span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <h1 class="col-12 col-sm-8 col-md-8 offset-sm-2 offset-md-2 " style="color: rgb(255,0,0)">Activity Log</h1>
         <div id="myDIV" class=" col-sm-8 col-md-2 offset-sm-2 ">
            <div class="ex1" >
               <?php
               $log = "SELECT * FROM `acti-log`";
               $log_run = mysqli_query($con, $log);
               if ($log_run) {
                  while ($row = mysqli_fetch_array($log_run)) {
                     ?>

                     <p style="background-color: rgb(204,229,255)">
                        <p style="color: rgb(25,25,255)"><?php echo $row['date'] ?></p><br>
                        <?php echo $row['activity'] ?>

                     </p>

                  <?php }
               }
               ?>
            </div>
         </div>
      </div>
   </div>
   <!-- jQuery -->
   <script src="../asset/jquery/jquery.min.js"></script>
   <script src="../asset/js/adminlte.js"></script>
</body>

</html>