<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        UPDATE COLLECTION
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

<?php
session_start();
include("../../connection.php");
include("../function.php");
$user_data = check_login($con);
$uname = $user_data['fullname'];
date_default_timezone_set('Asia/manila');
$date = date("Y-m-d H:i:s");

$recordId = $_POST['record_id'];
$query = "SELECT * FROM tbl_collection_record WHERE record_id = '$recordId'";
$query_run = mysqli_query($con, $query);

if ($query_run) {
    while ($row = mysqli_fetch_array($query_run)) {

        ?>

        <body class="hold-transition login-page">
            <div class="login-box" style="width: 30%">
                <!-- /.login-logo -->
                <div class="card card-outline">
                    <section class="content">
                        <div class="container-fluid">
                            <div class="card">
                                <div class="card-header" style="background-color: rgb(79,128,226);color: rgb(255,255,255)">

                                </div>
                                <div id="box">
                                    <form method="post">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="card-header text-center">
                                                        <span class="fa fa-key"> EDIT COLLECTION</span>
                                                    </div>
                                                    <input type="hidden" name="record_id"
                                                        value="<?php echo $row['record_id'] ?>">
                                                    <input type="hidden" name="memberid"
                                                        value="<?php echo $row['member_id'] ?>">
                                                    <input type="hidden" name="shopid" value="<?php echo $row['shop_id'] ?>">
                                                    <input type="hidden" name="typeid" value="<?php echo $row['type_id'] ?>">
                                                    <input type="hidden" name="quantity" value="<?php echo $row['quantity'] ?>">
                                                    <input type="hidden" name="unit" value="<?php echo $row['unit'] ?>">
                                                    <input type="hidden" name="date" value="<?php echo $row['date'] ?>">
                                                    <input type="hidden" name="userid"
                                                        value="<?php echo $row['processed_by'] ?>">
                                                    <div class="form-group">
                                                        <label>Status</label>
                                                        <select class="form-control" name="status">
                                                            <option value="Accepted">Accept</option>
                                                            <option value="Rewarded">Reward</option>
                                                        </select>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <button type="submit" class="btn btn-block"
                                                                style="background-color: rgba(28,153,84);color: rgb(235,235,235)"
                                                                name="update">Update
                                                                Record</button>
                                                        </div>
                                                        <div class="col-6">
                                                            <a href="../records.php" class="text-center btn btn-block"
                                                                style="font-family: fantasy;background-color: rgba(28,153,84);color: rgb(235,235,235)">Cancel</a>
                                                        </div><br><br>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </body>

        <?php
    }
} else {
    echo "No Record Found";
}

//update a users
if (isset($_POST['update'])) {
    $record_id = $_POST['record_id'];
    $membersID = $_POST['memberid'];
    $shopID = $_POST['shopid'];
    $typeID = $_POST['typeid'];
    $Quantity = $_POST['quantity'];
    $Unit = $_POST['unit'];
    $Date = $_POST['date'];
    $proccessBy = $_POST['userid'];
    $status = $_POST['status'];

    $query = "SELECT reward FROM tbl_garbage_type WHERE type_id = '$typeID'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        while ($row = mysqli_fetch_array($query_run)) {
            $TotalAmount = ($row['reward'] * $Quantity) / 2;
            if (!empty($membersID) && !empty($shopID) && !empty($typeID) && !empty($Quantity) && !empty($Unit) && !empty($TotalAmount) && !empty($Date) && !empty($proccessBy) && !empty($status)) {
                $update_query = "UPDATE tbl_collection_record SET record_id='$record_id',member_id='$membersID',shop_id='$shopID',type_id='$typeID',quantity='$Quantity',unit='$Unit',total_amount = '$TotalAmount',processed_by='$proccessBy',status = '$status' WHERE record_id = '$record_id'";
                if ($con->query($update_query) === TRUE) {

                    $activity = "$uname Update Record in Collection-record";
                    $log = "INSERT INTO `acti-log` (date,activity) values ('$date','$activity')";
                    mysqli_query($con, $log);
                    echo '<script>alert("Record Update");  
                     window.location.href=" ../records.php"</script>';

                } else {
                    echo '<script>alert("Record not Update");  
                    window.location.href=" ../records.php"</script>';
                }


            }
        }
    }
}
?>



</html>