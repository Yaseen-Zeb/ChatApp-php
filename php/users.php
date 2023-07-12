<?php
include "config.php";
session_start();
$out_id = $_SESSION["unique_id"];
$str = "";
$data = mysqli_query($conn,"SELECT * FROM users WHERE NOT unique_id = '$out_id'");
if (mysqli_num_rows($data) == 0) {
    echo "<span style='background-color:red;'>Welcome </span>You are the first user";
}else if (mysqli_num_rows($data) > 0) {
        include "user_config.php";
    }
echo $str;

?>
