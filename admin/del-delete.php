<?php

session_start();
include "../connection.php";
include "function.php";
$user_data = check_login($con);

$query = "SELECT * FROM del_user";
$query_run = mysqli_query($con, $query);
$del_query = "SELECT * FROM del_shop";
$del_query_run = mysqli_query($con, $del_query);
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Waste-Management-System</title>

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
            font-size: 0.6rem;
        }

        td a.btn {
            font-size: 0.3rem;
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

            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"></h1>
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
                    <div class="card card-info">
                        <br>
                        <div class="content-header">
                            <div class="container-fluid">
                                <div class="row mb-2">
                                    <div class="col-sm-6">
                                        <h1 class="m-0">Delete Member

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <table id="example1" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Member ID</th>
                                            <th>Last Name</th>
                                            <th>First Name</th>
                                            <th>Middle Name</th>
                                            <th>Gender</th>
                                            <th>Birthday</th>
                                            <th>Contact</th>
                                            <th>Email</th>
                                            <th>Profile Picture</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Account Status</th>
                                            <th>Options</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        if ($query_run) {
                                            while ($row = mysqli_fetch_array($query_run)) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $row['member_id']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['last_name']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['first_name']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['middle_name']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['gender']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['birthday']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['contact']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['email_address']; ?>
                                                    </td>
                                                    <td>
                                                        <img src="../asset/img/profile/<?php echo $row['profile_picture']; ?>"
                                                            width="150" style="border-radius: 5px">

                                                    </td>
                                                    <td>
                                                        <?php echo $row['username']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['password']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['account_status']; ?>
                                                    </td>
                                                    <td>
                                                        <form action="../admin/function/retrieve-user.php" method="post">
                                                            <input type="hidden" name="member_id"
                                                                value="<?php echo $row['member_id'] ?>">
                                                            <input type="submit" name="edit" class="btn btn-success"
                                                                value="RETRIEVE"></input>

                                                        </form>
                                                        <form action="../admin/function/del-delete-user.php" onclick="return confirm('Are you sure you want to delete this Member?');" method="post">
                                                            <input type="hidden" name="member_id"
                                                                value="<?php echo $row['member_id'] ?>">
                                                            <input type="submit" name="delete" class="btn btn-danger"
                                                                value="DELETE"></input>
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
            </section>
            <section class="content">
                <div class="container-fluid">
                    <div class="card card-info elevation-2">
                        <br>
                        <div class="content-header">
                            <div class="container-fluid">
                                <div class="row mb-2">
                                    <div class="col-sm-6">
                                        <h1 class="m-0">Delete Junkshop

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <table id="example2" class="table">
                                    <thead class="btn-cancel">
                                        <strong>
                                            <tr>
                                                <th>Junkshop Name</th>
                                                <th>Address</th>
                                                <th>Contact</th>
                                                <th>Email</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </strong>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($del_query_run) {
                                            while ($row = mysqli_fetch_array($del_query_run)) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $row['shop_name']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['address']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['contact']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['email_address']; ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <form action="../admin/function/retrieve-shop.php" method="post">

                                                            <input type="hidden" name="shop_id"
                                                                value="<?php echo $row['shop_id'] ?>">
                                                            <input type="submit" name="Retrieve" class="btn btn-success"
                                                                value="RETRIEVE"></input>


                                                        </form>
                                                        <form action="../admin/function/del-del-shop.php" onclick="return confirm('Are you sure you want to delete this Center?');" method="post">
                                                            <a class="btn btn-sm btn-danger">
                                                                <input type="hidden" name="shop_id"
                                                                    value="<?php echo $row['shop_id'] ?>">
                                                                <input type="submit" name="delete" class="btn btn-danger"
                                                                    value="DELETE"></input>

                                                            </a>
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
            </section>

        </div>
    </div>
</body>

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
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
<script>
    $(function () {
        $("#example2").DataTable();
    });
</script>