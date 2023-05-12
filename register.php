<?php
session_start();

include("connection.php");
include("function.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
   $last_name = $_POST['last_name'];
   $first_name = $_POST['first_name'];
   $middle_name = $_POST['middle_name'];
   $gender = $_POST['gender'];
   $birthday = $_POST['birthday'];
   $contact = $_POST['contact'];
   $email_address = $_POST['email_address'];
   $profile_picture = $_FILES['profile_picture']['name'];
   $username = $_POST['username'];
   $password = $_POST['password'];
   $account_status = $_POST['account_status'];
   $fullname = $_POST['first_name'] . " " . $_POST['middle_name'] . " " . $_POST['last_name'];
 




   if (!empty($last_name) && !empty($first_name) && !empty($middle_name) && !empty($gender) && !empty($contact) && !empty($email_address) && !empty($profile_picture) && !empty($birthday) && !empty($username) && !empty($password) && !empty($account_status)) {
      if ($account_status === "Member") {
         if (isset($_POST['Register'])) {
            $m = "../waste/asset/img/profile/" . $profile_picture;
            move_uploaded_file($_FILES['profile_picture']['tmp_name'], $m);
            $query = "INSERT into tbl_member (last_name,first_name,middle_name,gender,birthday,contact,email_address,profile_picture,username,password,account_status) values ('$last_name','$first_name','$middle_name','$gender','$birthday','$contact','$email_address','$profile_picture','$username','$password','$account_status')";
            mysqli_query($con, $query);
            echo '<script>alert("Account successfully added");  
            window.location.href="login.php"</script>';
            die;
          
         }


      } elseif ($account_status === "Admin") {
         $user_group_id = "1";
         if (isset($_POST['Register'])) {
            $m = "../waste/asset/img/profile/" . $_FILES['profile_picture']['name'];
            move_uploaded_file($_FILES['profile_picture']['tmp_name'], $m);
            $query = "INSERT into tbl_user (username,password,avatar,fullname,contact,email,user_category_id,status) values ('$username','$password','$profile_picture','$fullname','$contact','$email_address','$user_group_id','$account_status')";
            mysqli_query($con, $query);
            echo '<script>alert("Account successfully added");  
            window.location.href="login.php"</script>';
            die;
         }

      } elseif ($account_status === "Junkshop") {
         $user_group_id = "2";
         if (isset($_POST['Register'])) {
            $m = "../waste/asset/img/profile/" . $_FILES['profile_picture']['name'];
            move_uploaded_file($_FILES['profile_picture']['tmp_name'], $m);
            $query = "INSERT into tbl_user (username,password,avatar,fullname,contact,email,status) values ('$username','$password','$profile_picture','$fullname','$contact','$email_address','$account_status')";
            mysqli_query($con, $query);
            echo '<script>alert("Account successfully added");  
            window.location.href="login.php"</script>';
            die;
         }

      } else {
         header("Location: login.php");
         die;
      }
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
      Registration
   </title>
   <!-- Google Font: Source Sans Pro -->
   <link rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="asset/fontawesome/css/all.min.css">
   <!-- Theme style -->
   <link rel="stylesheet" href="asset/css/adminlte.min.css">
   <link rel="stylesheet" href="asset/css/style.css">
</head>

<body class="hold-transition login-page">
   <div class="login-box" style="width: 70%">
      <!-- /.login-logo -->
      <div class="card card-outline">
         <section class="content">
            <div class="container-fluid">
               <div class="card">
                  <div class="card-header" style="background-color: rgb(79,128,226);color: rgb(255,255,255)">
                     <h3 class="card-title">Profile Information</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <div id="box">
                     <form method="post" enctype="multipart/form-data">
                        <div class="col-md-12">
                           <div class="row">
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <img src="asset/img/profile.png" width="150" style="border-radius: 5px">
                                    <label for="exampleInputFile" >Choose Profile</label>
                                    <div class="input-group">
                                       <div class="custom-file">
                                          <input type="file" class="custom-file-input" name="profile_picture"
                                             accept=".jpg,.jpeg,.png,.jfif">
                                          <label class="custom-file-label">Choose file</label>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-9">
                                 <div class="card-header">
                                    <img src="asset/img/th.jpg" class="col-md-1"><strong>Required Information<strong></img>
                                    </div><br>
                                    <span class="fa fa-user"> Profile Information</span>

                                 </div>

                                 <div class="row">
                                    <div class="col-md-4">
                                       <div class="">
                                          <label class="font-family:fantasy">First Name *</label>
                                          <input type="text" class="form-control" name="first_name">
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="form-group">
                                          <label>Middle Name *</label>
                                          <input type="text" class="form-control" name="middle_name">
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="form-group">
                                          <label>Last Name *</label>
                                          <input type="text" class="form-control" name="last_name">
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="form-group">
                                          <label>Gender *</label>
                                          <select class="form-control" name="gender">
                                             <option value="Male">Male</option>
                                             <option value="Female">Female</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="form-group">
                                          <label>Birthday *</label>
                                          <input type="date" class="form-control" name="birthday">
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="form-group">
                                          <label>Contact</label>
                                          <input type="number" class="form-control" name="contact">
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label>Email *</label>
                                          <input type="email" class="form-control" name="email_address">
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="font-text:arial">
                                          <label>Address *</label>
                                          <input type="text" class="form-control" name="address">
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="form-group">
                                          <label>status *</label>
                                          <select class="form-control" name="account_status">
                                             <option value="Member">Member</option>
                                             <option value="Admin">Admin</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-md-12">
                                       <div class="card-header">
                                          <span class="fa fa-key"> Account </span>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label>Username *</label>
                                          <input type="text" class="form-control" name="username">
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label>Password *</label>
                                          <input type="password" class="form-control" name="password">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="row">
                           <div class="col-6">
                              <button type="submit" class="btn btn-block"
                                 style="background-color: rgba(28,153,84);color: rgb(235,235,235)"
                                 name="Register">Register</button>
                           </div>
                           <div class="col-6">
                              <a href="login.php" class="text-center btn btn-block"
                                 style="font-family: arial;background-color: rgba(28,153,84);color: rgb(235,235,235)">Cancel</a>
                           </div>
                        </div><br>
                     </form>
                  </div>
               </div>
            </div>
            <!-- /.container-fluid -->
         </section>
      </div>
      <!-- /.card -->
   </div>
   <!-- /.login-box -->
</body>

</html>