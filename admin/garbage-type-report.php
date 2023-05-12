<?php
session_start();

include "../connection.php";
include "function.php";
$user_data = check_login($con);
$garbagetype = "SELECT * FROM tbl_garbage_type";
$garbagerun = mysqli_query($con, $garbagetype);
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
   <link rel="stylesheet" href="../asset/tables/datatables-bs4/css/dataTables.bootstrap4.min.css"
      intergrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
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
                     <h1 class="m-0"><img src="../asset/img/report.png" width="40"> Garbage Type Reports</h1>
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
                        <h1 class="d-flex h-100 align-items-center justify-content-center text-center"><b> COLLECTION 
                           <?php echo $date ?></b>
                        </h1>
                     
                     <table class="table table-bordered mytable">

                        <thead>

                           <th><strong>Garbage Type</strong></th>
                           <th>January</th>
                           <th>February</th>
                           <th>March</th>
                           <th>April</th>
                           <th>May</th>
                           <th>June</th>
                           <th>July</th>
                           <th>August</th>
                           <th>September</th>
                           <th>October</th>
                           <th>November</th>
                           <th>December</th>
                        </thead>
                        <?php
                        if ($garbagerun) {
                           while ($garbagename = mysqli_fetch_array($garbagerun)) {
                              $gname[] = $garbagename['name'];
                              $name = $garbagename['type_id'];
                              $january = 0;
                              $february = 0;
                              $march = 0;
                              $april = 0;
                              $may = 0;
                              $june = 0;
                              $july = 0;
                              $august = 0;
                              $september = 0;
                              $october = 0;
                              $november = 0;
                              $december = 0;

                              ?>
                              <tr>
                                 <td><strong>
                                       <?php echo $garbagename['name'] ?>
                                    </strong></td>
                                 <?php
                                 $january1 = "SELECT quantity From tbl_collection_record where type_id = $name and date like '$date-01%'";
                                 $jan01 = mysqli_query($con, $january1);
                                 while ($jan1 = mysqli_fetch_array($jan01)) {
                                    if ($jan1 === null) {

                                    }
                                    $january += $jan1['quantity'];


                                 }
                                 ?>

                                 <?php
                                 $february1 = "SELECT quantity From tbl_collection_record where type_id = $name and date like '$date-02%'";
                                 $feb01 = mysqli_query($con, $february1);
                                 while ($feb1 = mysqli_fetch_array($feb01)) {
                                    if ($feb1 === null) {

                                    }
                                    $february += $feb1['quantity'];


                                 }
                                 ?>
                                 <?php
                                 $march1 = "SELECT quantity From tbl_collection_record where type_id = $name and date like '$date-03%'";
                                 $mar01 = mysqli_query($con, $march1);
                                 while ($mar1 = mysqli_fetch_array($mar01)) {
                                    if ($mar1 === null) {

                                    }
                                    $march += $mar1['quantity'];


                                 }
                                 ?>
                                 <?php
                                 $april1 = "SELECT quantity From tbl_collection_record where type_id = $name and date like '$date-04%'";
                                 $apr01 = mysqli_query($con, $april1);
                                 while ($apr1 = mysqli_fetch_array($apr01)) {
                                    if ($apr1 === null) {

                                    }
                                    $april += $apr1['quantity'];


                                 }
                                 ?>
                                 <?php
                                 $may1 = "SELECT quantity From tbl_collection_record where type_id = $name and date like '$date-05%'";
                                 $may01 = mysqli_query($con, $may1);
                                 while ($mayy = mysqli_fetch_array($may01)) {
                                    if ($mayy === null) {

                                    }
                                    $may += $mayy['quantity'];


                                 }
                                 ?>
                                 <?php
                                 $june1 = "SELECT quantity From tbl_collection_record where type_id = $name and date like '$date-06%'";
                                 $jun01 = mysqli_query($con, $june1);
                                 while ($jun1 = mysqli_fetch_array($jun01)) {
                                    if ($jun1 === null) {

                                    }
                                    $june += $jun1['quantity'];


                                 }
                                 ?>
                                 <?php
                                 $july1 = "SELECT quantity From tbl_collection_record where type_id = $name and date like '$date-07%'";
                                 $jul01 = mysqli_query($con, $july1);
                                 while ($jul1 = mysqli_fetch_array($jul01)) {
                                    if ($jul1 === null) {

                                    }
                                    $july += $jul1['quantity'];


                                 }
                                 ?>
                                 <?php
                                 $august1 = "SELECT quantity From tbl_collection_record where type_id = $name and date like '$date-08%'";
                                 $aug01 = mysqli_query($con, $august1);
                                 while ($aug1 = mysqli_fetch_array($aug01)) {
                                    if ($aug1 === null) {

                                    }
                                    $augutst += $aug1['quantity'];


                                 }
                                 ?>
                                 <?php
                                 $september1 = "SELECT quantity From tbl_collection_record where type_id = $name and date like '$date-09%'";
                                 $sept01 = mysqli_query($con, $september1);
                                 while ($sept1 = mysqli_fetch_array($sept01)) {
                                    if ($sept1 === null) {

                                    }
                                    $september += $sept1['quantity'];


                                 }
                                 ?>
                                 <?php
                                 $october1 = "SELECT quantity From tbl_collection_record where type_id = $name and date like '$date-010%'";
                                 $oct01 = mysqli_query($con, $october1);
                                 while ($oct1 = mysqli_fetch_array($oct01)) {
                                    if ($oct1 === null) {

                                    }
                                    $october += $oct1['quantity'];


                                 }
                                 ?>
                                 <?php
                                 $november1 = "SELECT quantity From tbl_collection_record where type_id = $name and date like '$date-11%'";
                                 $nov01 = mysqli_query($con, $november1);
                                 while ($nov1 = mysqli_fetch_array($nov01)) {
                                    if ($nov1 === null) {

                                    }
                                    $november += $nov1['quantity'];


                                 }
                                 ?>
                                 <?php
                                 $december1 = "SELECT quantity From tbl_collection_record where type_id = $name and date like '$date-12%'";
                                 $dec01 = mysqli_query($con, $december1);
                                 while ($dec1 = mysqli_fetch_array($dec01)) {
                                    if ($dec1 === null) {

                                    }
                                    $december += $dec1['quantity'];


                                 }

                                 if ($garbagename['name'] === 'Carton') {
                                    $cartoncol[] = [$january, $february, $march, $april, $may, $june, $july, $august, $september, $october, $november, $december];
                                 } elseif ($garbagename['name'] === 'Paper') {
                                    $papercol = [$january, $february, $march, $april, $may, $june, $july, $august, $september, $october, $november, $december];
                                 } elseif ($garbagename['name'] === 'Can') {
                                    $cancol = [$january, $february, $march, $april, $may, $june, $july, $august, $september, $october, $november, $december];
                                 } elseif ($garbagename['name'] === 'Metal') {
                                    $metalcol = [$january, $february, $march, $april, $may, $june, $july, $august, $september, $october, $november, $december];
                                 } elseif ($garbagename['name'] === 'Electrical') {
                                    $electricalcol = [$january, $february, $march, $april, $may, $june, $july, $august, $september, $october, $november, $december];
                                 } elseif ($garbagename['name'] === 'Bottle') {
                                    $bottlecol = [$january, $february, $march, $april, $may, $june, $july, $august, $september, $october, $november, $december];
                                 }


                                 ?>


                                 <td>
                                    <div style="color: rgb(1,1,235)">
                                       <?php echo $january ?>
                                    </div>
                                    <div style="color: rgb(250,26,0)"> Kg</div>
                                 </td>
                                 <td>
                                    <div style="color: rgb(1,1,235)">
                                       <?php echo $february ?>
                                       <div style="color: rgb(250,26,0)"> Kg</div>
                                 </td>
                                 <td>
                                    <div style="color: rgb(1,1,235)">
                                       <?php echo $march ?>
                                       <div style="color: rgb(250,26,0)"> Kg</div>
                                 </td>
                                 <td>
                                    <div style="color: rgb(1,1,235)">
                                       <?php echo $april ?>
                                       <div style="color: rgb(250,26,0)"> Kg</div>
                                 </td>
                                 <td>
                                    <div style="color: rgb(1,1,235)">
                                       <?php echo $may ?>
                                       <div style="color: rgb(250,26,0)"> Kg</div>
                                 </td>
                                 <td>
                                    <div style="color: rgb(1,1,235)">
                                       <?php echo $june ?>
                                       <div style="color: rgb(250,26,0)"> Kg</div>
                                 </td>
                                 <td>
                                    <div style="color: rgb(1,1,235)">
                                       <?php echo $july ?>
                                       <div style="color: rgb(250,26,0)"> Kg</div>
                                 </td>
                                 <td>
                                    <div style="color: rgb(1,1,235)">
                                       <?php echo $august ?>
                                       <div style="color: rgb(250,26,0)"> Kg</div>
                                 </td>
                                 <td>
                                    <div style="color: rgb(1,1,235)">
                                       <?php echo $september ?>
                                       <div style="color: rgb(250,26,0)"> Kg</div>
                                 </td>
                                 <td>
                                    <div style="color: rgb(1,1,235)">
                                       <?php echo $october ?>
                                       <div style="color: rgb(250,26,0)"> Kg</div>
                                 </td>
                                 <td>
                                    <div style="color: rgb(1,1,235)">
                                       <?php echo $november ?>
                                       <div style="color: rgb(250,26,0)"> Kg</div>
                                 </td>
                                 <td>
                                    <div style="color: rgb(1,1,235)">
                                       <?php echo $december ?>
                                       <div style="color: rgb(250,26,0)"> Kg</div>
                                 </td>


                                 <?php

                                 ?>

                              </tr>
                              <?php
                           }
                        }
                        ?>
                        </tbody>
                     </table>
                  </div>
                  <div class="col-md-12">
                     <canvas id="bargraph"></canvas>
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
      gartype = <?php echo json_encode($gname) ?>;
      carton1 = <?php echo json_encode($cartoncol) ?>;
      paper1 = <?php echo json_encode($papercol) ?>;
      can1 = <?php echo json_encode($cancol) ?>;
      metal1 = <?php echo json_encode($metalcol) ?>;
      electrical1 = <?php echo json_encode($electricalcol) ?>;
      bottle1 = <?php echo json_encode($bottlecol) ?>;


      document.addEventListener("DOMContentLoaded", function () {


         var barChartData = {

            labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "Novermber", "December"],
            xlabels: ("kg"),
            datasets: [{
               label: gartype[0],
               backgroundColor: 'rgb(79,129,189)',
               borderWidth: 1,
               data: carton1
            },
            {
               label: gartype[1],
               backgroundColor: 'rgb(192,80,77)',
               borderWidth: 1,
               data: paper1
            },
            {
               label: gartype[2],
               backgroundColor: 'rgb(46,231,126)',
               borderWidth: 1,
               data: can1
            },
            {
               label: gartype[3],
               backgroundColor: 'rgb(94,121,321)',
               borderWidth: 1,
               data: metal1
            },
            {
               label: gartype[4],
               backgroundColor: 'rgb(79,126,77)',
               borderWidth: 1,
               data: electrical1
            },
            {
               label: gartype[5],
               backgroundColor: 'rgb(279,226,237)',
               borderWidth: 1,
               data: bottle1
            }



            ]
         };


         var ctx = document.getElementById('bargraph').getContext('2d');
         window.myBar = new Chart(ctx, {

            type: 'bar',
            data: barChartData,
            options: {
               responsive: true,
               legend: {
                  display: true,
               }
            }
         });

      });
   </script>
</body>

</html>