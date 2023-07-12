<?php
include "config.php";
session_start();
$out_id = $_SESSION["unique_id"];
$srh_value =  mysqli_real_escape_string($conn,$_POST["value"]);
$str = "";
$data = mysqli_query($conn,"SELECT * FROM users WHERE NOT unique_id = '$out_id' AND concat(fname,lname) LIKE '%$srh_value%' ");
if (mysqli_num_rows($data) > 0) {
    include "user_config.php";
}else{
    $str .= "No user found related to your search";
}
echo $str;

?>