<?php
session_start();

include("../../connection.php");
include("../function.php");
$user_data = check_login($con);
$uname = $user_data['fullname'];
date_default_timezone_set('Asia/manila');
$date = date("Y-m-d H:i:s");
if ($_SERVER['REQUEST_METHOD'] == "POST") {
   $membersID = $_POST['memberid'];
   $shopID = $_POST['shopid'];
   $typeID = $_POST['typeid'];
   $Quantity = $_POST['quantity'];
   $Unit = $_POST['unit'];
   $Date = $_POST['date'];
   $proccessBy = $_POST['user_id'];
   $status = $_POST['status'];

   $query = "SELECT reward FROM tbl_garbage_type WHERE type_id = '$typeID'";
   $query_run = mysqli_query($con, $query);

   if ($query_run) {
      while ($row = mysqli_fetch_array($query_run)) {
         $TotalAmount = $row['reward'] * $Quantity;

         if (!empty($membersID) && !empty($shopID) && !empty($typeID) && !empty($Quantity) && !empty($Unit) && !empty($TotalAmount) && !empty($Date) && !empty($proccessBy)) {

            $query = "INSERT INTO tbl_collection_record(member_id, shop_id, type_id, quantity, unit, total_amount, date, processed_by, status) VALUES ('$membersID','$shopID','$typeID','$Quantity','$Unit','$TotalAmount','$Date','$proccessBy','$status')";

            mysqli_query($con, $query);
            $activity = "$uname Added Collection in Collection Record";
            $log = "INSERT INTO `acti-log` (date,activity) values ('$date','$activity')";
            mysqli_query($con, $log);
            echo '<script>alert("Record successfully added");
                window.location.href=" junkshop.php"</script>';


         } else {
            echo '<script>alert("Failed to add Record");
                window.location.href=" junkshop.php"</script>';

         }
      }
   }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>
      ADD COLLECTION
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

<body class="hold-transition login-page">
   <div class="login-box" style="width: 70%">

      <div class="card card-outline">
         <section class="content">
            <div class="container-fluid">
               <div class="card">
                  <div class="card-header" style="background-color: rgba(28,153,84);color: rgb(235,235,235)">
                     <h3 class="card-title">Record Information</h3>
                  </div>
                  <div id="box">
                     <form method="post">
                        <div class="col-md-12">
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="card-header">
                                    <span class="fa fa-key"> ADD COLLECTION</span>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-4">
                                       <div class="form-group">
                                          <label>Status</label>
                                          <select class="form-control" name="status">
                                             <option value="Accepted">Accept</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="form-group">
                                          <?php
                                          $sql = "SELECT  * FROM `tbl_member`";
                                          $memberId = mysqli_query($con, $sql);
                                          ?>
                                          <label for="member_id" class="form-label fw-bold">MEMBER ID</label>
                                          <select class="form-control" name="memberid" id="member_id" required>
                                             <option value="" disabled="disabled" selected>--None Selected--</option>
                                             <?php
                                             while (
                                                $memberid = mysqli_fetch_array($memberId, MYSQLI_ASSOC)
                                             ):
                                                ;
                                                ?>
                                                <option name="memberid" id="member_id"
                                                   value="<?php echo $memberid["member_id"]; ?>">
                                                   <?php echo $memberid["first_name"];
                                                   echo " ";
                                                   echo $memberid["middle_name"];
                                                   echo ", ";
                                                   echo $memberid["last_name"]; ?>
                                                </option>
                                             <?php endwhile; ?>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="form-group">
                                          <?php
                                          $sql = "SELECT * FROM `tbl_junkshop`";
                                          $shopId = mysqli_query($con, $sql);
                                          ?>
                                          <label for="shop_id" class="form-label fw-bold">SHOP ID</label>
                                          <select class="form-control" name="shopid" id="shop_id" required>
                                             <option value="" disabled="disabled" selected>--None Selected--</option>
                                             <?php
                                             while (
                                                $shopid = mysqli_fetch_array($shopId, MYSQLI_ASSOC)
                                             ):
                                                ;
                                                ?>
                                                <option name="shopid" id="shop_id"
                                                   value="<?php echo $shopid["shop_id"]; ?>">
                                                   <?php echo $shopid["shop_name"]; ?>
                                                </option>
                                             <?php endwhile; ?>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="form-group">
                                          <?php
                                          $sql = "SELECT * FROM `tbl_garbage_type`";
                                          $typeId = mysqli_query($con, $sql);
                                          ?>
                                          <label for="type_id" class="form-label fw-bold">TYPE ID</label>
                                          <select class="form-control" name="typeid" id="type_id" required>
                                             <option value="" disabled="disabled" selected>--None Selected--</option>
                                             <?php
                                             while (
                                                $typeid = mysqli_fetch_array($typeId, MYSQLI_ASSOC)
                                             ):
                                                ;
                                                ?>
                                                <option name="typeid" id="type_id"
                                                   value="<?php echo $typeid["type_id"]; ?>">
                                                   <?php echo $typeid["name"]; ?>
                                                </option>
                                             <?php endwhile; ?>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="form-group">
                                          <label>Quantity</label>
                                          <input type="number" class="form-control" name="quantity">
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="form-group">
                                          <label>Unit</label>
                                          <input type="text" class="form-control" name="unit">
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="form-group">
                                          <label>Date</label>
                                          <input type="date" class="form-control" name="date">
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="form-group">
                                          <input type="hidden" name="user_id"
                                             value="<?php echo $user_data['user_id'] ?>">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-6">
                              <button type="submit" class="btn btn-block"
                                 style="background-color: rgba(28,153,84);color: rgb(235,235,235)"
                                 name="save">Save</button>
                           </div>
                           <div class="col-6">
                              <a href="../../logout.php" class="text-center btn btn-block"
                                 style="background-color: rgba(28,153,84);color: rgb(235,235,235)">Log
                                 Out</a>
                           </div>
                        </div><br>
                     </form>
                  </div>
               </div>
            </div>
         </section>
      </div>
   </div>
</body>