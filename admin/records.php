<?php
use Sabberworm\CSS\Property\Selector;

session_start();
include "../connection.php";
include "function.php";
$user_data = check_login($con);

$query = "SELECT * FROM tbl_collection_record";
$query_run = mysqli_query($con, $query);

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
   <link rel="stylesheet" href="../asset/tables/datatables-bs4/css/dataTables.bootstrap4.min.css">
   <style type="text/css">
      table tr td {
         padding: 0.3rem !important;
      }

      table tr td p {
         margin-top: -0.8rem !important;
         margin-bottom: -0.8rem !important;
         font-size: 0.9rem;
      }

      td a.btn {
         font-size: 0.7rem;
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
      <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <div class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">

                  <div class="col-sm-6">
                     <h1 class="m-0"><img src="../asset/img/records.png" width="40"> Collection Records</h1>
                  </div>
                  <!-- /.col -->
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
               <div class="card card-info">
                  <br>
                  <div class="col-md-12">
                     <a href="function/add-record.php" class="btn btn-success -3">Add Collection</a>
                     <table id="example1" class="table table-bordered">
                        <thead>

                           <tr>
                              <th>Member Name</th>
                              <th>Shop Name</th>
                              <th>Garbage Type</th>

                              <th>Quantity</th>
                              <th>Unit</th>
                              <th>Total Amount</th>
                              <th>Date</th>
                              <th>Process by</th>
                              <th>Status</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                           if ($query_run) {
                              while ($row = mysqli_fetch_array($query_run)) {
                                 $member_id = $row['member_id'];
                                 $shop_id = $row['shop_id'];
                                 $type_id = $row['type_id'];
                                 $processed_by = $row['processed_by'];
                                 ?>
                                 <tr>
                                    <td>
                                       <?php $sql = "SELECT first_name,middle_name,last_name FROM `tbl_member` where member_id = $member_id";
                                       $memberId = mysqli_query($con, $sql);
                                       $memberid = mysqli_fetch_array($memberId, MYSQLI_ASSOC);
                                       echo $memberid["first_name"];
                                       echo " ";
                                       echo $memberid["middle_name"];
                                       echo ", ";
                                       echo $memberid["last_name"];
                                       ?>

                                    </td>
                                    <td>
                                       <?php $sql = "SELECT shop_name FROM `tbl_junkshop` where shop_id = $shop_id";
                                       $shopId = mysqli_query($con, $sql);
                                       $shopid = mysqli_fetch_array($shopId, MYSQLI_ASSOC);
                                       echo $shopid["shop_name"];
                                       ?>
                                    </td>
                                    <td>
                                       <?php $sql = "SELECT name FROM `tbl_garbage_type` where type_id = $type_id";
                                       $typeId = mysqli_query($con, $sql);
                                       $typeid = mysqli_fetch_array($typeId, MYSQLI_ASSOC);
                                       echo $typeid["name"]; ?>
                                    </td>
                                    <td>
                                       <?php echo $row['quantity']; ?>
                                    </td>
                                    <td>
                                       <?php echo $row['unit']; ?>
                                    </td>
                                    <td>
                                       <?php echo $row['total_amount']; ?>
                                    </td>
                                    <td>
                                       <?php echo $row['date']; ?>
                                    </td>
                                    <td>
                                       <?php $sql = "SELECT fullname FROM `tbl_user` where user_id = $processed_by";
                                       $userId = mysqli_query($con, $sql);
                                       $userid = mysqli_fetch_array($userId, MYSQLI_ASSOC);
                                       echo $userid["fullname"];
                                       ?>
                                    </td>
                                    <td>
                                       <?php echo $row['status']; ?>
                                    </td>
                                    <td class="text-center">
                                       <form action="../admin/function/edit-record.php" method="post">
                                          <input type="hidden" name="record_id" value="<?php echo $row['record_id'] ?>">
                                          <input type="submit" name="edit" class="btn btn-success" value="EDIT"></input>

                                       </form>
                                       <form action="../admin/function/delete-record.php" onclick="return confirm('Are you sure you want to delete this Record?');" method="post">
                                          <input type="hidden" name="record_id" value="<?php echo $row['record_id'] ?>">
                                          <input type="submit" name="delete" class="btn btn-danger" value="DELETE"></input>

                                       </form>
                                    </td>
                                 </tr>
                                 <?php

                              }

                           } else {
                              echo "no record found";
                           }
                           ?>


                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
            <!-- /.container-fluid -->
         </section>
         <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
   </div>
   <!-- ./wrapper -->

   <!-- jQuery -->
   <script src="../asset/jquery/jquery.min.js"></script>
   <script src="../asset/js/bootstrap.bundle.min.js"></script>
   <script src="../asset/js/adminlte.js"></script>
   <!-- DataTables  & Plugins -->
   <script src="../asset/tables/datatables/jquery.dataTables.min.js"></script>
   <script src="../asset/tables/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
   <script src="../asset/tables/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
   <script src="../asset/tables/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
   <script>
      $(function () {
         $("#example1").DataTable();
      });
   </script>
</body>

</html>