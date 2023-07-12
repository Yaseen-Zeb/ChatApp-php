<?php

session_start();
if (isset($_SESSION["unique_id"])) {
    include "config.php";
$out_id = mysqli_real_escape_string($conn,$_POST["oid"]);
$in_id = mysqli_real_escape_string($conn,$_POST["in"]);
$msg = mysqli_real_escape_string($conn,$_POST["msg"]);


$data = mysqli_query($conn,"INSERT INTO sms(out_id, in_id, msg)
                     VALUES('$out_id' , '$in_id' , '$msg')");
}else{
    header("Location: ../login.php");
}


?>