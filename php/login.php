<?php
include "config.php";

$email = mysqli_real_escape_string($conn,$_POST["email"]);
$password = mysqli_real_escape_string($conn,$_POST["password"]);
if (!empty($email) && !empty($password)) {
    $data = mysqli_query($conn,"SELECT * FROM users WHERE email = '{$email}' AND password = '{$password}'");
    if (mysqli_num_rows($data) > 0) {
        $row = mysqli_fetch_assoc($data);
            session_start();
            $status = "Active now";
            $id = $row["unique_id"];
            $data1 = mysqli_query($conn, "UPDATE users SET status = '$status' WHERE unique_id = '$id'");
            if ($data1) {
            $_SESSION["unique_id"] = $row["unique_id"];
            echo "success";
            }
            
    }else {
       echo "Email or Password is incorrect.";
    }
}else {
    echo "All input feilds are required";
}
?>