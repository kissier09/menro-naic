<?php

session_start();
unset($_SESSION['user_id']);
unset($_SESSION['member_id']);
echo "Logout Successful";
header("Location: Login.php");

?>