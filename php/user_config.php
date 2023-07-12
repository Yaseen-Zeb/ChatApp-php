<?php
while ($row = mysqli_fetch_assoc($data)) {
  ($row["status"] == "Offline now") ? $offline = "offline" : $offline = "" ;
$str .= '<div>
<a href="./chat.php?id='.$row["unique_id"].'">
<div class="user">
   <div class="content">
   <img src="./php/uploads/'.$row["img"].'" alt="">
   <div class="info">
       <p class="first">'. $row["fname"] ." ". $row["lname"].'</p>
       <p class="second"></p>
   </div>
  </div>
</a>
<div class="dot '.$offline.'"></div>
</div>';
}
?>