<?php

function check_login($con)
{

    if (isset($_SESSION['member_id'])) {
        $id = $_SESSION['member_id'];
        $query = "select * from tbl_member where member_id = '$id' limit 1";

        $result = mysqli_query($con, $query);
        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;

        }
    } else {
        if (isset($_SESSION['user_id'])) {
            $id = $_SESSION['user_id'];
            $query = "select * from tbl_user where user_id = '$id' limit 1";

            $result = mysqli_query($con, $query);
            if ($result && mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);
                return $user_data;

            }

        } else {
            //redirect to login
            header("Location: login.php");
            die;
        }
    }

}


?>