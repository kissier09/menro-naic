<?php
session_start();

include "../connection.php";
include "function.php";
$user_data = check_login($con);
$center = "SELECT * FROM tbl_junkshop";
$centerrun = mysqli_query($con, $center);
$date = "2023";
if (isset($_POST['update'])) {
   $date = $_POST["dates"];
   
   }


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
                     <h1 class="m-0"><img src="../asset/img/report.png" width="40"> Income Reports</h1>
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
                     <form method="post" class="col-md-1">
                        <select class="form-control" name="dates">
                           <option value="2023">2023</option>
                           <option value="2024">2024</option>
                           <option value="2025">2025</option>
                           <option value="2026">2026</option>
                           <option value="2027">2027</option>
                           <option value="2028">2028</option>
                           <option value="2029">2029</option>
                           <option value="2030">2030</option>
                        </select>
                        <button type="submit" name="update">View</button>

                     </form>
                     <h1 class="d-flex h-100 align-items-center justify-content-center text-center"><b> INCOME
                        <?php echo $date ?></b>
                     </h1>
                     <table class="table table-bordered mytable">
                        <thead>


                           <td class="text-center"><strong>Center</strong></td>
                           <td><strong>Income</strong></td>
                        </thead>
                        <tbody>
                           <?php
                           if ($centerrun) {

                              while ($centername = mysqli_fetch_array($centerrun)) {
                                 $cname[] = $centername['shop_name'];
                                 $centern = $centername['shop_id'];
                                 $totalc = 0;
                                 ?>
                                 <tr>
                                    <td class="text-center"><strong>
                                          <?php echo $centername['shop_name'] ?>
                                       </strong></td>
                                    <?php
                                    $income = "SELECT total_amount FROM tbl_collection_record where  shop_id = $centern and date like '$date%%'";
                                    $income01 = mysqli_query($con, $income);
                                    while ($income1 = mysqli_fetch_array($income01)) {
                                       if ($income1 === null) {

                                       }
                                       $totalc += ($income1['total_amount']) * 2;



                                    }

                                    $ceincome[] = $totalc;
                                    ?>

                                    <td>
                                       <?php echo $totalc ?>
                                    </td>
                                 </tr>

                                 <?php
                              }
                           }
                           ?>
                        </tbody>
                     </table>
                  </div>
                  <div class="col-md-12">
                     <canvas id="chartjs-pie"></canvas>
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

   <script src="../asset/js/chart.js"></script>
   <script>
      document.addEventListener("DOMContentLoaded", function () {
         // Pie chart
         cename = <?php echo json_encode($cname) ?>;
         totali = <?php echo json_encode($ceincome) ?>;
         new Chart(document.getElementById("chartjs-pie"), {
            type: "pie",
            data: {
               labels: cename,
               datasets: [{
                  data: totali,
                  backgroundColor: [
                     window.theme.primary,
                     window.theme.warning,
                     window.theme.danger,
                     window.theme.success,
                     window.theme.secondary,
                  ],
                  borderColor: "transparent"
               }]
            },
            options: {
               maintainAspectRatio: true,
               legend: {
                  display: true
               }
            }
         });
      });
   </script>
</body>

</html>