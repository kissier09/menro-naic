<?php
session_start();

include("connection.php");


if ($_SERVER['REQUEST_METHOD'] == "POST") {
   $username = $_POST['username'];
   $password = $_POST['password'];
   if (!empty($username) && !empty($password) && !is_numeric($username)) {

      if ($query = "SELECT * from tbl_user WHERE username = '$username' limit 1") {
         $result = mysqli_query($con, $query);

         if ($result) {
            if ($result && mysqli_num_rows($result) > 0) {
               $user = mysqli_fetch_assoc($result);
               if ($user['password'] === $password) {
                  $_SESSION['user_id'] = $user['user_id'];
                  if ($user['status'] === "Admin") {
                     header("Location: admin/dashboard.php");
                  } elseif ($user['status'] === "Junkshop") {
                     header("Location: admin/Junkshop/junkshop.php");
                  } else {
                     die;
                  }
               } else {
                  echo "invalid password";

               }

            }


         }


      }

      if ($query = "SELECT * from tbl_member WHERE username = '$username' limit 1") {
         $result = mysqli_query($con, $query);

         if ($result) {
            if ($result && mysqli_num_rows($result) > 0) {
               $user_data = mysqli_fetch_assoc($result);
               if ($user_data['password'] === $password) {
                  $_SESSION['member_id'] = $user_data['member_id'];
                  if ($user_data['account_status'] === "Member") {
                     header("Location: member/index.php");

                  } else {
                     die;
                  }
               } else {
                  echo "invalid password ";

               }

            }
         } else {
            echo "invalid username ";
         }
      }




   } else {
      echo "PLEASE INPUT DATA";

   }



}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Waste-Management-System</title>
   <!-- Google Font: Source Sans Pro -->
   <link rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="asset/fontawesome/css/all.min.css">
   <!-- Theme style -->
   <link rel="stylesheet" href="asset/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
   <div class="login-box">
      <!-- /.login-logo -->
      <div class="card card-outline">
         <div class="card-header text-center">
            <a href="asset/img/menro0.png" style="background-color: rgb(86,181,42)">
               <img src="asset/img/menro0.png" alt="DSMS Logo" width="300">
            </a>
         </div>
         <div id="box">
            <form method="post">
               <div class="card-body">
                  <div class="input-group mb-3">
                     <input type="text" class="form-control" name="username">
                     <div class="input-group-append">
                        <div class="input-group-text">
                           <span class="fas fa-user"></span>
                        </div>
                     </div>
                  </div>
                  <div class="input-group mb-3">
                     <input type="password" class="form-control" name="password">
                     <div class="input-group-append">
                        <div class="input-group-text">
                           <span class="fas fa-lock"></span>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-6">
                        <button type="submit" class="btn btn-block"
                           style="background-color: rgba(28,153,84);color: rgb(235,235,235)">Login</button>
                     </div>
                     <div class="col-6">
                        <a href="data-policy.php" class="btn btn-block"
                           style="background-color: rgba(28,153,84);color: rgb(235,235,235)">Register Account</a>
                     </div>
                  </div>
               </div>
            </form>
         </div>
         <!-- /.card-body -->
      </div>
      <!-- /.card -->
   </div>
   <!-- /.login-box -->
</body>

</html>