<?php
session_start();
if (isset($_SESSION["unique_id"])) {
    include "config.php";
    $str = "";
$out_id = mysqli_real_escape_string($conn,$_POST["oid"]);
$in_id = mysqli_real_escape_string($conn,$_POST["in"]);

$query = "SELECT * FROM sms  INNER JOIN users ON sms.in_id = users.unique_id
          WHERE (out_id = '$out_id' AND in_id = '$in_id') OR
          (out_id = '$in_id' AND in_id = '$out_id')";
$data = mysqli_query($conn, $query);
if (mysqli_num_rows($data) > 0) {
    while ($row = mysqli_fetch_assoc($data)) {
       if ($row["out_id"] === $out_id) {
       $str .= '<div class="outgoing">
                <div class="details">
            <p>'. $row['msg'] .'</p>
                </div>
                </div>';
    }
    else {
      $str .= '<div class="incoming">
               <img class="chat_img" src="php/uploads/'.$row["img"].'" alt="">
               <div class="details">
            <p>'. $row['msg'] .'</p>
               </div>
               </div>';
 
}
 } }                              
}else{
    header("Location: ../login.php");
}

echo $str;
?>



	
	

	

