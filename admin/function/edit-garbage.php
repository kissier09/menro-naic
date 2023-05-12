<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        UPDATE GARBAGE
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

$type_id = $_POST['type_id'];
$query = "SELECT * FROM tbl_garbage_type WHERE type_id = '$type_id'";
$query_run = mysqli_query($con, $query);

if ($query_run) {
    while ($row = mysqli_fetch_array($query_run)) {

        ?>

        <body class="hold-transition login-page">
            <div class="login-box" style="width: 50%">
                <div class="card card-outline">
                    <section class="content">
                        <div class="container-fluid">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="text-center"><img src="../../asset/img/garbage-collect.png" width="40"> Garbage
                                        Information</h5>
                                </div>
                                <div id="box">
                                    <form method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="type_id" value="<?php echo $row['type_id'] ?>">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="float-left">Image</label>
                                                            <input type="file" class="form-control" name="image"
                                                                accept=".jpg,.jpeg,.png,.jfif"
                                                                value="<?php echo $row['image'] ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">

                                                            <label class="float-left">Garbage Type</label>
                                                            <input type="text" class="form-control" name="name"
                                                                value="<?php echo $row['name'] ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="float-left">Description</label>
                                                            <input class="form-control" name="description"
                                                                value="<?php echo $row['description'] ?>"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="float-left">Reward</label>
                                                            <input type="text" class="form-control" name="reward"
                                                                value="<?php echo $row['reward'] ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                           
                                                <div class="col-4">
                                                    <button type="submit" class="btn btn-block"
                                                        style="background-color: rgba(28,153,84);color: rgb(235,235,235)"
                                                        name="update">Update
                                                        Garbage</button>
                                                </div>
                                                <div class="col-4">
                                                    <a href="../garbage-type.php" class="text-center btn btn-block"
                                                        style="font-family: fantasy;background-color: rgba(28,153,84);color: rgb(235,235,235)">Cancel</a>
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
    $type_id = $_POST['type_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $reward = $_POST['reward'];
    $image = $_FILES['image']['name'];


    $update_query = "UPDATE tbl_garbage_type SET type_id='$type_id',name='$name',description='$description',reward='$reward',image='$image' WHERE type_id = '$type_id'";
    if ($con->query($update_query) === TRUE) {
        $m = "../../../waste/asset/img" . $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], $m);
        $activity = "$uname Update $name in garbage-type";
        $log = "INSERT INTO `acti-log` (date,activity) values ('$date','$activity')";
        mysqli_query($con, $log);
        echo '<script>alert("Garbage Update");  
    window.location.href=" ../garbage-type.php"</script>';

    } else {
        echo '<script>alert("Garbage not Update");  
        window.location.href=" ../garbage-type.php"</script>';
    }
}
?>



</html>