<?php
include "config.php";

$fname = mysqli_real_escape_string($conn,$_POST["fname"]);
$lname = mysqli_real_escape_string($conn, $_POST["lname"]);
$email = mysqli_real_escape_string($conn,$_POST["email"]);
$password = mysqli_real_escape_string($conn,$_POST["password"]);


if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password)) {
    if (filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $query = "SELECT * FROM users WHERE email = '{$email}'";
        $data = mysqli_query($conn , $query);
        if (mysqli_num_rows($data) > 0) {
            echo "$email - is already exist";
        }else{
            if (isset($_FILES["file"])) {
                $img_name = $_FILES["file"]["name"];
                $img_size = $_FILES["file"]["size"];
                $img_type = $_FILES["file"]["type"];
                $img_tmp_name = $_FILES["file"]["tmp_name"];

                
                $img_ext = explode(".",$img_name);
                $extion = end($img_ext);
                $ext_arr = ["jpg", "png","jpeg"];

                if (in_array($extion,$ext_arr) === true) {
                    $time = time();
                    $unique_name = $time.$img_name;
                   if ( move_uploaded_file($img_tmp_name,"uploads/".$unique_name)) {
                       $status = "Active now";
                       $random_id = rand(time(),100000);

                    //    insrting data
                    $data1 =  mysqli_query($conn,"INSERT INTO users(unique_id,fname,lname,email,password,img,status) VALUES('$random_id','$fname','$lname','$email','$password','$unique_name','$status')");
                    if ($data1) {
                        $data2 = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
                        if (mysqli_num_rows($data2) > 0) {
                            $row = mysqli_fetch_assoc($data2);
                            session_start();
                        $_SESSION["unique_id"] = $row["unique_id"];
                        echo "success";
                        }
                    }else{
                        echo "Some thing went wrong!";
                    }
                   }
                }
            }else{
                echo "Please select an image";
            }
        }
        
    }else{
        echo "$email- is not valid email";
    }
}else{
    echo "All input feild are required!";
}


?>