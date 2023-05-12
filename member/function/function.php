<?php
function check_login($con)
{

    if (isset($_SESSION['member_id'])) {
        $id = $_SESSION['member_id'];
        $query = "select member_id from tbl_member where member_id = '$id' limit 1";

        $result = mysqli_query($con, $query);
        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;

        }
    } elseif (isset($_SESSION['user_id'])) {
        $id = $_SESSION['user_id'];
        $query = "select member_id from tbl_user where user_id = '$id' limit 1";

        $result = mysqli_query($con, $query);
        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;

        }

    }
}


?>