<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        UPDATE USER
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

$member_id = $_POST['member_id'];
$query = "SELECT * FROM tbl_member WHERE member_id = '$member_id'";
$query_run = mysqli_query($con, $query);

if ($query_run) {
    while ($row = mysqli_fetch_array($query_run)) {

        ?>

        <body class="hold-transition login-page">
            <div class="login-box" style="width: 70%">

                <div class="card card-outline">
                    <section class="content">
                        <div class="container-fluid">
                            <div class="card">
                                <div class="card-header" style="background-color: rgb(79,128,226);color: rgb(255,255,255)">
                                    <h3 class="card-title">Profile Information</h3>
                                </div>
                                <div id="box">
                                    <form method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="member_id" value="<?php echo $row['member_id'] ?>">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <img src="../../asset/img/profile.png" width="150"
                                                            style="border-radius: 5px">
                                                        <label for="exampleInputFile">Choose Profile</label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input"
                                                                    name="profile_picture" accept=".jpg,.jpeg,.png,.jfif"
                                                                    required>
                                                                <label class="custom-file-label">Choose file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="card-header">
                                                        <span class="fa fa-user"> Profile Information</span>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>First Name</label>
                                                                <input type="text" class="form-control"
                                                                    value="<?php echo $row['first_name'] ?>" name="first_name">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Middle Name</label>
                                                                <input type="text" value="<?php echo $row['middle_name'] ?>"
                                                                    class="form-control" name="middle_name">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Last Name</label>
                                                                <input type="text" value="<?php echo $row['last_name'] ?>"
                                                                    class="form-control" name="last_name">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Gender</label>
                                                                <select class="form-control" name="gender">
                                                                    <option value="Male">Male</option>
                                                                    <option value="Female">Female</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Birthday</label>
                                                                <input type="date" value="<?php echo $row['birthday'] ?>"
                                                                    class="form-control" name="birthday">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Contact</label>
                                                                <input type="number" value="<?php echo $row['contact'] ?>"
                                                                    class="form-control" name="contact">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Email</label>
                                                                <input type="email" value="<?php echo $row['email_address'] ?>"
                                                                    class="form-control" name="email_address">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Address</label>
                                                                <input type="text" class="form-control" name="address"  required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>status</label>
                                                                <select class="form-control" name="account_status">
                                                                    <option value="Member">Member</option>
                                                                    <option value="Admin">Admin</option>
                                                                    <option value="Junkshop">Junkshop</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="card-header">
                                                                <span class="fa fa-key"> Account</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Username</label>
                                                                <input type="text" value="<?php echo $row['username'] ?>"
                                                                    class="form-control" name="username">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Password</label>
                                                                <input type="password" value="<?php echo $row['password'] ?>"
                                                                    class="form-control" name="password">
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
                                                    name="update">Update User</button>
                                            </div>
                                            <div class="col-6">
                                                <a href="../member.php" class="text-center btn btn-block"
                                                    style="font-family: fantasy;background-color: rgba(28,153,84);color: rgb(235,235,235)">CANCEL</a>
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

        </html>
        <?php
    }
} else {
    echo "No Record Found";
}

//update a users
if (isset($_POST['update'])) {
    $member_id = $_POST['member_id'];
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
  

    if ($_POST['account_status'] === "Member") {
            $m = "../../../waste/asset/img/profile/" . $_FILES['profile_picture']['name'];
            move_uploaded_file($_FILES['profile_picture']['tmp_name'], $m);
        $update_query = "UPDATE tbl_member SET member_id='$member_id',last_name='$last_name',first_name='$first_name',middle_name='$middle_name',gender='$gender',birthday='$birthday',contact='$contact',email_address='$email_address',profile_picture='$profile_picture',username='$username',password='$password ',account_status='$account_status' WHERE member_id = '$member_id'";
        
        if ($con->query($update_query) === TRUE) {
            $sname = $fullname;
            $activity = "$uname Update $sname in member";
            $log = "INSERT INTO `acti-log` (date,activity) values ('$date','$activity')";
            mysqli_query($con, $log);
            echo '<script>alert("User has been updated.");
				window.location.href=" ../../admin/member.php"</script>';
        } else {
            echo '<script>alert("User not updated.");
				window.location.href=" ../../admin/member.php"</script>';

        }


    }
    if ($_POST['account_status'] === "Admin") {
        $user_group_id = "1";
        $update_query = "INSERT into tbl_user (username,password,avatar,fullname,contact,email,user_category_id,status) values ('$username','$password','$profile_picture','$fullname','$contact','$email_address','$user_group_id','$account_status')";


        if ($con->query($update_query) === TRUE) {
            $update_query = "DELETE FROM tbl_member where member_id = '$member_id'";
            if ($con->query($update_query) === TRUE) {
                $sname = $fullname;
                $activity = "$uname Update $sname in member";
                $log = "INSERT INTO `acti-log` (date,activity) values ('$date','$activity')";
                mysqli_query($con, $log);
                echo '<script>alert("User has been updated.");
				    window.location.href=" ../../admin/member.php"</script>';
            } else {
                echo '<script>alert("User not updated.");
				    window.location.href=" ../../admin/member.php"</script>';
            }

        }
    }
    if ($_POST['account_status'] === "Junkshop") {
        $user_group_id = "2";
        $update_query = "INSERT into tbl_user (username,password,avatar,fullname,contact,email,user_category_id,status) values ('$username','$password','$profile_picture','$fullname','$contact','$email_address','$user_group_id','$account_status')";


        if ($con->query($update_query) === TRUE) {
            $update_query = "DELETE FROM tbl_member where member_id = '$member_id'";
            if ($con->query($update_query) === TRUE) {
                $sname = $fullname;
                $activity = "$uname Update $sname in member";
                $log = "INSERT INTO `acti-log` (date,activity) values ('$date','$activity')";
                mysqli_query($con, $log);
                echo '<script>alert("User has been updated.");
				    window.location.href=" ../../admin/member.php"</script>';
            } else {
                echo '<script>alert("User not updated.");
				    window.location.href=" ../../admin/member.php"</script>';
            }

        }
    }

}
?>



</html>