<?php
session_start();
if (isset($_SESSION["unique_id"])) {
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        include "config.php";
        $status = "Offline now";
        $data = mysqli_query($conn, "UPDATE users SET status = '$status' WHERE unique_id = '$id'");
        if ($data) {
            session_unset();
            session_destroy();
            header("Location: ../login.php");
        }
    }else {
        header("Location: ../users.php");
    }
}else {
    header("Location: ../login.php");
}
?>